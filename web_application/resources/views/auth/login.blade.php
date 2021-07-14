@extends('layouts.master')
@section('title', 'Login')
@section('heading', 'Please Login')

@section('content')
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class=" panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Login</h3>
				</div>
				<div class="panel-body">
					<form action="login" method="POST">
						{{ csrf_field() }}
						@if(session('error'))
						<div class="alert alert-danger">
							{{ session('error') }}
						</div>
						@endif
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
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-lock"></i></span>
								<input type="password" name="password" class="form-control" placeholder="Password" required>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<input type="checkbox" name="remember_me"> Remember Me
							</div>
						</div>
						<div class="form-group">
							<a href="/forget_password">Forget Password ?</a>
						</div>
						<div class="form-group">
							<input type="Submit" class="btn btn-success pull-right" value="Login">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection