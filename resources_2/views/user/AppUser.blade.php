<!DOCTYPE html>
<html lang="en">
@include('header')
<body class="hold-transition skin-blue fixed sidebar-mini">
	<div class="wrapper">
		@include('user.NavUser')
		<div class="content-wrapper">
			@yield('content')
		</div>
    </div>
@include('footer')	
</body>
</html>
