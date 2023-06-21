@extends('user.partials.master')

@section('title')
  <title>Game Timing | Matka Online 24</title>
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
              <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Game Time</li>
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
                <h3 class="card-title">Game Time</h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                  <table class="table table-sm table-bordered table-hover">
                    <thead class="bg-info">
                      <tr>
                        <th>SL</th>
                        <th>Bazar Name</th>
                        <th>Open Time</th>
                        <th>Close Time</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($allGameTime as $key=>$value)
                        <tr>
                          <td>{{ $key+1 }}</td>
                          <td>{{ $value->bazar->name }} {{($value->status == 1)?"Close":""}}</td>
                          <td>{{ date('h:i a', strtotime($value->open_time)) }}</td>
                          <td>{{ date('h:i a', strtotime($value->close_time)) }}</td>
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

