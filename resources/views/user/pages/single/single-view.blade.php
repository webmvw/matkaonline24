@extends('user.partials.master')

@section('title')
  <title>Single | Matka Online 24</title>
@endsection

@section('content')

<style type="text/css">
  .custom-radio input{
    display: none;
  }
  .radio-btn{
    border:1px solid transparent;
    display: inline-block;
    text-align:center;
    padding:10px 15px;
    margin:10px;
    box-shadow: 0 0 20px #c3c3c367;
    position: relative;
  }
  .custom-radio input:checked+.radio-btn{
    border:1px solid #f39902;
    background: #f39902;
  }
  .custom-radio input:disabled+.radio-btn{
    border: 1px solid red;
    background: red;
    box-shadow: 0px 0px 10px #ff000026;
  }
  .custom-radio input:checked+.radio-btn > i{
    opacity: 1;
    transform: translateX(-50%) scale(1);
  }
  .radio-btn > i{
    color:#fff;
    background-color: #8373e6;
    font-size: 20px;
    position: absolute;
    top: -15px;
    left: 50%;
    transform: translateX(-50%) scale(3);
    border-radius: 50px;
    padding: 3px;
    transition: 0.2s;
    pointer-events: none;
    opacity: 0;
  }
  
   @media screen and (max-width: 528px) and (min-width: 300px)  {
    label.custom-radio{
        width: 48% !important;
    }
    .bazar_content h5{
      font-size: 10px;
      margin:0px;
      font-weight: bold;
    }
    .bazar_content span{
      font-size: 12px;
    }
    .radio-btn{
      width: 95%;
      padding:5px;
    }
  }
  
</style>


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
              <li class="breadcrumb-item active">Single</li>
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
                <h3 class="card-title">Single</h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                  @include('user.partials.message')
                  <form action="{{ route('user.single_game.store') }}" method="post" id="quickForm" class="form-prevent-multiple-submits">
                    @csrf
                    <div class="form-group">
                      <p><b>Select Game</b></p>
                      @php
                      $gametime = App\Models\GameTime::all();
                      @endphp
                      @foreach($gametime as $key=>$value)
                      <label class="custom-radio">
                        @php
                        $current_time  = Carbon\Carbon::now();
                        $close_time = Carbon\Carbon::parse($value->close_time);
                        @endphp 
                        <input type="radio" name="bazar" id="bazar" value="{{ $value->id }}" required {{ ($current_time > $close_time)?"disabled":"" }} {{ ($value->bazar->status == 0)?"disabled":"" }}>
                        <span class="radio-btn">
                          <div class="bazar_content">
                            <h5>{{ $value->bazar->name }} {{($value->status == 1)?"Close":""}}</h5>
                            <span>{{ date('h:i a', strtotime($value->close_time)) }}</span>
                          </div>
                        </span>
                      </label>
                      @endforeach
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-md-4">
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">0</label>
                              <input type="hidden" name="number[]" value="0">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">1</label>
                              <input type="hidden" name="number[]" value="1">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">2</label>
                              <input type="hidden" name="number[]" value="2">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">3</label>
                              <input type="hidden" name="number[]" value="3">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">4</label>
                              <input type="hidden" name="number[]" value="4">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">5</label>
                              <input type="hidden" name="number[]" value="5">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">6</label>
                              <input type="hidden" name="number[]" value="6">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">7</label>
                              <input type="hidden" name="number[]" value="7">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">8</label>
                              <input type="hidden" name="number[]" value="8">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">9</label>
                              <input type="hidden" name="number[]" value="9">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-8"></div>
                    </div>
                    <hr>
                    <p><b>Total Rs: <input type="text" value="0" id="estimated_point" class="estimated_amount" readonly style="background: #D8FDBA;width: 80px;text-align: right;"></b></p>
                    <hr>
                    <button type="submit" class="btn button-prevent-multiple-submits" style="background: #f39902">Submit</button>
                    
                  </form>
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


  <script type="text/javascript">

    $(document).on('keyup click', '.point', function(){
        totalPoint();
    });

     //calculate sum of total point
      function totalPoint(){
        var sum = 0;
        $('.point').each(function(){
          var value = $(this).val();
          if(!isNaN(value) && value.length != 0){
            sum += parseFloat(value);
          }
        });
        $('#estimated_point').val(sum);
      }
  </script>



<script>
  $(function () {
    $('#quickForm').validate({
      rules: {
        bazar: {
          required: true,
        },
        number: {
          required: true,
        },
        point: {
          required: true,
        },
        game_category: {
          required: true,
        },
      },
      messages: {
        bazar: {
          required: "Please select bazar",
        },
        number: {
          required: "Please select Number",
        },
        point: {
          required: "Point is required",
        },
        game_category: {
          required: "Please select Game Category",
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

