<div id="offeo-app">
<div id="main-header" class="  main-header--big no-bg      ">
<nav class="navbar navbar-expand-sm navbar-light white-color fixed-top">
    <!-- Navbar brand -->
  <a class="navbar-brand" href="{{url('/')}}"><img src="{{asset('public/img/logo.png')}}"></a>

  <!-- Collapse button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
   @if (Auth::check())
  <h5>Welcome : <h6 class="text-danger" style="margin-left: 5px;padding-top: 3px;">{{ ucfirst(Auth::user()->name ) }}</h6></h5>
   @endif
  <!-- Collapsible content -->
  <div class="collapse navbar-collapse" id="basicExampleNav">

    <!-- Links -->
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="{{url('/create-video')}}">Create Video
        </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{url('/get-started')}}">Get Started
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about-us.html">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="portfolio.html">Portfolio</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('/faq')}}">Faq</a>
      </li>
     @if (Auth::check())
              <li class="nav-item dropdown">
                         <a class="dropdown-item signinbtn blue mt-0" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                               

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                
                            </li>
             @else
            <li class="nav-item">
                <a class="blue signinbtn" href="" data-toggle="modal" data-target="#orangeModalSubscription"><i class="fas fa-shopping-cart signicon"></i>Sign in</a>
            </li>
            @endif
      </ul>
    <!-- Links -->
  </div>
  <!-- Collapsible content -->

</nav>  
<!--/.Navbar-->

<!-- alerte box start -->
	<div class="alert jumbotron alert-dismissible fade show" role="alert">
		<p>Unlimited video editing, free thumbnails &amp; express delivery! </p> 
		<a href="#">From $26.50/mo</a>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		  <span aria-hidden="true">×</span>
		</button>
	</div>

</div>

