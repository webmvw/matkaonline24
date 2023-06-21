<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="refresh" content="300">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- page title -->
  @yield('title')


  @include('user.partials.style')

  @include('user.partials.script')

  <style type="text/css">
    .whatsapp{
      position: fixed;
      bottom: 80px;
      right: 24px;
      z-index: 9999;
      width: 40px;
      height: 40px;
      box-shadow: 0px 0px 15px #2229;
      border-radius: 15px;
    }
    .whatsapp img{
      width: 40px;
      height: 40px;
    } 
  </style>

</head>
<body class="hold-transition sidebar-mini layout-fixed">

  <!-- Messenger Chat Plugin Code -->
    <div id="fb-root"></div>

    <!-- Your Chat Plugin code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "104916062318420");
      chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v14.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>


<!-- whatsapp icon -->
<div class="whatsapp">
  @php
  $whatsapp = App\Models\Settings::orderBy('id', 'desc')->first();
  @endphp
  <a href="https://wa.me/{{ $whatsapp->whatsapp }}" target="_blank">
    <img src="{{ asset('public/img/whatsapp.png')}}" alt="whatsapp icon">
  </a>
</div>


<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          @php
          $current_date  = Carbon\Carbon::today();
          $get_result_count = App\Models\Result::whereDate('created_at', $current_date)->where('user_id', Auth::user()->id)->orderby('id', 'desc')->count();
          @endphp
          <span class="badge badge-warning navbar-badge">{{ $get_result_count }}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          @php
          $current_date  = Carbon\Carbon::today();
          $get_result = App\Models\Result::whereDate('created_at', $current_date)->where('user_id', Auth::user()->id)->orderby('id', 'desc')->get();
          @endphp
          @foreach($get_result as $key=>$value)
          <a href="#" class="dropdown-item text-sm">
            <?php 
            if($value->category == 1){
              $category = 'Single';
            }elseif($value->category == 2){
              $category = 'Single Patti';
            }elseif($value->category == 3){
              $category = 'Double Patti';
            }elseif($value->category == 4){
              $category = 'Triple Patti';
            }elseif($value->category == 5){
              $category = 'Jori';
            }
            ?>
            You have receive {{$value->credit_point}} point from {{$value->gametime->bazar->name }} {{ $category }} game
          </a>
          <div class="dropdown-divider"></div>
          @endforeach
          <a href="{{ route('user.result.view') }}" class="dropdown-item dropdown-footer">See All Result</a>
        </div>
      </li>

      <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }}
          </a>

          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                  <b>{{ __('Logout') }}</b>
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
          </div>
      </li>

    </ul>
  </nav>
  <!-- /.navbar -->

  @include('user.partials.sidebar')


  @yield('content')



  <footer class="main-footer">
    <strong>Copyright &copy; <a href="#">Matka Online 24</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0
    </div>
  </footer>

</div>
<!-- ./wrapper -->

<script src="{{ asset('public/js/submit.js') }}"></script>


<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>



<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
  });
</script>

<!-- show before upload image -->
<script type="text/javascript">
  $(document).ready(function(){
    $('#image').change(function(e){
      var reader = new FileReader();
      reader.onload = function(e){
        $('#showImage').attr('src', e.target.result);
      }
      reader.readAsDataURL(e.target.files['0']);
    });
  });
</script>



<!-- toaster all type message -->
@if(Session::has('success'))
  <script type="text/javascript">
    toastr.success("{!!Session::get('success')!!}");
    toastr.options = {
      "closeMethod" : 'fadeOut',
      "closeDuration" : 4000,
      "closeEasing" : 'swing',
      "closeButton" : true,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "5000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }
  </script>
@endif

@if(Session::has('error'))
  <script type="text/javascript">
    toastr.error("{!!Session::get('error')!!}");
    toastr.options = {
      "closeMethod" : 'fadeOut',
      "closeDuration" : 4000,
      "closeEasing" : 'swing',
      "closeButton" : true,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "5000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }
  </script>
@endif

@if(Session::has('warning'))
  <script type="text/javascript">
    toastr.warning("{!!Session::get('warning')!!}");
    toastr.options = {
      "closeMethod" : 'fadeOut',
      "closeDuration" : 4000,
      "closeEasing" : 'swing',
      "closeButton" : true,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "5000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }
  </script>
@endif

@if(Session::has('info'))
  <script type="text/javascript">
    toastr.info("{!!Session::get('info')!!}");
    toastr.options = {
      "closeMethod" : 'fadeOut',
      "closeDuration" : 4000,
      "closeEasing" : 'swing',
      "closeButton" : true,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "5000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }
  </script>
@endif


</body>
</html>
