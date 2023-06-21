@extends('user.partials.master')

@section('title')
  <title>Balance Transfer | Matka Online 24</title>
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
              <li class="breadcrumb-item active">Balance Transfer</li>
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
                <h3 class="card-title">Balance Transfer</h3>
                <a href="{{ route('user.balance_transfer.history') }}" class="btn btn-sm" style="background: #f39902"><i class="fa fa-plus-circle"></i>Transfer History</a>
                <a href="{{ route('user.balance_receive.history') }}" class="btn btn-sm" style="background: #f39902"><i class="fa fa-plus-circle"></i>Receive History</a>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                  <h2 class="text-center">Balance: <span style="color:#B13147">{{ Auth::user()->balance }}</span> Rs</h2>
                  <hr>
                  <div class="row">
                    <div class="col-md-6 offset-3">
                      @include('user.partials.message')
                      <form action="{{ route('user.balance_transfer.store') }}" method="post" id="quickForm" class="form-prevent-multiple-submits">
                        @csrf
                        <div class="row">
                          <div class="col-md-8 offset-2">
                            <div class="form-group">
                              <label for="amount">Amount</label>
                              <input type="number" name="amount" class="form-control form-control-sm" id="amount" placeholder="Enter Amount">
                            </div>
                            <div class="form-group">
                              <label for="to_user">User</label>
                              <select class="form-control form-control-sm select2" name="to_user" id="to_user" required>
                                <option value="">Select User</option>
                                @foreach($AllUser as $key=>$value)
                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                @endforeach
                              </select>
                            </div>
                            <button type="submit" class="btn btn-sm button-prevent-multiple-submits" style="background: #f39902">Transfer</button>
                          </div>
                        </div>
                      </form>
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
      amount: {
        required: true,
        number:true,
      },
      to_user:{
        required: true,
      },
    },
    messages: {
      amount: {
        required: "Please enter amount",
        number: "Invalid amount number",
      },
      to_user: {
        required: "Please select user",
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

