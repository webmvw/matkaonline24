@extends('admin.partials.master')

@section('title')
  <title>View Game | Matka Online 24</title>
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
              <li class="breadcrumb-item active">View Game</li>
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
                <h3 class="card-title">All Game List</h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>SL</th>
                      <th>Bazar Name</th>
                      <th>Category</th>
                      <th>User</th>
                      <th>number</th>
                      <th>Point</th>
                      <th>Date</th>
                      <th>Time</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($allData as $key=>$value)
                        <tr>
                          <td>{{ $key+1 }}</td>
                          <td>
                            {{ $value->gametime->bazar->name }} 
                            @if($value->category !== 5)
                              {{($value->gametime->status == 1)?"Close":""}}
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
                          <td>{{ $value->user->name }}</td>
                          <td>{{ $value->number }}</td>
                          <td>{{ $value->point }}</td>
                          <td>{{ date('d M, Y', strtotime($value->created_at)) }}</td>
                          <td>{{ date('h:i a', strtotime($value->created_at)) }}</td>
                        </tr>
                    @endforeach

                    </tbody>
                    <tfoot>
                    <tr>
                      <th>SL</th>
                      <th>Bazar Name</th>
                      <th>Category</th>
                      <th>User</th>
                      <th>number</th>
                      <th>Point</th>
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

