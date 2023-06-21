
@extends('admin.partials.master')

@section('title')
  <title>Add Game Time | Matka Online 24</title>
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
              <li class="breadcrumb-item"><a href="{{ route('admin.gameTime.view') }}">Game Time</a></li>
              <li class="breadcrumb-item active">Add Game Time</li>
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
                <h3 class="card-title">Add Game Time</h3>
                <a href="{{ route('admin.gameTime.view') }}" class="btn btn-sm" style="background: #f39902"><i class="fa fa-list"></i> Game Time List</a>
              </div>

              <!-- /.card-header -->
                 <form method="post" action="{{ route('admin.gameTime.store') }}" id="quickForm" novalidate="novalidate" class="form-prevent-multiple-submits"> 
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
                            <label for="open_time">Open Time</label>
                            <input type="time" name="open_time" id="open_time" class="form-control form-control-sm">
                          </div>
                          <div class="form-group">
                            <label for="close_time">Close Time</label>
                            <input type="time" name="close_time" id="close_time" class="form-control form-control-sm">
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
      open_time:{
        required: true,
      },
      close_time:{
        required: true,
      },
    },
    messages: {
      bazar_id: {
        required: "Please select bazar",
      },
      status: {
        required: "Please select status",
      },
      open_time:{
        required: "Please enter open time",
      },
      close_time:{
        required: "Please enter close time",
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
