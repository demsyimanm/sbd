<style type="text/css">
.clock {width:800px; margin:0 auto; padding:30px; border:1px solid #333; color:#fff; }

#Date { font-size:12px; text-align:center;color:white; }

ul .date{  margin:0 auto; padding:0px; list-style:none;color:white;list-style-type: none; font-size:16px;}
ul li .date1{ display:inline; font-size:16px;color:white;display: inline; margin: auto}

#point { position:relative; -moz-animation:mymove 1s ease infinite; -webkit-animation:mymove 1s ease infinite; padding-left:10px; padding-right:10px; }

@-webkit-keyframes mymove 
{
0% {opacity:1.0; text-shadow:0 0 20px #00c6ff;}
50% {opacity:0; text-shadow:none; }
100% {opacity:1.0; text-shadow:0 0 20px #00c6ff; }  
}


@-moz-keyframes mymove 
{
0% {opacity:1.0; text-shadow:0 0 20px #00c6ff;}
50% {opacity:0; text-shadow:none; }
100% {opacity:1.0; text-shadow:0 0 20px #00c6ff; }  
}

</style>

<script type="text/javascript">
function checkTime(i) {
    if (i<10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}

$(document).ready(function() {

  var monthNames = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ]; 
  var dayNames= ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
   <?php date_default_timezone_set('Asia/Jakarta'); // CDT?>
  var newDate = new Date('<?php print date("F d, Y H:i:s", time())?>');

  function setTime(){
    newDate.setSeconds(newDate.getSeconds() + 1);
    newDate.setDate(newDate.getDate());
    $('#Date').html(dayNames[newDate.getDay()] + " " + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + ' ' + newDate.getFullYear());

    newDate.setSeconds(newDate.getSeconds());
    var seconds = newDate.getSeconds();
    $("#sec").html(( seconds < 10 ? "0" : "" ) + seconds);
    
    var minutes = newDate.getMinutes();
    $("#min").html(( minutes < 10 ? "0" : "" ) + minutes);

    var hours = newDate.getHours();
    $("#hours").html(( hours < 10 ? "0" : "" ) + hours);
  };
  setInterval(setTime, 1000);
}); 
</script>

      <header class="main-header">
        <!-- Logo -->
        <a href="{{URL::to('/')}}" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>S</b>OJ</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>SBD</b> Online Judge</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="{{ URL::to('assets/AdminLTE/dist/img/user.png')}}" class="user-image" alt="User Image">
                  <span class="hidden-xs">{{ Auth::user()->nama }}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="{{ URL::to('assets/AdminLTE/dist/img/user.png')}}" class="img-circle" alt="User Image">
                    <p>
                      {{ Auth::user()->username }}
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="{{ URL::to('account/setting')}}" class="btn btn-default btn-flat">Setting</a>
                    </div>
                    <div class="pull-right">
                      <a href="{{ URL::to('auth/logout')}}" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">
                <div id="Date"></div>
            <ul class="date" style="text-align:center">
                <li id="hours" class="date1" style="display:inline;"> </li>
                <li id="point" class="date1" style="display:inline">:</li>
                <li id="min" class="date1" style="display:inline"> </li>
                <li id="point"class="date1" style="display:inline">:</li>
                <li id="sec"class="date1" style="display:inline"> </li>
            </ul>
            </li>
            <li class="treeview">
              <a href="{{ URL::to('admin')}}">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>
             
             @if(Auth::user()->paket->id == 1)
            <li class="treeview">
              <a href="{{ URL::to('admin/user')}}">
                <i class="fa fa-user"></i> <span>Akun</span>
              </a>
            </li>
            @endif

            @if(Auth::user()->paket->id == 1 || Auth::user()->paket->id == 2)
            <li class="treeview">
              <a href="{{ URL::to('db')}}">
                <i class="fa fa-database"></i> <span>Manage Database</span>
              </a>
            </li>
            @endif

            <li class="treeview">
              <a href="{{ URL::to('admin/event')}}">
                <i class="fa fa-calendar"></i> <span>Event</span>
              </a>
            </li>
			
			 <li class="treeview">
              <a href="{{ URL::to('admin/event/viewSubmission')}}">
                <i class="fa fa-list"></i> <span>View Submissons</span>
              </a>
            </li>
			
            <li class="treeview">
              <a href="{{ URL::to('admin/scoreboards')}}">
                <i class="fa fa-trophy"></i> <span>Scoreboard</span>
              </a>
            </li>

          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>