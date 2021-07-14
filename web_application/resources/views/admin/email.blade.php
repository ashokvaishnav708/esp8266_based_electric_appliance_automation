<h1>Hello</h1>
<p>Click Below Link to activate your account<br>
	<a href="{{ env('APP_URL') }}/activate/{{ $user->email }}/{{ $code }}">Activate Account</a>
</p>
