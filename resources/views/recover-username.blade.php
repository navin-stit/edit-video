<!DOCTYPE html>
<html lang="en">

@include('layouts.partials.header')

  <!-- <div class="jumbotron text-center top-head">
  <p><b>Unlimited:</b> Video Editing, Free Thumbnails, Express Delivery </p> 
  <a href="#">15.99/mo</a>
</div> -->

<div class="container m-50">
  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4 box-right-form">
      <h1 class="box-heading">Forgot username</h1>
      <p class="change-email">Enter your email and we'll send you your username.</p>
      <form class="needs-validation signup_form" novalidate>
          <div class="form-group mb-3">
              <input type="text" class="form-control" id="validationCustomUsername" placeholder="Email"
                aria-describedby="inputGroupPrepend" autofocus="autofocus" required>
              <div class="invalid-feedback">
                Please provide a valid Email.
              </div>
              <div class="valid-feedback">
              Looks good!
            </div>
          </div>
        <button class="btn btn-primary btn-sm create-accountes signbtn" type="submit">Send Username</button>
      </form> 
    </div>
    <div class="col-md-4"></div>
  </div>
</div> 
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
