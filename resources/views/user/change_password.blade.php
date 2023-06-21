@extends('user.partials.master')

@section('title')
  <title>Matka Online 24 | Change Password</title>
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-gold">Matka Online 24</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Change Password</h3>
              </div>
              <div class="card-body">
                <form method="post" action="{{ route('Update.Password') }}" id="quickForm" novalidate="novalidate" enctype="multipart/form-data" class="form-prevent-multiple-submits"> 
                  @csrf
                  @include('user.partials.message')
                  <div class="row">
                    <div class="col-md-8 offset-2">
                      <div class="form-group">
                        <label for="current_password">Current Password</label>
                        <input type="password" name="oldpassword" class="form-control form-control-sm" id="current_password" placeholder="Current Password">
                        @error('oldpassword')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="password">New Password</label>
                        <input type="password" name="password" id="password" placeholder="New Password" class="form-control form-control-sm">
                        @error('password')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="password-confirm">Confirm Password</label>
                        <input id="password-confirm" type="password" class="form-control form-control-sm" name="password_confirmation" autocomplete="new-password" placeholder="Confirm Password">
                      </div>

                      <div class="input-group mb-3">
                        <div class="icheck-primary">
                          <input class="form-check-input" type="checkbox" id="show_password" onclick="showPassword()">
                          <label for="show_password">
                            Show Password
                          </label>
                        </div>
                      </div>

                      <button type="submit" class="btn btn-sm button-prevent-multiple-submits" style="background: #f39902">Save</button>
                    </div>
                  </div>
                </form>
              </div>
              <div class="card-footer"></div>
            </div>  
          </div> 
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<script>
$(function () {
  $('#quickForm').validate({
    rules: {
      oldpassword: {
        required: true,
      },
      password: {
        required: true,
      },
      password_confirmation: {
        required: true,
      },
    },
    messages: {
      oldpassword: {
        required: "Please enter your current password",
      },  
      password: {
        required: "Please enter your new password",
      },
      password_confirmation:{
        required: "Please enter confirm password",
        equalTo : "#password",
      },
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>

<script type="text/javascript">
  function showPassword() {
    var x = document.getElementById("password");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
    var y = document.getElementById("password-confirm");
    if (y.type === "password") {
      y.type = "text";
    } else {
      y.type = "password";
    }
    var z = document.getElementById("current_password");
    if (z.type === "password") {
      z.type = "text";
    } else {
      z.type = "password";
    }
  }
</script>



@endsection