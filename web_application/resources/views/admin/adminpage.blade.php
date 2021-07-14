@extends('layouts.master')

@section('title', 'Admin')

@section('content')

<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<form action="new_device" method="GET">
			<input type="Submit" value="Add Manufactured Device" class="btn btn-sm btn-primary">
		</form>
		<br>
		<form action="del_user" method="GET">
			<input type="Submit" value="Delete User" class="btn btn-sm btn-danger">
		</form>
		<br>
		<form action="del_device" method="GET">
			<input type="Submit" value="Delete Device" class="btn btn-sm btn-danger">
		</form>
	</div>
</div>

@endsection