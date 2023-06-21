
@extends('admin.partials.master')

@section('title')
  <title>Edit Bank Account | Matka Online 24</title>
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
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin.account.view') }}">Bank Account</a></li>
              <li class="breadcrumb-item active">Edit Bank Account</li>
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
              <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title">Edit Bank account - {{ $getAccount->account_name }}</h3>
                <a href="{{ route('admin.account.view') }}" class="btn btn-sm" style="background: #f39902"><i class="fa fa-list"></i> Bank Account List</a>
              </div>

              <!-- /.card-header -->
                 <form method="post" action="{{ route('admin.account.update', $getAccount->id) }}" id="quickForm" novalidate="novalidate" class="form-prevent-multiple-submits"> 
                  @csrf
                    <div class="card-body">
                      @include('admin.partials.message')
                      <div class="row">
                        <div class="col-md-8 offset-2">
                          <div class="form-group">
                            <label for="account_name">Account Name</label>
                            <input type="text" value="{{ $getAccount->account_name }}" name="account_name" class="form-control form-control-sm" id="account_name" placeholder="Enter Account Name">
                          </div>
                          <div class="form-group">
                            <label for="account_number">Account Number</label>
                            <input type="number" value="{{ $getAccount->account_number }}" name="account_number" id="account_number" placeholder="Account Number" class="form-control form-control-sm">
                          </div>
                          <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control form-control-sm" name="status" id="status">
                              <option value="">Select Status</option>
                              <option value="1" {{ ($getAccount->status == 1)?"selected":"" }}>Active</option>
                              <option value="0" {{ ($getAccount->status == 0)?"selected":"" }}>Inactive</option>
                            </select>
                          </div>
                          <button type="submit" class="btn btn-sm button-prevent-multiple-submits" style="background: #f39902">Update</button>
                        </div>
                      </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer"> </div>
                  </form> 

              <div class="card-footer"></div>
            </div> <!-- .card end -->

          </div>
        </div><!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<script>
$(function () {
  $('#quickForm').validate({
    rules: {
      account_name: {
        required: true,
        maxlength:30,
      },
      account_number:{
        required: true,
        number:true,
      },
      status: {
        required: true,
      },
    },
    messages: {
      account_name: {
        required: "Please enter account name",
        maxlength: "Your name must be at least 30 characters long"
      },
      account_number:{
        required: "Please enter account number",
        number: "Invalid account number",
      },
      status: {
        required: "Please select status",
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
