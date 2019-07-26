<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Material Design Bootstrap</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="{{URL::asset('public/css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- Material Design Bootstrap -->
   <link href="{{URL::asset('public/css/compiled-4.8.2.min.css')}}" rel="stylesheet">
 <!-- <link href="css/mdb.min.css" rel="stylesheet">
   Your custom styles (optional) -->
  <link href="{{URL::asset('public/css/style.css')}}" rel="stylesheet">
</head>

<body class="body-signup">

  <!-- Start your project here-->
  <div class="alert jumbotron alert-dismissible fade show" role="alert">
    <p>Unlimited video editing, free thumbnails & express delivery! </p> 
    <a href="#">From $26.50/mo</a>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <!-- <div class="jumbotron text-center top-head">
  <p><b>Unlimited:</b> Video Editing, Free Thumbnails, Express Delivery </p> 
  <a href="#">15.99/mo</a>
</div> -->

<div class="container m-50">
  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4 box-right-form">
      <h1 class="box-heading">Request a password reset</h1>
      <form class="needs-validation signup_form" novalidate>
        <div class="form-group mb-3">
              <input type="text" class="form-control" id="validationCustomUsername" placeholder="Username"
                aria-describedby="inputGroupPrepend" autofocus="autofocus" required>
              <div class="invalid-feedback">
                Please provide a Username.
              </div>
              <div class="valid-feedback">
              Looks good!
            </div>
          </div>
          <div class="form-group mb-3">
              <input type="text" class="form-control" id="validationCustomUsername" placeholder="Email"
                aria-describedby="inputGroupPrepend" required>
              <div class="invalid-feedback">
                Please provide a valid Email.
              </div>
              <div class="valid-feedback">
              Looks good!
            </div>
          </div>
        <button class="btn btn-primary btn-sm create-accountes signbtn" type="submit">Reset Password</button>
      </form> 
    </div>
    <div class="col-md-4"></div>
  </div>
</div> 
 
 

<!-- <footer>
  <div class="jumbotron text-center jumbotron-2">
    <p>©2019 All Rights Reserved Video Editing</p>
  </div> 
</footer>  -->   
  <!-- Start your project here-->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  @include('layouts.partials.footer')
  <script type="text/javascript">
    (function() {
      'use strict';
      window.addEventListener('load', function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
      if (form.checkValidity() === false) {
      event.preventDefault();
      event.stopPropagation();
      }
      form.classList.add('was-validated');
      }, false);
      });
      }, false);
      })();
  </script>
</body>

</html>
