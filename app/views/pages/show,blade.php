@extends('layouts.master')

@section('content')
<div class="create_profile">
	</div>
		<h2>Show Profile</h2>
		<a href="/pages">Back to Profiles</a>
	</div>
<!-- Info goes in here -->
<?php $path = "/uploads/"; ?>
<p><img src="/uploads/{{$page->image}}"></p>
<p class="lead">Profile:{{ $page->profile }}</p>
</div>


@stop