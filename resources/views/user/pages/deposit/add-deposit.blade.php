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
            <h1 class="m-0 text-gold">Matka Online 24</h1>
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
                <h3 class="card-title">Add Deposit</h3>
                <a href="{{ route('user.deposit.view') }}" class="btn btn-sm" style="background: #f39902"><i class="fa fa-list"></i> Deposit list</a>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6 col-lg-6 col-sm-6">
                      <h4>Deposit Form</h4>
                      <hr>
                      <table class="table table-bordered">
                        @php
                          $result = App\Models\BankAccount::where('status', 1)->get();
                          foreach($result as $key=>$value){
                        @endphp
                        <tr>
                          <td>Deposit Number</td>
                          <td class="text-success"><b>{{ $value->account_number }} ({{ $value->account_name }})</b></td>
                        </tr>
                        @php  
                        }
                        @endphp
                      </table>
                      <hr>
                      @include('user.partials.message')
                      <form action="{{ route('user.deposit.store') }}" method="post" id="quickForm" novalidate="novalidate" class="form-prevent-multiple-submits">
                        @csrf
                        <div class="form-group">
                          <label for="deposit_amount">Deposit Amount</label>
                          <input type="number" name="deposit_amount" class="form-control form-control-sm" id="deposit_amount" >
                        </div>
                        <div class="form-group">
                          <label for="account_number">Mobile Wallet Number</label>
                          <input type="number" name="account_number" class="form-control form-control-sm" id="account_number">
                        </div>
                        <div class="form-group">
                            <label for="payment_method">Payment Method</label>
                            <select name="payment_method" class="form-control form-control-sm" id="payment_method">
                              <option value="Bkash">Bkash</option>
                              <option value="Nagad">Nagad</option>
                              <option value="Rocket">Rocket</option>
                              <option value="Paytm">Paytm</option>
                            </select>
                          </div>
                        <div class="form-group">
                          <label for="trans_id">Trans. Id</label>
                          <input type="text" name="trans_id" class="form-control form-control-sm" id="trans_id">
                        </div>
                        <div class="form-group">
                          <button type="submit" class="btn button-prevent-multiple-submits" style="background: #f39902">Deposit</button>
                        </div>
                      </form>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-6">
                      <h4>Deposit Guide</h4>
                      <hr>
                      <ol type="1">
                        <li>First Cash Out to the deposit account from your bkash account. Which is given above. Deposit minimum 500 and maximum 30000.</li>
                        <li>Put the amount of money you have deposited in the deposit amount box.</li>
                        <li>Enter the account number for which you have deposited money in the Account Number box.</li>
                        <li>then input your transaction id</li>
                        <li>then click the deposit button</li>
                      </ol>
                      <div class="alert alert-info" role="alert">
                        Notice: When the admin confirmed your deposit then you get your balance.
                      </div>
                    </div>
                    
                  </div>
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
      deposit_amount:{
        required: true,
        number:true,
        min:500,
        max:30000,
      },
      account_number: {
        required: true,
        number:true,
      },
      payment_method: {
        required: true,
      },
      trans_id: {
        required: true,
      },
    },
    messages: {
      deposit_amount:{
        required: "Please enter deposit amount",
        number: "Invalid deposit amount",
        min: "Minimum Deposit value 500",
        max: "Maximum Deposit value 30000",
      },
      account_number: {
        required: "Please enter account number",
        number: "Invalid account number",
      },
      payment_method: {
        required: "Please select payment method"
      },
      trans_id: {
        required: "Please enter transaction id",
      },
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
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

