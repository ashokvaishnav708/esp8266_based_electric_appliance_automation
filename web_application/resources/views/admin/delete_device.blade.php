@extends('layouts.master')
@section('title', 'Remove Device')
@section('heading', 'Remove Device')

@section('content')
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class=" panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Remove Device</h3>
				</div>
				<div class="panel-body">
					<form action="postRemoveDevice" method="POST">
						{{ csrf_field() }}
						@if(session('success'))
						<div class="alert alert-success">
							{{ session('success') }}
						</div>
						@endif
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
							<input type="Submit" class="btn btn-danger pull-right" value="Remove">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection