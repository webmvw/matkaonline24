@extends('admin.partials.master')

@section('title')
  <title>View Whatsapp | Matka Online 24</title>
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
              <li class="breadcrumb-item active">Settings</li>
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
                <h3 class="card-title">Settings</h3>
              </div>
              <!-- /.card-header -->
                <form method="post" action="{{ route('admin.settings.update', $whatsapp->id) }}" id="quickForm" novalidate="novalidate"> 
                  @csrf
                    <div class="card-body">
                      @include('admin.partials.message')
                      <div class="row">
                        <div class="col-md-8 offset-2">
                          <div class="form-group">
                            <label for="whatsapp">Whatsapp Number</label>
                            <input type="text" name="whatsapp" class="form-control form-control-sm" id="whatsapp" placeholder="Enter Whatsapp Number" value="{{ $whatsapp->whatsapp }}">
                          </div>
                          <div class="form-group">
                            <label>Withdraw Status</label> <br>
                            <input type="radio" name="withdraw_status" value="1" {{ ($whatsapp->withdraw_status == 1)?'checked':'' }} > Enable
                            <input type="radio" name="withdraw_status" value="0" {{ ($whatsapp->withdraw_status == 0)?'checked':'' }}> Disable
                          </div>
                          <button type="submit" class="btn btn-sm" style="background: #f39902">Update</button>
                        </div>
                      </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer"></div>
                  </form>

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

