
@extends('layouts.partials.header')
@section('content')
<section id="signup-page">
<img class="hero-bg-top" src="img/bg-top-left.svg" alt="top left icon" aria-hidden="true">  
<div class="container m-50 mtop-70">
<div class="row">
<div class="col-md-6 signup-fist-col">
<h2><b>Create a new Video Editing Account</b></h2>
<p>Your Video Editing Account is a single username and password for all of the Video Editing Market sites, listed below. You can use it to sign in and buy or sell digital goods like WordPress themes, background music, After Effects project files, graphics, photography and much more.</p>
<p><strong>Already have an account with any of these sites?</strong>
Then you already have an Video Editing &nbsp;account and can sign in with your existing username and password.
</p>
<p><a class="button create-accountes btn-primary" href="{{ route('login') }}">Sign In</a>
to your existing account.
</p>
</div>
<div class="col-md-1"></div>
<div class="col-md-5 box-right-form">
<h1 class="box-heading">Create Account</h1>
<form class="needs-validation signup_form" method="POST" action="{{ route('register') }}" novalidate>
@csrf
<div class="form-group mb-3">
<input type="text" class="form-control" placeholder="First name" value="{{ old('first_name') }}" aria-describedby="inputGroupPrepend" autofocus="autofocus" name="first_name" required>
<div class="invalid-feedback">
Please Enter First name.
</div>
<div class="valid-feedback">
Looks good!
</div>
</div>
<div class="form-group mb-3">
<input type="text" class="form-control" value="{{ old('last_name') }}" placeholder="Last name"
aria-describedby="inputGroupPrepend" name="last_name" required>
<div class="invalid-feedback">
Please Enter Last name.
</div>
<div class="valid-feedback">
Looks good!
</div>
</div>
<div class="form-group mb-3">
<input type="text" class="form-control" id="" value="{{ old('name') }}" placeholder="Username" name="name" aria-describedby="inputGroupPrepend" required>
<div class="invalid-feedback">
Please choose a username.
</div>
<div class="valid-feedback">
Looks good!
</div>
</div>
<div class="form-group mb-3">
<input type="text" class="form-control" id="" value="{{ old('email') }}" name="email" placeholder="Email" required>
<div class="invalid-feedback">
Please provide a valid Email.
</div>
<div class="valid-feedback">
Looks good!
</div>
</div>
<div class="form-group mb-3">
<input type="password" class="form-control" id="" placeholder="Password" name="password" required>
<div class="invalid-feedback">
Please provide a valid password.
</div>
<div class="valid-feedback">
Looks good!
</div>
</div>
<div class="form-group mb-3">
<input type="password" class="form-control" id="validationCustom04" placeholder="Confirm Password" name="password_confirmation" required>
<div class="invalid-feedback">
Please provide a valid password.
</div>
<div class="valid-feedback">
Looks good!
</div>
</div>
<div class="meter meter-init">
<b class="meter-1"></b>
<b class="meter-2"></b>
<b class="meter-3"></b>
<b class="meter-4"></b>
</div>
<div class="form-group">
<div class="form-check">
<input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
<label class="form-check-label" for="invalidCheck">
I agree to the Video Editing <a href ="">Privacy Policy</a>.
</label>
<div class="invalid-feedback">
You must agree before submitting.
</div>
<div class="valid-feedback">
Looks good!
</div>
</div>
</div>
<div class="form-group mb-3">
<div class="g-recaptcha" data-sitekey="___enter_site_key___"></div>
</div>
<button class="btn btn-primary btn-sm create-accountes" type="submit">Create Account</button>
</form> 
</div>
</div>
</div> 
<footer class="footer2">
  <a href="#">Help Center</a>
  <a href="#">About Envato</a>
  <a href="#">Privacy Policy</a>
</footer>
</section>
<section class="hero-bg-section">
  <img class="hero-bg-bottom" src="img/right-blue_morph.svg" alt="blue icon" aria-hidden="true">
</section>

 @endsection