@extends('user.partials.master')

@section('title')
  <title>Double Patti | Matka Online 24</title>
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
              <li class="breadcrumb-item active">Double Patti</li>
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
                <h3 class="card-title">Double Patti</h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                  @include('user.partials.message')
                  <form action="{{ route('user.double_patti.store') }}" method="post" id="quickForm" class="form-prevent-multiple-submits">
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
                              <label style="flex:1;text-align: center;">100</label>
                              <input type="hidden" name="number[]" value="100">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">119</label>
                              <input type="hidden" name="number[]" value="119">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">155</label>
                              <input type="hidden" name="number[]" value="155">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">227</label>
                              <input type="hidden" name="number[]" value="227">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">335</label>
                              <input type="hidden" name="number[]" value="335">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">344</label>
                              <input type="hidden" name="number[]" value="344">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">399</label>
                              <input type="hidden" name="number[]" value="399">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">588</label>
                              <input type="hidden" name="number[]" value="588">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">669</label>
                              <input type="hidden" name="number[]" value="669">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">110</label>
                              <input type="hidden" name="number[]" value="110">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">200</label>
                              <input type="hidden" name="number[]" value="200">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">228</label>
                              <input type="hidden" name="number[]" value="228">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">255</label>
                              <input type="hidden" name="number[]" value="255">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">336</label>
                              <input type="hidden" name="number[]" value="336">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">499</label>
                              <input type="hidden" name="number[]" value="499">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">660</label>
                              <input type="hidden" name="number[]" value="660">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">688</label>
                              <input type="hidden" name="number[]" value="688">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">778</label>
                              <input type="hidden" name="number[]" value="778">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">166</label>
                              <input type="hidden" name="number[]" value="166">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">229</label>
                              <input type="hidden" name="number[]" value="229">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">300</label>
                              <input type="hidden" name="number[]" value="300">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">337</label>
                              <input type="hidden" name="number[]" value="337">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">355</label>
                              <input type="hidden" name="number[]" value="355">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">445</label>
                              <input type="hidden" name="number[]" value="445">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">599</label>
                              <input type="hidden" name="number[]" value="599">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">779</label>
                              <input type="hidden" name="number[]" value="779">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">788</label>
                              <input type="hidden" name="number[]" value="788">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">112</label>
                              <input type="hidden" name="number[]" value="112">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">220</label>
                              <input type="hidden" name="number[]" value="220">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">266</label>
                              <input type="hidden" name="number[]" value="266">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">338</label>
                              <input type="hidden" name="number[]" value="338">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">400</label>
                              <input type="hidden" name="number[]" value="400">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">446</label>
                              <input type="hidden" name="number[]" value="446">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">455</label>
                              <input type="hidden" name="number[]" value="455">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">699</label>
                              <input type="hidden" name="number[]" value="699">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">770</label>
                              <input type="hidden" name="number[]" value="770">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">113</label>
                              <input type="hidden" name="number[]" value="113">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">122</label>
                              <input type="hidden" name="number[]" value="122">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">177</label>
                              <input type="hidden" name="number[]" value="177">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">339</label>
                              <input type="hidden" name="number[]" value="339">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">366</label>
                              <input type="hidden" name="number[]" value="366">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">447</label>
                              <input type="hidden" name="number[]" value="447">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">500</label>
                              <input type="hidden" name="number[]" value="500">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">799</label>
                              <input type="hidden" name="number[]" value="799">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">889</label>
                              <input type="hidden" name="number[]" value="889">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">114</label>
                              <input type="hidden" name="number[]" value="114">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">277</label>
                              <input type="hidden" name="number[]" value="277">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">330</label>
                              <input type="hidden" name="number[]" value="330">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">448</label>
                              <input type="hidden" name="number[]" value="448">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">466</label>
                              <input type="hidden" name="number[]" value="466">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">556</label>
                              <input type="hidden" name="number[]" value="556">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">600</label>
                              <input type="hidden" name="number[]" value="600">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">880</label>
                              <input type="hidden" name="number[]" value="880">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">899</label>
                              <input type="hidden" name="number[]" value="899">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">115</label>
                              <input type="hidden" name="number[]" value="115">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">133</label>
                              <input type="hidden" name="number[]" value="133">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">188</label>
                              <input type="hidden" name="number[]" value="188">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">223</label>
                              <input type="hidden" name="number[]" value="223">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">377</label>
                              <input type="hidden" name="number[]" value="377">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">449</label>
                              <input type="hidden" name="number[]" value="449">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">557</label>
                              <input type="hidden" name="number[]" value="557">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">566</label>
                              <input type="hidden" name="number[]" value="566">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">700</label>
                              <input type="hidden" name="number[]" value="700">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">116</label>
                              <input type="hidden" name="number[]" value="116">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">224</label>
                              <input type="hidden" name="number[]" value="224">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">233</label>
                              <input type="hidden" name="number[]" value="233">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">288</label>
                              <input type="hidden" name="number[]" value="288">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">440</label>
                              <input type="hidden" name="number[]" value="440">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">477</label>
                              <input type="hidden" name="number[]" value="477">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">558</label>
                              <input type="hidden" name="number[]" value="558">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">800</label>
                              <input type="hidden" name="number[]" value="800">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">990</label>
                              <input type="hidden" name="number[]" value="990">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">117</label>
                              <input type="hidden" name="number[]" value="117">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">144</label>
                              <input type="hidden" name="number[]" value="144">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">199</label>
                              <input type="hidden" name="number[]" value="199">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">225</label>
                              <input type="hidden" name="number[]" value="225">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">388</label>
                              <input type="hidden" name="number[]" value="388">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">559</label>
                              <input type="hidden" name="number[]" value="559">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">577</label>
                              <input type="hidden" name="number[]" value="577">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">667</label>
                              <input type="hidden" name="number[]" value="667">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">900</label>
                              <input type="hidden" name="number[]" value="900">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">118</label>
                              <input type="hidden" name="number[]" value="118">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">226</label>
                              <input type="hidden" name="number[]" value="226">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">244</label>
                              <input type="hidden" name="number[]" value="244">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">299</label>
                              <input type="hidden" name="number[]" value="299">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">334</label>
                              <input type="hidden" name="number[]" value="334">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">488</label>
                              <input type="hidden" name="number[]" value="488">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">550</label>
                              <input type="hidden" name="number[]" value="550">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">668</label>
                              <input type="hidden" name="number[]" value="668">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">677</label>
                              <input type="hidden" name="number[]" value="677">
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

