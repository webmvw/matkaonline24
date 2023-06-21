
@extends('employee.partials.master')

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
              <li class="breadcrumb-item"><a href="{{ route('employee.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('employee.result.view') }}">Result</a></li>
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
                <a href="{{ route('employee.result.view') }}" class="btn btn-sm" style="background: #f39902"><i class="fa fa-list"></i> View Result</a>
              </div>

              <!-- /.card-header -->
                 <form method="post" action="{{ route('employee.result.store') }}" id="quickForm" novalidate="novalidate" class="form-prevent-multiple-submits"> 
                  @csrf
                    <div class="card-body">
                      @include('employee.partials.message')
                      <div class="row">
                        <div class="col-md-8 offset-2">
                          <div class="form-group">
                            <label for="result_date">Select Date</label>
                            <input type="date" class="form-control form-control-sm" name="result_date" id="result_date" required>
                          </div>
                          <div class="form-group">
                            <label for="bazar_name">Select Bazar</label>
                            <select id="bazar_name" class="form-control form-control-sm select2" name="bazar_name" required>
                              <option value="">Select Bazar</option>
                              @foreach($GameTime as $key=>$value)
                              <option value="{{ $value->id }}">{{ $value->bazar->name }} {{($value->status == 1)?"Close":""}}</option>
                              @endforeach
                            </select>
                          </div>
                          <table class="table table-striped table-sm">
                            <thead>
                              <tr class="table-success">
                                <th>Category</th> 
                                <th>Number</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>
                                  <select class="form-control form-control-sm" id="category" name="category[]" required>
                                    <option value="">Select Category</option>
                                    <option value="1">Single</option>
                                    <option value="2">Single Pana</option>
                                    <option value="3">Double Pana</option>
                                    <option value="4">Tripple Pana</option>
                                    <option value="5">Jori</option>
                                  </select>
                                </td>
                                <td>
                                  <input type="number" id="number" name="number[]" class="form-control form-control-sm" required>
                                </td>
                                <td>
                                  <span class="btn btn-sm addeventmore" style="background: #f39902">add</span>
                                </td>
                              </tr>
                            </tbody>
                            <tbody id="addRow"></tbody>
                          </table>
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
      bazar_name: {
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


    <!-- extra html for if existing event -->
    <script type="text/x-handlebars-template" id="document-template">
      <tr class="delete_add_more_item">
        <td>
          <select class="form-control form-control-sm" id="category" name="category[]" required>
            <option value="">Select Category</option>
            <option value="1">Single</option>
            <option value="2">Single Pana</option>
            <option value="3">Double Pana</option>
            <option value="4">Tripple Pana</option>
            <option value="5">Jori</option>
          </select>
        </td>
        <td>
          <input type="number" id="number" name="number[]" class="form-control form-control-sm" required>
        </td>
        <td>
          <span class="btn btn-sm btn-success addeventmore">add</span>
          <span class="btn btn-sm btn-danger removeeventmore">remove</span>
        </td>
      </tr>  
    </script>

  <script type="text/javascript">
    $(document).ready(function(){
      $(document).on('click', '.addeventmore', function(){
        var source = $('#document-template').html();
        var template = Handlebars.compile(source);
        $('#addRow').append(template);
      });
      $(document).on('click', '.removeeventmore', function(event){
        $(this).closest('.delete_add_more_item').remove();
      });
    });
  </script>


@endsection
