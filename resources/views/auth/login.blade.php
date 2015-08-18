<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SBDOJ</title>

	<link href="/css/app.css" rel="stylesheet">
	<link href="{{URL::to('assets/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{URL::to('assets/css/site.min.css')}}" rel="stylesheet">
	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
</head>

<style>
body  {
    background-color: #4FC1E9;
}
</style>

<body>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-4 col-md-offset-4" style="margin-top:10%;">
			<div class="panel panel-primary">
				<div class="panel-heading">Login</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group" style="margin-top:5%;">
							<label class="col-md-4 control-label">Username</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="username" >
							</div>
						</div>

						<div class="form-group" style="margin-top:5%;">
							<label class="col-md-4 control-label">Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>
						<div class="form-group" style="margin-top:5%;">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary" style="margin-right: 15px;">
									Login
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
