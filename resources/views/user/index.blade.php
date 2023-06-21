@extends('user.partials.master')

@section('title')
  <title>Matka Online 24 | Dashboard</title>
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
              <li class="breadcrumb-item active">Dashboard</li>
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
                <h3 class="card-title">Profile - <b>{{Auth::user()->name}}</b></h3>
              </div>
              <div class="card-body">
                  
                @if(Auth::user()->status == 0)
                <div class="alert alert-danger" role="alert">
                  Your Profile is Suspended
                </div>
                @endif
                
                <div class="row">
                  <div class="col-md-3" style="display: flex;flex-direction: column;align-items: center;">
                    @if(Auth::user()->image == null)
                    <img src="{{ asset('public/img/user.png') }}" class="img-circle elevation-2" alt="User Image" style="width:150px;height: 150px;">
                    @else
                    <img src="{{ asset('public/img/user/'.Auth::user()->image) }}" class="img-circle elevation-2" alt="User Image" style="width:150px;height: 150px;">
                    @endif
                    <h5>
                      @if(Auth::user()->balance == null)
                      Balance: <span style="color: #B13147">0.0</span> Rs
                      @else
                      Balance: <span style="color:#B13147">{{ Auth::user()->balance }}</span> Rs
                      @endif
                    </h5>
                    @if(Auth::user()->profile_verified == 0)
                    <a href="{{ route('user.editprofile') }}" class="btn btn-sm btn-info">Verify Now</a>
                    @else
                    <button class="btn btn-sm" style="background: red;color:#fff"><i class="fa fa-check-circle"></i> Verified</button>
                    @endif
                    <br>
                  </div>
                  <div class="col-md-9">
                    <table class="table table-striped table-bordered">
                      <tr>
                        <td>Username</td>
                        <td>{{Auth::user()->name}}</td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td>{{Auth::user()->email}}</td>
                      </tr>
                      <tr>
                        <td>Address</td>
                        <td>{{Auth::user()->address}}</td>
                      </tr>
                      <tr>
                        <td>Mobile Wallet Number</td>
                        <td>{{Auth::user()->bank_account_number}}</td>
                      </tr>
                      <tr>
                        <td>Change your password?</td>
                        <td><a href="{{ route('change.password') }}" class="btn btn-sm" style="background: #F39902">Change password</a></td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
              <div class="card-footer"></div>
            </div>  
          </div> 
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection