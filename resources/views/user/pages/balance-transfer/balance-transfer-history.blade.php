@extends('user.partials.master')

@section('title')
  <title>Balance Transfer History | Matka Online 24</title>
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0 text-gold">Matka Online 24</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Balance Transfer History</li>
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
                <h3 class="card-title">Balance Transfer History</h3>
                <a href="{{ route('user.balance_transfer.view') }}" class="btn btn-sm" style="background: #f39902"><i class="fa fa-plus-circle"></i> Balance Transfer</a>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>SL</th>
                      <th>From User</th>
                      <th>To User</th>
                      <th>amount</th>
                      <th>Date</th>
                      <th>Time</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($allData as $key=>$value)
                      <tr>
                        <td>{{ $key+1 }}</td>
                        @php
                        $from_user = App\Models\User::find($value->from_user);
                        $to_user = App\Models\User::find($value->to_user);
                        @endphp
                        <td>{{ $from_user->name }}</td>
                        <td>{{ $to_user->name }}</td>
                        <td>{{ $value->amount }}</td>
                        <td>{{ date('d M, Y', strtotime($value->created_at)) }}</td>
                        <td>{{ date('h:i a', strtotime($value->created_at)) }}</td>
                      </tr>
                    @endforeach

                    </tbody>
                    <tfoot>
                      <tr>
                        <th>SL</th>
                        <th>From User</th>
                        <th>To User</th>
                        <th>amount</th>
                        <th>Date</th>
                        <th>Time</th>
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

