@extends('layouts.master')
@section('title', 'Add Device')
@section('heading', 'Add Device Details')

@section('content')

	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class=" panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Add Manufactured Device</h3>
				</div>
				<div class="panel-body">
					<form action="post_new_device" method="POST">
						{{ csrf_field() }}
						@if(session('success'))
						<div class="alert alert-success">
							{{ session('success') }}
						</div>
						@endif
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-microchip"></i></span>
								<input type="text" name="device_Id" class="form-control" placeholder="Device ID" required>
							</div>
						</div>
						<div class="form-group">
							<input type="Submit" class="btn btn-success pull-right" value="ADD">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection