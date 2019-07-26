 <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <span class="logo-mini"><b>CUSTO</b>MER</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Customer</b>Dashboard</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
     <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                Welcome:  
              <span class="hidden-xs text-danger">&nbsp;&nbsp;{{Auth::user()->name}}</span>
            </a>
            <ul class="dropdown-menu">
                <div class="pull-right">
                  <a href="{{ route('logout') }}" class="btn btn-default btn-flat">Sign out</a>
                </div>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>