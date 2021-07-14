@extends('layouts.master')
@section('title', 'New Password')
@section('heading', 'Create New Password')

@section('content')
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class=" panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">New Password</h3>
				</div>
				<div class="panel-body">
					<form action="" method="POST">
						@if(count($errors) > 0)
							<div class="alert alert-danger">
								<ul>
									@foreach($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
						@endif
						{{ csrf_field() }}
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-lock"></i></span>
								<input type="password" name="password" class="form-control" placeholder="New Password" required>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-lock"></i></span>
								<input type="password" name="password_confirmation" class="form-control" placeholder="Confirm New Password" required>
							</div>
						</div>
						<div class="form-group">
							<input type="Submit" class="btn btn-success pull-right" value="Update Password">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection