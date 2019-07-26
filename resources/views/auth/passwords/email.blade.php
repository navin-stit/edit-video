@extends('layouts.partials.header')
@section('content')
<section>
<img class="hero-bg-top" src="{{asset('public/img/bg-top-left.svg')}}" alt="top left icon" aria-hidden="true">    
<div class="container m-50 mtop-70">
  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4 box-right-form">
      <h1 class="box-heading">Request a password reset</h1>
         @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
          @endif
         
    <form class="needs-validation signup_form" method="POST" action="{{ route('password.email') }}" novalidate>
        @csrf
          <div class="form-group mb-3">
              <input type="text" class="form-control @error('email') is-invalid @enderror" id="name"  value="{{ old('email') }}" placeholder="Email" name="email" aria-describedby="inputGroupPrepend" required>
              <div class="invalid-feedback">
                Please provide a valid Email.
              </div>
              <div class="valid-feedback">
              Looks good!
            </div>
          </div>

          @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        <button class="btn btn-primary btn-sm create-accountes signbtn" type="submit">Reset Password</button>
      </form> 
    </div>
    <div class="col-md-4"></div>
  </div>
</div> 
</section>
<section class="hero-bg-section">
  <img class="hero-bg-bottom" src="{{asset('public/img/right-blue_morph.svg')}}" alt="blue icon" aria-hidden="true">
</section>
@endsection