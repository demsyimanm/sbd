<style type="text/css">
	.navbar{
		background-color: #22A7F0;
	}

	.navbar-default .navbar-nav > .open > a, .navbar-default .navbar-nav > .open > a:focus, .navbar-default .navbar-nav > .open > a:hover {
    background-color: #5D9CEC;
}
</style>
<nav class="navbar navbar-default" style="">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#" style="color:white">Laravel</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="/" style="color:white">Home</a></li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="{{URL::to('/auth/login') }}" style="color:white">Login</a></li>
						<li><a href=" {{URL::to('/auth/register') }}" style="color:white">Register</a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" style="color:white" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->role_id }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="/auth/logout">Logout</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>