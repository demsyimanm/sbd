<DOCTYPE html>
<html lang="en">
@include('header')
<body style="background-color:#CCCCFF;" class="hold-transition skin-blue fixed sidebar-mini">
<div class="wrapper" style="background-color:#CCCCFF; height:100%;">
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
        <div class="pull-right">
          <p>by : SBDOJ</p>
        </div>
        <br>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
</div>
</body>

</html>
