@extends('layouts.master')

@section('content')

		<div class="create_container">
		{{--{{ $tests->image }}
		{{ $tests->profile }}--}}
		<table id="profile">
		<thead>
		    <tr>
		    	<th>Image</th>
		    	<th>Profile</th>
			</tr>
		</thead>
		<tbody>
		  @foreach($tests as $test)
		    <tr>
		      <td><img src="/uploads/{{$test->image}}" style="width:100px; height:100px;"></td>
		      <td>{{$page->profile}}</td>
		    </tr>
		  @endforeach
		</table>
		<!-- Create Profile -->
		
@stop