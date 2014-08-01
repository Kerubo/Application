<?php

class TestsController extends \BaseController {

	/**
	 * Display a listing of tests
	 *
	 * @return Response
	 */
	public function index()
	{
		$tests = Test::all();

		return View::make('page.index', compact('page'));
	}

	/**
	 * Show the form for creating a new test
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('page.create');
	}

	/**
	 * Store a newly created test in storage.
	 *
	 * @return Response
	 */
	public function store()
	{	
		$input = Input::all();
		
			$input['profile'] = Input::get('profile');
			// $input['image'] = "gh";
		// $test = new Test();
		// $test->fill($input);
		// $test->save();
		// var_dump($input); die('here');
		$validator = Validator::make($data = $input, Test::$rules);

		if($validator->passes())
		{
			$test =  Test::create($input);
			// $image = $input['image'];
			// var_dump($image);
			// die('here');
			if(Input::hasFile('image')){
				$file = Input::file('image');
				$destination = public_path().'/uploads/';
				$filename = str_random(3).$file->getClientOriginalName();
				$success = $file->move($destination, $filename);
				$input['image'] = $filename;
			}

			$input['image'] = $input['image'];
			$imgName = $input['image'];


			$test->image = $imgName;
			$test->save();
			// var_dump($imgName); die('here');
			if($test)
			{
				return Redirect::route('page.show', array($test->id));
			}
		}
		else
		{
			// Redirect user back to the form 
			return Redirect::back()->withErrors($validator);
		}
		
	}

	/**
	 * Display the specified test.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$test = Test::findOrFail($id);

		return View::make('page.show', compact('page'));
	}

	/**
	 * Show the form for editing the specified test.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$test = Test::find($id);

		return View::make('page.edit', compact('page'));
	}

	/**
	 * Update the specified test in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$test = Test::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Test::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$test->update($data);

		return Redirect::route('page.index');
	}

	/**
	 * Remove the specified test from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Test::destroy($id);

		return Redirect::route('page.index');
	}

}
