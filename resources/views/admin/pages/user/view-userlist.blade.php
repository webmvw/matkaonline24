@extends('admin.partials.master')

@section('title')
  <title>User List | Matka Online 24</title>
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
              <li class="breadcrumb-item active">All User List</li>
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
                <h3 class="card-title">All User List</h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>SL</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>phone</th>
                      <th>Address</th>
                      <th>balance</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($allUser as $key=>$value)
                        <tr>
                          <td>{{ $key+1 }}</td>
                          <td>{{ $value->name }}</td>
                          <td>{{ $value->email }}</td>
                          <td>{{ $value->bank_account_number }}</td>
                          <td>{{ $value->address }}</td>
                          <td>
                            @if($value->balance == null)
                            00/=
                            @else
                            {{ $value->balance }}/=
                            @endif
                          </td>
                          <td>
                            @if($value->status == 1)
                            <span style="color:green">Active</span>
                            @elseif($value->status == 0)
                            <span style="color:red">Suspend</span>
                            @endif
                          </td>
                          <td>
                            @if($value->status == 1)
                            <a href="{{ route('admin.userlist.suspend',$value->id) }}" onclick="return confirm('Are you sure to Suspend!');" class="btn btn-sm btn-danger">Suspend</a>
                            @elseif($value->status == 0)
                            <a href="{{ route('admin.userlist.active',$value->id) }}" onclick="return confirm('Are you sure to Active!');" class="btn btn-sm btn-success">Active</a>
                            @endif
                            
                            <a href="{{ route('admin.userlist.edit', $value->id) }}" title="Edit" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                          </td>
                        </tr>
                    @endforeach

                    </tbody>
                    <tfoot>
                    <tr>
                      <th>SL</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>phone</th>
                      <th>Address</th>
                      <th>balance</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                    </tfoot>
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

