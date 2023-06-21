@extends('user.partials.master')

@section('title')
  <title>Deposit | Matka Online 24</title>
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
              <li class="breadcrumb-item active">Deposit</li>
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
                <h3 class="card-title">Deposit List</h3>
                <a href="{{ route('user.deposit.add') }}" class="btn btn-sm" style="background: #f39902"><i class="fa fa-plus-circle"></i> Add Deposit</a>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>SL</th>
                        <th>Deposit Amount</th>
                        <th>Trans. Id</th>
                        <th>Account Number</th>
                        <th>Payment Method</th>
                        <th>Status</th>
                        <th>Date</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($allDeposit as $key=>$value)
                        <tr>
                          <td>{{ $key+1 }}</td>
                          <td>{{ $value->deposit_amount }}</td>
                          <td>{{ $value->trans_id }}</td>
                          <td>{{ $value->account_number }}</td>
                          <td>{{ $value->payment_method }}</td>
                          <td>{{ $value->status }}</td>
                          <td>{{ date('d M, Y', strtotime($value->created_at)) }}</td>
                        </tr>
                    @endforeach

                    </tbody>
                    <tfoot>
                      <tr>
                        <th>SL</th>
                        <th>Deposit Amount</th>
                        <th>Trans. Id</th>
                        <th>Account Number</th>
                        <th>Payment Method</th>
                        <th>Status</th>
                        <th>Date</th>
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

