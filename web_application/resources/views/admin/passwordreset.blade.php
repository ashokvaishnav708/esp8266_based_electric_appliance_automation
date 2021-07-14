<h1>Hello</h1>
<p>Click Below Link to Reset your Password<br>
	<a href="{{ env('APP_URL') }}/reset/{{ $user->email }}/{{ $code }}">Reset Password</a>
</p>