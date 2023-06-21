@extends('user.partials.master')

@section('title')
  <title>Matka Online 24 | Edit Profile</title>
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
                <h3 class="card-title">Edit Profile - {{Auth::user()->name}}</h3>
              </div>
              <div class="card-body">
                <form method="post" action="{{ route('user.updateprofile') }}" id="quickForm" novalidate="novalidate" enctype="multipart/form-data" class="form-prevent-multiple-submits"> 
                  @csrf
                  @include('user.partials.message')
                  <div class="row">
                    <div class="col-md-8 offset-2">
                      <div class="form-group">
                        <label for="name">Username</label>
                        <input type="text" value="{{Auth::user()->name}}" name="name" class="form-control form-control-sm" id="name" placeholder="Enter Username" disabled>
                      </div>
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" value="{{Auth::user()->email}}" name="email" id="email" placeholder="Email Address" class="form-control form-control-sm" disabled>
                      </div>
                      <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" value="{{Auth::user()->address}}" name="address" id="address" placeholder="Your Address" class="form-control form-control-sm">
                      </div>
                      <div class="form-group">
                        <label for="bank_account_number">Mobile Wallet Number</label>
                        <input type="text" value="{{Auth::user()->bank_account_number}}" name="bank_account_number" id="bank_account_number" placeholder="Bank Account Number" class="form-control form-control-sm" aria-describedby="bankAccountNumber">
                        <small id="bankAccountNumber" class="form-text text-muted">Bkash, Nagad, Rocket, Paytm</small>
                      </div>
                      <button type="submit" class="btn btn-sm button-prevent-multiple-submits" style="background: #f39902">Update</button>
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
      address: {
        required: true,
        maxlength:60,
      },
      bank_account_number: {
        required: true,
        maxlength:60,
      },
    },
    messages: {
      address: {
        required: "Please enter your address",
        maxlength: "Your address must be at least 60 characters long",
      },
      bank_account_number: {
        required: "Please enter your bank account number",
        maxlength: "Bank account number must be at least 60 characters long",
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



@endsection