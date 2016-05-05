<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Registration Page</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{URL::to('assets/AdminLTE/bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{URL::to('assets/css/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{URL::to('assets/css/ionicons/css/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{URL::to('assets/AdminLTE/dist/css/AdminLTE.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{URL::to('assets/AdminLTE/plugins/iCheck/square/blue.css')}}">
  </head>
  <body class="hold-transition register-page">
    <div class="">
      <div class="register-logo">
        <a href="#"><b>SBD</b> Online Judge</a>
      </div>
      <div class="col-xs-2"></div>
      <div class="col-xs-8 register-box-body">
        <p class="login-box-msg">Register a new membership</p>
        <form action="" method="post">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Full name" name="nama">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="username" name="username">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" name="password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <br>
          <div class="row form-group">
	          <div class="col-xs-4">
	          	<div class="radio">
	          		<div class="box box-solid box-primary">
		          		<div class="box-header text-center">
		          			<div class="box-title text-center">Regular</div>
		          		</div>
		          		<div class="box-body text-center">
			          		<h5>Query : 50 queries / day</h5>
			          		<h5>DB Size : 0 MB</h5>
			          		<h5>Price : $0 / month</h5>
		          		</div>
	          		</div>
	          		<center>
	          			<input type="radio" name="paket" value="3">	
	          		</center>
	          	</div>	
	          </div>
	          <div class="col-xs-4">
	          	<div class="radio">
	          		<div class="box box-solid box-danger">
		          		<div class="box-header text-center">
		          			<div class="box-title text-center">Premium</div>
		          		</div>
		          		<div class="box-body text-center">
			          		<h5>Query : 300 queries / day</h5>
			          		<h5>DB Size : 50 MB</h5>
			          		<h5>Price : $5 / month</h5>
		          		</div>
	          		</div>
	          		<center>
	          			<input type="radio" name="paket" value="2">	
	          		</center>
	          	</div>
	          </div>
	          <div class="col-xs-4">
	          	<div class="radio">
	          		<div class="box box-solid box-warning">
		          		<div class="box-header text-center">
		          			<div class="box-title text-center">Gold</div>
		          		</div>
		          		<div class="box-body text-center">
			          		<h5>Query : Unlimited queries / day</h5>
			          		<h5>DB Size : 200 MB</h5>
			          		<h5>Price : $15 / month</h5>
		          		</div>
	          		</div>
	          		<center>
	          			<input type="radio" name="paket" value="1">	
	          		</center>
	          	</div>
	          	
	          </div>
	      </div>
	      <br>
          <div class="row">
            <div class="">
             
            </div><!-- /.col -->
            <div class="col-xs-12">
              <button type="submit" class="btn btn-success btn-block btn-flat">Register</button>
            </div><!-- /.col -->
          </div>
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
      </div><!-- /.form-box -->
    </div><!-- /.register-box -->

    <!-- jQuery 2.1.4 -->
    <script src="{{URL::to('assets/AdminLTE/plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{URL::to('assets/AdminLTE/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- iCheck -->
    <script src="{{URL::to('assets/AdminLTE/plugins/iCheck/icheck.min.js')}}"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>
