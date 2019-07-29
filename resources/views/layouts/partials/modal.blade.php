<!-- start login/ signup model -->
<!-- Modals popup start -->
  <div class="modal fade" id="orangeModalSubscription" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-notify modal-warning" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header text-center">
        <div class="modal-logo"><img src="{{asset('public/img/logo.png')}}"></div>
      </div>

      <!--Body-->
      <div class="modal-body">
        <h4 class="text-center modal-title"><b>Great to have you back!</b></h4> 
        <form class="needs-validation signup_form" novalidate method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationCustomUsername">Username</label>
                            <a class="float-right labelrem" href="">Remind me</a>
                            <input type="text" class="form-control  @error('email') is-invalid @enderror" id="email"
                                   aria-describedby="inputGroupPrepend" value="{{ old('email') }}" name="email"  autofocus="autofocus" required>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror                            
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom03">Password</label>
                            <a class="float-right labelrem" href="{{ route('password.request') }}">Reset</a>
                            <input type="Password" class="form-control @error('password') is-invalid @enderror" id="password"  name="password" required>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>                    
                    <div class="text-center">
                        <button class="btn waves-effect btn-primary btn-sm justify-content-center" type="submit">
                            <i class="fas fa-shopping-cart"></i> Sign in
                        </button>
                    </div>
                </form>
        <p class="text-center modalfotter">New here? <a data-test-selector="sign-up-modal-button" class="" href="{{route('register')}}" target="_blank">Create an account</a></p>
      </div>

    </div>
    <!--/.Content-->
  </div>
</div>
<!-- Modals popup end -->
<!-- end login/ signup model -->

<!--Add Employee modal-->
<div class="modal fade" id="addEmployeeModalForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Add Employee</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <div class="md-form mb-5">
                    <label data-error="wrong" data-success="right" for="orangeForm-name">Name</label>
                    <input type="text" name="name" id="employeeName" class="form-control ">                         
                </div>
                <div class="md-form mb-5">
                    <label data-error="wrong" data-success="right" for="orangeForm-email">E-mail</label>
                    <input type="email" name="email" id="employeeEmail" class="form-control "> 
                    <p style="color:red;font-size: 14px;display:none;" id="errorMessage">
                        User Already exists
                    </p>
                </div>

                <div class="md-form mb-4">
                    <label data-error="wrong" data-success="right" for="orangeForm-pass">Contact Number</label>
                    <input type="text" name="contact" id="employeeContact" class="form-control ">
                </div>  
                <div class="md-form mb-4">
                    <label data-error="wrong" data-success="right" for="orangeForm-pass">Status</label><br>
                    <label class="radio-inline"><input type="radio" name="optradio" id="chk_1">Active</label>
                    <label class="radio-inline" ><input type="radio" name="optradio" id="chk_0">Deactive</label>
                    <p class="chekErrorMsg"></p>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center" style="text-align: center">
                <button class="btn btn-deep-orange" id="addEmployee"  
                        style="width:30%;letter-spacing: 1px;background-color:#08c;color: #fff;">Add</button>
            </div>
        </div>
    </div>
</div>
<!-- End Add Employee modal-->

<!--Edit Employee modal-->
<div class="modal fade" id="editEmployeeModalForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Edit Employee</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <div class="md-form mb-5">                   
                    <input type="hidden" name="id" class="form-control" id="emp_id">                         
                </div>
                <div class="md-form mb-5">                   
                    <input type="hidden" name="user_id" class="form-control" id="user_id">                         
                </div>
                <div class="md-form mb-5">
                    <label data-error="wrong" data-success="right" for="orangeForm-name">Name</label>
                    <input type="text" name="name" id="emp_name" class="form-control ">                         
                </div>
                <div class="md-form mb-5">
                    <label data-error="wrong" data-success="right" for="orangeForm-email">E-mail</label>
                    <input type="email" name="email" id="emp_email" class="form-control ">                            
                </div>

                <div class="md-form mb-4">
                    <label data-error="wrong" data-success="right" for="orangeForm-pass">Contact Number</label>
                    <input type="text" name="contact" id="emp_contact" class="form-control ">
                </div>  
                <div class="md-form mb-4">
                    <label data-error="wrong" data-success="right" for="orangeForm-pass">Status</label><br>
                    <label class="radio-inline"><input type="radio" name="optradio" id="chek_1">Active</label>
                    <label class="radio-inline"><input type="radio" name="optradio" id="chek_0">Deactive</label>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center" style="text-align: center">
                <button class="btn btn-deep-orange" id="UpdateEmp"  
                        style="width:30%;letter-spacing: 1px;background-color:#08c;color: #fff;">Update</button>
            </div>
        </div>
    </div>
</div>
<!-- End Edit Employee modal-->