<header class="main-header">
        <!-- Logo -->
        <a href=" {{ route('home') }} " class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>W</b>ine</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Wine and</b>Spirit</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>

          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="/storage/uploads/users/{{ auth()->user()->avatar }} "
                  class="user-image" alt="{{ auth()->user()->name}}">
                  <span class="hidden-xs">{{ auth()->user()->name}}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="/storage/uploads/users/{{ auth()->user()->avatar }} "
                    class="img-circle" alt="{{ auth()->user()->name}}">

                    <p>
                        {{ auth()->user()->name}} - {{ (auth()->user()->isAdmin)? "Administrator": " User " }}
                      <small>Member since  {{ auth()->user()->created_at }} </small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                    <div class="row">

                      <div class="col-xs-12 text-center">
                        <a href="#">Sales</a>
                      </div>

                    </div>
                    <!-- /.row -->
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href=" {{ route('profile',auth()->user()->id) }} " class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">

                      <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Sign out') }}
                        </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                    </form>

                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
