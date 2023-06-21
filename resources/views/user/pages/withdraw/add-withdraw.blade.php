@extends('user.partials.master')

@section('title')
  <title>Withdraw | Matka Online 24</title>
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
              <li class="breadcrumb-item active">Withdraw</li>
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
                <h3 class="card-title">Withdraw Request</h3>
                <a href="{{ route('user.withdraw.view') }}" class="btn btn-success btn-sm"><i class="fa fa-list"></i> Withdraw list</a>
              </div>
              <!-- /.card-header -->
                <div class="card-body text-center">
                  <h2>Balance: <span style="color:#B13147">{{ Auth::user()->balance }}</span> Rs</h2>
                  <p>Your Withdraw Account: {{ Auth::user()->bank_account_number }}</p>
                  <p><b>Note:</b> Minimum withdraw request 1000 and Maximum withdraw request 10000</p>
                  <hr>
                  @php
                  $withdraw_status = App\Models\Settings::orderBy('id', 'desc')->first();
                  @endphp
                  @if($withdraw_status->withdraw_status == 1)
                  <div class="row">
                    <div class="col-md-6 offset-3">
                      @include('user.partials.message')
                      <form action="{{ route('user.withdraw.store') }}" method="post" id="quickForm" class=" align-items-center form-prevent-multiple-submits">
                        @csrf
                          <div class="form-group">
                            <label for="payment_method">Payment Method</label>
                            <select name="payment_method" class="form-control form-control-sm" id="payment_method">
                              <option value="Bkash">Bkash</option>
                              <option value="Nagad">Nagad</option>
                              <option value="Rocket">Rocket</option>
                              <option value="Paytm">Paytm</option>
                            </select>
                          </div>
                          <div class="input-group">
                            <input type="number" name="withdraw_amount" class="form-control form-control-sm" id="withdraw_amount" placeholder="Amount">
                          </div>
                          <br>
                          <button type="submit" class="btn btn-sm button-prevent-multiple-submits" style="background: #f39902">Withdraw</button>
                      </form>
                    </div>
                  </div>
                  @else
                  <div class="alert alert-danger" role="alert">
                    Withdrawal system is temporarily closed. Please try again later.
                  </div>
                  @endif
                  <hr>
                  <b><center style="color:red;">Every day withdrawal time 10:00 AM to 02:00 PM</center></b>
                  <hr>
                  <img src="{{ asset('public/img/payment.png') }}" alt="payment image" style="width: 100%">
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


<script>
$(function () {
  $('#quickForm').validate({
    rules: {
      payment_method:{
        required: true,
      },
      withdraw_amount: {
        required: true,
        number:true,
        min:500,
        max:30000,
      },
    },
    messages: {
      payment_method:{
        required: "Please select payment method",
      },
      withdraw_amount: {
        required: "Please enter withdraw amount",
        number: "Invalid withdraw number",
        min: "Minimum withdraw value 1000",
        max: "Maximum withdraw value 10000",
      },
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.input-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>


@endsection

