@extends('user.partials.master')

@section('title')
  <title>Single Patti | Matka Online 24</title>
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
              <li class="breadcrumb-item active">Single Patti</li>
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
                <h3 class="card-title">Single Patti</h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                  @include('user.partials.message')
                  <form action="{{ route('user.single_patti.store') }}" method="post" id="quickForm" class="form-prevent-multiple-submits">
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
                              <label style="flex:1;text-align: center;">128</label>
                              <input type="hidden" name="number[]" value="128">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">137</label>
                              <input type="hidden" name="number[]" value="137">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">146</label>
                              <input type="hidden" name="number[]" value="146">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">236</label>
                              <input type="hidden" name="number[]" value="236">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">245</label>
                              <input type="hidden" name="number[]" value="245">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">290</label>
                              <input type="hidden" name="number[]" value="290">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">380</label>
                              <input type="hidden" name="number[]" value="380">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">470</label>
                              <input type="hidden" name="number[]" value="470">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">489</label>
                              <input type="hidden" name="number[]" value="489">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">560</label>
                              <input type="hidden" name="number[]" value="560">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">579</label>
                              <input type="hidden" name="number[]" value="579">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">678</label>
                              <input type="hidden" name="number[]" value="678">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">129</label>
                              <input type="hidden" name="number[]" value="129">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">138</label>
                              <input type="hidden" name="number[]" value="138">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">147</label>
                              <input type="hidden" name="number[]" value="147">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">156</label>
                              <input type="hidden" name="number[]" value="156">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">237</label>
                              <input type="hidden" name="number[]" value="237">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">246</label>
                              <input type="hidden" name="number[]" value="246">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">345</label>
                              <input type="hidden" name="number[]" value="345">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">390</label>
                              <input type="hidden" name="number[]" value="390">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">480</label>
                              <input type="hidden" name="number[]" value="480">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">570</label>
                              <input type="hidden" name="number[]" value="570">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">589</label>
                              <input type="hidden" name="number[]" value="589">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">679</label>
                              <input type="hidden" name="number[]" value="679">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">120</label>
                              <input type="hidden" name="number[]" value="120">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">139</label>
                              <input type="hidden" name="number[]" value="139">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">148</label>
                              <input type="hidden" name="number[]" value="148">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">157</label>
                              <input type="hidden" name="number[]" value="157">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">238</label>
                              <input type="hidden" name="number[]" value="238">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">247</label>
                              <input type="hidden" name="number[]" value="247">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">256</label>
                              <input type="hidden" name="number[]" value="256">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">346</label>
                              <input type="hidden" name="number[]" value="346">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">490</label>
                              <input type="hidden" name="number[]" value="490">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">580</label>
                              <input type="hidden" name="number[]" value="580">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">670</label>
                              <input type="hidden" name="number[]" value="670">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">689</label>
                              <input type="hidden" name="number[]" value="689">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">130</label>
                              <input type="hidden" name="number[]" value="130">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">149</label>
                              <input type="hidden" name="number[]" value="149">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">158</label>
                              <input type="hidden" name="number[]" value="158">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">167</label>
                              <input type="hidden" name="number[]" value="167">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">239</label>
                              <input type="hidden" name="number[]" value="239">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">248</label>
                              <input type="hidden" name="number[]" value="248">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">257</label>
                              <input type="hidden" name="number[]" value="257">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">347</label>
                              <input type="hidden" name="number[]" value="347">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">356</label>
                              <input type="hidden" name="number[]" value="356">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">590</label>
                              <input type="hidden" name="number[]" value="590">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">680</label>
                              <input type="hidden" name="number[]" value="680">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">789</label>
                              <input type="hidden" name="number[]" value="789">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">140</label>
                              <input type="hidden" name="number[]" value="140">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">159</label>
                              <input type="hidden" name="number[]" value="159">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">168</label>
                              <input type="hidden" name="number[]" value="168">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">230</label>
                              <input type="hidden" name="number[]" value="230">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">249</label>
                              <input type="hidden" name="number[]" value="249">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">258</label>
                              <input type="hidden" name="number[]" value="258">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">267</label>
                              <input type="hidden" name="number[]" value="267">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">348</label>
                              <input type="hidden" name="number[]" value="348">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">357</label>
                              <input type="hidden" name="number[]" value="357">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">456</label>
                              <input type="hidden" name="number[]" value="456">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">690</label>
                              <input type="hidden" name="number[]" value="690">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">780</label>
                              <input type="hidden" name="number[]" value="780">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">123</label>
                              <input type="hidden" name="number[]" value="123">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">150</label>
                              <input type="hidden" name="number[]" value="150">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">169</label>
                              <input type="hidden" name="number[]" value="169">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">178</label>
                              <input type="hidden" name="number[]" value="178">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">240</label>
                              <input type="hidden" name="number[]" value="240">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">259</label>
                              <input type="hidden" name="number[]" value="259">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">268</label>
                              <input type="hidden" name="number[]" value="268">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">349</label>
                              <input type="hidden" name="number[]" value="349">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">358</label>
                              <input type="hidden" name="number[]" value="358">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">367</label>
                              <input type="hidden" name="number[]" value="367">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">457</label>
                              <input type="hidden" name="number[]" value="457">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">790</label>
                              <input type="hidden" name="number[]" value="790">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">124</label>
                              <input type="hidden" name="number[]" value="124">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">160</label>
                              <input type="hidden" name="number[]" value="160">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">179</label>
                              <input type="hidden" name="number[]" value="179">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">250</label>
                              <input type="hidden" name="number[]" value="250">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">269</label>
                              <input type="hidden" name="number[]" value="269">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">278</label>
                              <input type="hidden" name="number[]" value="278">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">340</label>
                              <input type="hidden" name="number[]" value="340">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">359</label>
                              <input type="hidden" name="number[]" value="359">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">368</label>
                              <input type="hidden" name="number[]" value="368">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">458</label>
                              <input type="hidden" name="number[]" value="458">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">467</label>
                              <input type="hidden" name="number[]" value="467">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">890</label>
                              <input type="hidden" name="number[]" value="890">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">125</label>
                              <input type="hidden" name="number[]" value="125">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">134</label>
                              <input type="hidden" name="number[]" value="134">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">170</label>
                              <input type="hidden" name="number[]" value="170">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">189</label>
                              <input type="hidden" name="number[]" value="189">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">260</label>
                              <input type="hidden" name="number[]" value="260">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">279</label>
                              <input type="hidden" name="number[]" value="279">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">350</label>
                              <input type="hidden" name="number[]" value="350">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">369</label>
                              <input type="hidden" name="number[]" value="369">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">378</label>
                              <input type="hidden" name="number[]" value="378">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">459</label>
                              <input type="hidden" name="number[]" value="459">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">468</label>
                              <input type="hidden" name="number[]" value="468">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">567</label>
                              <input type="hidden" name="number[]" value="567">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">126</label>
                              <input type="hidden" name="number[]" value="126">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">135</label>
                              <input type="hidden" name="number[]" value="135">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">180</label>
                              <input type="hidden" name="number[]" value="180">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">234</label>
                              <input type="hidden" name="number[]" value="234">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">270</label>
                              <input type="hidden" name="number[]" value="270">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">289</label>
                              <input type="hidden" name="number[]" value="289">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">360</label>
                              <input type="hidden" name="number[]" value="360">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">379</label>
                              <input type="hidden" name="number[]" value="379">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">450</label>
                              <input type="hidden" name="number[]" value="450">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">469</label>
                              <input type="hidden" name="number[]" value="469">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">478</label>
                              <input type="hidden" name="number[]" value="478">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">568</label>
                              <input type="hidden" name="number[]" value="568">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">127</label>
                              <input type="hidden" name="number[]" value="127">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">136</label>
                              <input type="hidden" name="number[]" value="136">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">145</label>
                              <input type="hidden" name="number[]" value="145">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">190</label>
                              <input type="hidden" name="number[]" value="190">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">235</label>
                              <input type="hidden" name="number[]" value="235">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">280</label>
                              <input type="hidden" name="number[]" value="280">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">370</label>
                              <input type="hidden" name="number[]" value="370">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">389</label>
                              <input type="hidden" name="number[]" value="389">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">460</label>
                              <input type="hidden" name="number[]" value="460">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">479</label>
                              <input type="hidden" name="number[]" value="479">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                        </div>
                        <br>
                        <div style="display: flex;">
                          <div style="flex:1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">569</label>
                              <input type="hidden" name="number[]" value="569">
                              <input style="flex:2" type="number" name="point[]" class="form-control point">
                            </div>
                          </div>
                          <div style="flex: 1">
                            <div class="point-box" style="display: flex;">
                              <label style="flex:1;text-align: center;">578</label>
                              <input type="hidden" name="number[]" value="578">
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

