<div class="header clearfix">
   	<nav>
          <ul class="nav nav-pills pull-right">
          	@if(Sentinel::check())
          		<li role="presentation">
          			<form action="/logout" method="POST" id="logout-form">
          				{{ csrf_field() }}
          				<a href="#" onclick="document.getElementById('logout-form').submit()">Logout</a>
          			</form>
          		</li>
          	@else
            	<li role="presentation"><a href="/login">Login</a></li>
            	<li role="presentation"><a href="/register">Register</a></li>
			@endif          
          </ul>
        </nav>
        <h3 class="text-muted">
        @if(Sentinel::check())
        	Hello, {{ Sentinel::getUser()->first_name }}
        @else
        	@yield('heading')
        @endif
        </h3>
</div>