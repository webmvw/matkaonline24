  
  @php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
  @endphp

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
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
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ ($route == 'admin.dashboard') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>

          <li class="nav-item {{ ($prefix == '/setups') ? 'menu-is-opening menu-open': '' }}">
            <a href="{{ route('admin.account.view') }}" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Setups Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.account.view') }}" class="nav-link {{ ($route == 'admin.account.view') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bank Account</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.gameCategory.view') }}" class="nav-link {{ ($route == 'admin.gameCategory.view') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Game Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.bazar.view') }}" class="nav-link {{ ($route == 'admin.bazar.view') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bazar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.gameTime.view') }}" class="nav-link {{ ($route == 'admin.gameTime.view') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Game Time</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.settings.view') }}" class="nav-link {{ ($route == 'admin.settings.view') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Settings</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.notice.view') }}" class="nav-link {{ ($route == 'admin.notice.view') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Notice</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item {{ ($prefix == '/balance') ? 'menu-is-opening menu-open': '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Balance
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.deposit.view') }}" class="nav-link {{ ($route == 'admin.deposit.view') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Deposit</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.deposit.rejectlist') }}" class="nav-link {{ ($route == 'admin.deposit.rejectlist') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reject Deposit</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.deposit.acceptlist') }}" class="nav-link {{ ($route == 'admin.deposit.acceptlist') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Accept Deposit</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.withdraw.view') }}" class="nav-link {{ ($route == 'admin.withdraw.view') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Withdraw</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.withdraw.rejectlist') }}" class="nav-link {{ ($route == 'admin.withdraw.rejectlist') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Reject Withdraw</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.withdraw.acceptlist') }}" class="nav-link {{ ($route == 'admin.withdraw.acceptlist') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Accept Withdraw</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.balance_transfer.view') }}" class="nav-link {{ ($route == 'admin.balance_transfer.view') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Balance Transfer</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item {{ ($prefix == '/user') ? 'menu-is-opening menu-open': '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                User
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.userlist.view') }}" class="nav-link {{ ($route == 'admin.userlist.view') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User List</p>
                </a>
              </li>
            </ul>
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
                <a href="{{ route('admin.game.view') }}" class="nav-link {{ ($route == 'admin.game.view') ? 'active' : '' }}">
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
                <a href="{{ route('admin.result.view') }}" class="nav-link {{ ($route == 'admin.result.view') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Result</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.result.add') }}" class="nav-link {{ ($route == 'admin.result.add') ? 'active' : '' }}">
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
                <a href="{{ route('admin.public_result.view') }}" class="nav-link {{ ($route == 'admin.public_result.view') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Result</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.public_result.add') }}" class="nav-link {{ ($route == 'admin.public_result.add') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Result</p>
                </a>
              </li>
            </ul>
          </li>  

          <li class="nav-item {{ ($prefix == '/employee') ? 'menu-is-opening menu-open': '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Employee
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.employee.view') }}" class="nav-link {{ ($route == 'admin.employee.view') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View</p>
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