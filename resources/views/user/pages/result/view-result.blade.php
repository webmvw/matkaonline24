@extends('user.partials.master')

@section('title')
  <title>Result | Matka Online 24</title>
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
              <div class="card-header">
                <h3 class="card-title"><b style="color:blue">Live Result</b></h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped table-hover">
                    <tbody>
                      @foreach($bazars as $key=>$value)
                        <tr>
                          <td class="text-center">
                            <b style="color: blue;">{{ $value->name }}</b> <br>
                            <b style="color:red;">
                            @php
                            $today  = Carbon\Carbon::today();
                            $open_other_numbers = App\Models\PublicResult::whereDate('created_at', $today)->where('bazar_id', $value->id)->where('status', '0')->where('category', '!=', '1')->get();
                            $open_single_numbers = App\Models\PublicResult::whereDate('created_at', $today)->where('bazar_id', $value->id)->where('status', '0')->where('category', '1')->get();
                            $close_single_numbers = App\Models\PublicResult::whereDate('created_at', $today)->where('bazar_id', $value->id)->where('status', '1')->where('category', '1')->get();
                            $close_other_numbers = App\Models\PublicResult::whereDate('created_at', $today)->where('bazar_id', $value->id)->where('status', '1')->where('category', '!=', '1')->get();
                            @endphp

                            <?php
                            if($open_other_numbers->isEmpty()){
                              echo "XXX - ";
                            }else{
                              foreach ($open_other_numbers as $key => $value) {
                                echo $value->number." - ";
                              }
                            }

                            if($open_single_numbers->isEmpty()){
                              echo "X";
                            }else{
                              foreach ($open_single_numbers as $key => $value) {
                                echo $value->number;
                              }
                            }

                            if($close_single_numbers->isEmpty()){
                              echo "X";
                            }else{
                              foreach ($close_single_numbers as $key => $value) {
                                echo $value->number;
                              }
                            }

                            if($close_other_numbers->isEmpty()){
                              echo "- XXX";
                            }else{
                              foreach ($close_other_numbers as $key => $value) {
                                echo "- ".$value->number;
                              }
                            }
                            ?>
                            </b>
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

