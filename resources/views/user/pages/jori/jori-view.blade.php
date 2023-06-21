@extends('user.partials.master')

@section('title')
  <title>Jori | Matka Online 24</title>
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
              <li class="breadcrumb-item active">Jori</li>
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
                <h3 class="card-title">Jori</h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                  @include('user.partials.message')
                  <form action="{{ route('user.jori_game.store') }}" method="post" id="quickForm" class="form-prevent-multiple-submits">
                    @csrf
                    <div class="form-group">
                      <p><b>Select Game</b></p>
                      @php
                      $gametime = App\Models\GameTime::where('status', '0')->get();
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
                            <h5>{{ $value->bazar->name }}</h5>
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
                              <label style="flex:1;text-align: center;">00</label>
                              <input type="hidden" name="number[]" value="00">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">01</label>
                              <input type="hidden" name="number[]" value="01">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">02</label>
                              <input type="hidden" name="number[]" value="02">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">03</label>
                              <input type="hidden" name="number[]" value="03">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">04</label>
                              <input type="hidden" name="number[]" value="04">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">05</label>
                              <input type="hidden" name="number[]" value="05">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">06</label>
                              <input type="hidden" name="number[]" value="06">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">07</label>
                              <input type="hidden" name="number[]" value="07">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">08</label>
                              <input type="hidden" name="number[]" value="08">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">09</label>
                              <input type="hidden" name="number[]" value="09">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">10</label>
                              <input type="hidden" name="number[]" value="10">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">11</label>
                              <input type="hidden" name="number[]" value="11">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">12</label>
                              <input type="hidden" name="number[]" value="12">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">13</label>
                              <input type="hidden" name="number[]" value="13">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">14</label>
                              <input type="hidden" name="number[]" value="14">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">15</label>
                              <input type="hidden" name="number[]" value="15">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">16</label>
                              <input type="hidden" name="number[]" value="16">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">17</label>
                              <input type="hidden" name="number[]" value="17">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">18</label>
                              <input type="hidden" name="number[]" value="18">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">19</label>
                              <input type="hidden" name="number[]" value="19">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">20</label>
                              <input type="hidden" name="number[]" value="20">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">21</label>
                              <input type="hidden" name="number[]" value="21">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">22</label>
                              <input type="hidden" name="number[]" value="22">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">23</label>
                              <input type="hidden" name="number[]" value="23">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">24</label>
                              <input type="hidden" name="number[]" value="24">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">25</label>
                              <input type="hidden" name="number[]" value="25">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">26</label>
                              <input type="hidden" name="number[]" value="26">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">27</label>
                              <input type="hidden" name="number[]" value="27">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">28</label>
                              <input type="hidden" name="number[]" value="28">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">29</label>
                              <input type="hidden" name="number[]" value="29">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">30</label>
                              <input type="hidden" name="number[]" value="30">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">31</label>
                              <input type="hidden" name="number[]" value="31">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">32</label>
                              <input type="hidden" name="number[]" value="32">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">33</label>
                              <input type="hidden" name="number[]" value="33">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">34</label>
                              <input type="hidden" name="number[]" value="34">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">35</label>
                              <input type="hidden" name="number[]" value="35">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">36</label>
                              <input type="hidden" name="number[]" value="36">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">37</label>
                              <input type="hidden" name="number[]" value="37">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">38</label>
                              <input type="hidden" name="number[]" value="38">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">39</label>
                              <input type="hidden" name="number[]" value="39">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">40</label>
                              <input type="hidden" name="number[]" value="40">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">41</label>
                              <input type="hidden" name="number[]" value="41">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">42</label>
                              <input type="hidden" name="number[]" value="42">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">43</label>
                              <input type="hidden" name="number[]" value="43">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">44</label>
                              <input type="hidden" name="number[]" value="44">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">45</label>
                              <input type="hidden" name="number[]" value="45">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">46</label>
                              <input type="hidden" name="number[]" value="46">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">47</label>
                              <input type="hidden" name="number[]" value="47">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">48</label>
                              <input type="hidden" name="number[]" value="48">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">49</label>
                              <input type="hidden" name="number[]" value="49">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">50</label>
                              <input type="hidden" name="number[]" value="50">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">51</label>
                              <input type="hidden" name="number[]" value="51">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">52</label>
                              <input type="hidden" name="number[]" value="52">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">53</label>
                              <input type="hidden" name="number[]" value="53">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">54</label>
                              <input type="hidden" name="number[]" value="54">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">55</label>
                              <input type="hidden" name="number[]" value="55">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">56</label>
                              <input type="hidden" name="number[]" value="56">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">57</label>
                              <input type="hidden" name="number[]" value="57">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">58</label>
                              <input type="hidden" name="number[]" value="58">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">59</label>
                              <input type="hidden" name="number[]" value="59">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">60</label>
                              <input type="hidden" name="number[]" value="60">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">61</label>
                              <input type="hidden" name="number[]" value="61">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">62</label>
                              <input type="hidden" name="number[]" value="62">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">63</label>
                              <input type="hidden" name="number[]" value="63">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">64</label>
                              <input type="hidden" name="number[]" value="64">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">65</label>
                              <input type="hidden" name="number[]" value="65">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">66</label>
                              <input type="hidden" name="number[]" value="66">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">67</label>
                              <input type="hidden" name="number[]" value="67">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">68</label>
                              <input type="hidden" name="number[]" value="68">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">69</label>
                              <input type="hidden" name="number[]" value="69">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">70</label>
                              <input type="hidden" name="number[]" value="70">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">71</label>
                              <input type="hidden" name="number[]" value="71">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">72</label>
                              <input type="hidden" name="number[]" value="72">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">73</label>
                              <input type="hidden" name="number[]" value="73">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">74</label>
                              <input type="hidden" name="number[]" value="74">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">75</label>
                              <input type="hidden" name="number[]" value="75">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">76</label>
                              <input type="hidden" name="number[]" value="76">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">77</label>
                              <input type="hidden" name="number[]" value="77">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">78</label>
                              <input type="hidden" name="number[]" value="78">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">79</label>
                              <input type="hidden" name="number[]" value="79">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">80</label>
                              <input type="hidden" name="number[]" value="80">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">81</label>
                              <input type="hidden" name="number[]" value="81">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">82</label>
                              <input type="hidden" name="number[]" value="82">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">83</label>
                              <input type="hidden" name="number[]" value="83">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">84</label>
                              <input type="hidden" name="number[]" value="84">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">85</label>
                              <input type="hidden" name="number[]" value="85">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">86</label>
                              <input type="hidden" name="number[]" value="86">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">87</label>
                              <input type="hidden" name="number[]" value="87">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">88</label>
                              <input type="hidden" name="number[]" value="88">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">89</label>
                              <input type="hidden" name="number[]" value="89">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">90</label>
                              <input type="hidden" name="number[]" value="90">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">91</label>
                              <input type="hidden" name="number[]" value="91">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">92</label>
                              <input type="hidden" name="number[]" value="92">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">93</label>
                              <input type="hidden" name="number[]" value="93">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">94</label>
                              <input type="hidden" name="number[]" value="94">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">95</label>
                              <input type="hidden" name="number[]" value="95">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">96</label>
                              <input type="hidden" name="number[]" value="96">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">97</label>
                              <input type="hidden" name="number[]" value="97">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">98</label>
                              <input type="hidden" name="number[]" value="98">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">99</label>
                              <input type="hidden" name="number[]" value="99">
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

