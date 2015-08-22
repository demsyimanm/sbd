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
                  <img src="{{ URL::to('assets/AdminLTE/dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
                  <span class="hidden-xs">{{ Auth::user()->role->nama }}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="{{ URL::to('assets/AdminLTE/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
                    <p>
                      {{ Auth::user()->username }}
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
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
            <li class="header">ADMIN NAVIGATION</li>
            <li class="treeview">
              <a href="{{ URL::to('admin')}}">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>
             
             @if(Auth::user()->role->id == 1)
            <li class="treeview">
              <a href="{{ URL::to('admin/user')}}">
                <i class="fa fa-user"></i> <span>Akun</span>
              </a>
            </li>
            @endif

            <li class="treeview">
              <a href="{{ URL::to('admin/event')}}">
                <i class="fa fa-calendar"></i> <span>Event</span>
              </a>
            </li>

            <li class="treeview">
              <a href="{{ URL::to('admin/calendar')}}">
                <i class="fa fa-calendar-check-o"></i> <span>Calendar</span>
              </a>
            </li>

          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>