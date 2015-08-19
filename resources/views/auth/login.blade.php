<DOCTYPE html>
<html lang="en">
@include('header')
<body style="background-color:#CCCCFF;" class="hold-transition skin-blue fixed sidebar-mini">
	<div class="login-box">
      <div class="login-logo">
        <a href="../../index2.html"><b>SBD</b> Online Judge</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <form action"" method="post">
        	<input type="hidden" name="_token" value="{{ csrf_token() }}">
          	<div class="form-group has-feedback">
            	<input type="text" name="username" class="form-control input-sm" placeholder="Nomor Registrasi Pokok">
            	<span class="glyphicon glyphicon-user form-control-feedback"></span>
          	</div>
          	<div class="form-group has-feedback">
            	<input type="password" name="password" class="form-control" placeholder="Password">
            	<span class="glyphicon glyphicon-lock form-control-feedback"></span>
          	</div>
          	<div class="row">
            	<div class="col-xs-4">
              		<button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            	</div><!-- /.col -->
          	</div>
        </form>
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="../../plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>

@include('footer')	
</body>
</html>
