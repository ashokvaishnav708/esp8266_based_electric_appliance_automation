@extends('layouts.master')
@section('title', 'Forgot Password')
@section('heading', 'Reset Password')

@section('content')
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class=" panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Reset Password</h3>
				</div>
				<div class="panel-body">
					<form action="forget_password" method="POST">
						{{ csrf_field() }}
						@if(session('success'))
						<div class="alert alert-success">
							{{ session('success') }}
						</div>
						@endif
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
								<input type="email" name="email" class="form-control" placeholder="example@example.com" required>
							</div>
						</div>
						<div class="form-group">
							<input type="Submit" class="btn btn-success pull-right" value="Send Code">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection