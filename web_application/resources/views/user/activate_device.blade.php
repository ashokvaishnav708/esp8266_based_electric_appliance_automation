@extends('layouts.master')
@section('title', 'Add Device')
@section('heading', 'Enter Device Details')

@section('content')

	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class=" panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Device Detail</h3>
				</div>
				<div class="panel-body">
					<form action="activate_device" method="POST">
						{{ csrf_field() }}
						@if(session('error'))
						<div class="alert alert-danger">
							{{ session('error') }}
						</div>
						@endif
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-microchip"></i></span>
								<input type="text" name="device_Id" class="form-control" placeholder="Device ID" required>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-snowflake-o"></i></span>
								<input type="text" name="device_name" class="form-control" placeholder="Device Name" required>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-flash"></i></span>
								<input type="text" name="pin_number" class="form-control" placeholder="Pin Number" required>
							</div>
						</div>
						<input type="hidden" name="user_Id" value="{{ Sentinel::getUser()->user_Id }}">
						<div class="form-group">
							<input type="Submit" class="btn btn-success btn-sm pull-right" value="ADD">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection