@extends('admin.partials.master')

@section('title')
  <title>Reject Deposit | Matka Online 24</title>
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
              <li class="breadcrumb-item active">Reject Deposit</li>
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
                <h3 class="card-title">Reject Deposit List</h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>SL</th>
                      <th>User</th>
                      <th>Deposit Amount</th>
                      <th>Account Number</th>
                      <th>Payment Method</th>
                      <th>Trans. Id</th>
                      <th>Status</th>
                      <th>Date</th>
                      <th>Time</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($rejectDeposit as $key=>$value)
                      <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $value->user->name }}</td>
                        <td>{{ $value->deposit_amount }}</td>
                        <td>{{ $value->account_number }}</td>
                        <td>{{ $value->payment_method }}</td>
                        <td>{{ $value->trans_id }}</td>
                        <td>{{ $value->status }}</td>
                        <td>{{ date('d M, Y', strtotime($value->created_at)) }}</td>
                        <td>{{ date('h:i a', strtotime($value->created_at)) }}</td>
                      </tr>
                    @endforeach

                    </tbody>
                    <tfoot>
                      <tr>
                        <th>SL</th>
                        <th>User</th>
                        <th>Deposit Amount</th>
                        <th>Account Number</th>
                        <th>Payment Method</th>
                        <th>Trans. Id</th>
                        <th>Status</th>
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

