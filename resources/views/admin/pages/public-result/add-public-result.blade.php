
@extends('admin.partials.master')

@section('title')
  <title>Add Result | Matka Online 24</title>
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
              <li class="breadcrumb-item"><a href="{{ route('admin.result.view') }}">Result</a></li>
              <li class="breadcrumb-item active">Add Result</li>
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
                <h3 class="card-title">Add Result</h3>
                <a href="{{ route('admin.public_result.view') }}" class="btn btn-sm" style="background: #f39902"><i class="fa fa-list"></i> View Result</a>
              </div>

              <!-- /.card-header -->
                 <form method="post" action="{{ route('admin.public_result.store') }}" id="quickForm" novalidate="novalidate" class="form-prevent-multiple-submits"> 
                  @csrf
                    <div class="card-body">
                      @include('admin.partials.message')
                      <div class="row">
                        <div class="col-md-8 offset-2">
                          <div class="form-group">
                            <label for="bazar_id">Bazar Name</label>
                            <select id="bazar_id" class="form-control form-control-sm select2" name="bazar_id" required>
                              <option value="">Select Bazar</option>
                              @foreach($bazars as $key=>$value)
                              <option value="{{ $value->id }}">{{ $value->name }}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="status">Status</label>
                            <select id="status" class="form-control form-control-sm" name="status">
                              <option value="0">Open</option>
                              <option value="1">Close</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="category">Category</label>
                            <select class="form-control form-control-sm" id="category" name="category" required>
                              <option value="">Select Category</option>
                              <option value="1">Single</option>
                              <option value="2">Single Pana</option>
                              <option value="3">Double Pana</option>
                              <option value="4">Tripple Pana</option>
                              <option value="5">Jori</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="number">Number</label>
                            <input type="number" id="number" name="number" class="form-control form-control-sm">
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
      bazar_id: {
        required: true,
      },
      status: {
        required: true,
      },
      category:{
        required: true,
      },
      number:{
        required: true,
      },
    },
    messages: {
      bazar_name: {
        required: "Please select bazar",
      },
      status: {
        required: "Please select status",
      },
      category:{
        required: "Please select category",
      },
      number: {
        required: "number is required",
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
