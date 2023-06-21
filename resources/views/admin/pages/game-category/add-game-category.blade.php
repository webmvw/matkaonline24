
@extends('admin.partials.master')

@section('title')
  <title>Add Game Category | Matka Online 24</title>
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
              <li class="breadcrumb-item"><a href="{{ route('admin.gameCategory.view') }}">Game Category</a></li>
              <li class="breadcrumb-item active">Add Game Category</li>
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
                <h3 class="card-title">Add Game Category</h3>
                <a href="{{ route('admin.gameCategory.view') }}" class="btn btn-sm" style="background: #f39902"><i class="fa fa-list"></i> Game Category List</a>
              </div>

              <!-- /.card-header -->
                 <form method="post" action="{{ route('admin.gameCategory.store') }}" id="quickForm" novalidate="novalidate" class="form-prevent-multiple-submits"> 
                  @csrf
                    <div class="card-body">
                      @include('admin.partials.message')
                      <div class="row">
                        <div class="col-md-8 offset-2">
                          <div class="form-group">
                            <label for="name"> Name</label>
                            <input type="text" name="name" class="form-control form-control-sm" id="name" placeholder="Enter Category Name">
                          </div>
                          <div class="form-group">
                            <label for="deposit_point">Deposit Point</label>
                            <input type="number" name="deposit_point" id="deposit_point" placeholder="Deposit Point" class="form-control form-control-sm">
                          </div>
                          <div class="form-group">
                            <label for="withdraw_point">Withdraw Point</label>
                            <input type="number" name="withdraw_point" id="withdraw_point" placeholder="Withdraw Point" class="form-control form-control-sm">
                          </div>
                          <button type="submit" class="btn btn-sm button-prevent-multiple-submits" style="background: #f39902">Submit</button>
                        </div>
                      </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer"></div>
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
      name: {
        required: true,
        maxlength:30,
      },
      deposit_point:{
        required: true,
        number:true,
      },
      withdraw_point:{
        required: true,
        number:true,
      },
    },
    messages: {
      name: {
        required: "Please enter category name",
        maxlength: "Your name must be at least 30 characters long"
      },
      deposit_point:{
        required: "Please enter deposit point",
        number: "Invalid deposit point number",
      },
      withdraw_point:{
        required: "Please enter withdraw point",
        number: "Invalid withdraw point number",
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
