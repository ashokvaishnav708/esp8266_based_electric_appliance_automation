@extends('layouts.master')

@section('title', 'User')

@section('content')

<div class="row">
	<div class="col-md-6 col-md-offset-3">
		{{ csrf_field() }}
			@if(session('success'))
			<div class="alert alert-success">
				{{ session('success') }}
			</div>
			@endif
		<form action="user_device" method="GET">
			<input type="Submit" value="Add Device" class="btn btn-sm btn-primary">
		</form>
		<br>
		<br>
		<div class="well">
			<form action="" method="GET">
				<label>Your Devices</label>
				@php $devices = App\Device::where('user_Id', '=', Sentinel::getUser()->user_Id)->get(); @endphp
				<table class="table">
				@foreach($devices as $device)
				<tr>
					<td>{{ $device->device_name }}</td>
					<td><input type="button" class="btn-success btn-sm" value="ON" onclick="change_status{{$device->device_Id}}{{$device->pin_number}}('ON');"></td>
					<td><input type="button" class="btn-danger btn-sm" value="OFF" onclick="change_status{{$device->device_Id}}{{$device->pin_number}}('OFF');"></td>
				</tr>
				<script>
					function change_status{{$device->device_Id}}{{$device->pin_number}}(status) {
						$.get('ajax/{{$device->device_Id}}/{{$device->pin_number}}/'+status, function(){});
					}
				</script>
				@endforeach
				</table>
			</form>
		</div>
	</div>
</div>

@endsection