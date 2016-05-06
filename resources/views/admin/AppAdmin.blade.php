<!DOCTYPE html>
<html lang="en">
@include('header')
<body class="hold-transition skin-black fixed sidebar-mini">
	<div class="wrapper">
		@include('admin.NavAdmin')
		<div class="content-wrapper">
			@yield('content')
		</div>
    </div>
@include('footer')	
</body>
</html>
