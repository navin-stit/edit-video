@extends('layouts.partials.header')
 @section('content')
<section>
<img class="hero-bg-top" src="img/bg-top-left.svg" alt="top left icon" aria-hidden="true">  
<div class="container m-50 mtop-70">
  <div class="row">
    <div class="col-md-6 signup-fist-col">
      <h2><b>Welcome to the Video Editing Account Center</b></h2>
      <p>Your Video Editing Account gives you access to any of the Video Editing Market sites, where you can buy or sell digital goods like WordPress themes, background music, After Effects project files, photography and much, much more.</p>
      <p>If you already have an account on one of the Video Editing Market sites, sign in with those details.
      </p>
      <p><a class="button create-accountes btn-primary" href="{{route('register')}}">Create Account</a>
        Don't have an Video Editing Account yet?.
      </p>
    </div>
    <div class="col-md-1"></div>
    <div class="col-md-5 box-right-form">
      <h1 class="box-heading">Sign In</h1>
      <form class="needs-validation signup_form" method="POST" action="{{ route('login') }}" novalidate>
         @csrf
          <div class="form-group mb-3">
              <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email"
                aria-describedby="inputGroupPrepend" value="{{ old('email') }}" name="email" autofocus="autofocus" required>
                

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="form-group mb-3">
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" name="password" required>
             @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        <button class="btn btn-primary btn-sm create-accountes signbtn" type="submit">Sign In</button>
         @if (Route::has('password.request'))
        <small>Forgot <a href="{{ route('password.request') }}" target="_blank">Password</a></small>
         @endif
      </form> 
    </div>
  </div>
</div> 
</section>
<footer class="footer2">
  <a href="#">Help Center</a>
  <a href="#">About Envato</a>
  <a href="#">Privacy Policy</a>
</footer>
<section class="hero-bg-section">
  <img class="hero-bg-bottom" src="img/right-blue_morph.svg" alt="blue icon" aria-hidden="true">
</section>


@endsection
