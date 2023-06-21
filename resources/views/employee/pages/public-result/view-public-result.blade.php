@extends('employee.partials.master')

@section('title')
  <title>View Result | Matka Online 24</title>
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
              <li class="breadcrumb-item active">Result</li>
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
                <h3 class="card-title">Result List</h3>
                <a href="{{ route('employee.public_result.add') }}" class="btn btn-sm" style="background: #f39902"><i class="fa fa-plus-circle"></i> Add Result</a>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-striped table-hover">
                    <thead>
                      <tr>
                        <th>SL</th>
                        <th>Bazar</th>
                        <th>Status</th>
                        <th>Category</th>
                        <th>Number</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($getResult as $key=>$value)
                      <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $value->bazar->name }}</td>
                        <td>
                          @if($value->status == 0)
                          Open
                          @elseif($value->status == 1)
                          Close
                          @endif
                        </td>
                        <td>
                          @if($value->category == 1)
                          Single
                          @elseif($value->category == 2)
                          Single Pana
                          @elseif($value->category == 3)
                          Double Pana
                          @elseif($value->category == 4)
                          Triple Pana
                          @elseif($value->category == 5)
                          Jori
                          @endif
                        </td>
                        <td>{{ $value->number }}</td>
                        <td>
                          <a href="{{ route('employee.public_result.edit', $value->id) }}" title="Edit" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                          <a href="{{ route('employee.public_result.delete', $value->id) }}" onclick="return confirm('Are you sure to delete!');" title="Delete" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer"></div>
            </div>
          </div>

        </div><!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->




@endsection

