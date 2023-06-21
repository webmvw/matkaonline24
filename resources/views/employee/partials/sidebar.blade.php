  
  @php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
  @endphp

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('employee.dashboard') }}" class="brand-link">
      <img src="{{ asset('public/admin/dist/img/last_logo.png') }}" alt="bdMatkaOnline Logo" class="brand-image"
           style="opacity: .8;margin-bottom:15px !important;">
      <span class="brand-text font-weight-light">MatkaOnline24</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          @if(Auth::user()->image == null)
          <img src="{{ asset('public/img/user.png') }}" class="img-circle elevation-2" alt="User Image">
          @else
          <img src="{{ asset('public/img/user/'.Auth::user()->image) }}" class="img-circle elevation-2" alt="User Image">
          @endif
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('employee.dashboard') }}" class="nav-link {{ ($route == 'employee.dashboard') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>

          <li class="nav-item {{ ($prefix == '/game') ? 'menu-is-opening menu-open': '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Game
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('employee.game.view') }}" class="nav-link {{ ($route == 'employee.game.view') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item {{ ($prefix == '/result') ? 'menu-is-opening menu-open': '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Result
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('employee.result.view') }}" class="nav-link {{ ($route == 'employee.result.view') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Result</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('employee.result.add') }}" class="nav-link {{ ($route == 'employee.result.add') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Result</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item {{ ($prefix == '/public_result') ? 'menu-is-opening menu-open': '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Public Result
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('employee.public_result.view') }}" class="nav-link {{ ($route == 'employee.public_result.view') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Result</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('employee.public_result.add') }}" class="nav-link {{ ($route == 'employee.public_result.add') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Result</p>
                </a>
              </li>
            </ul>
          </li> 

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>