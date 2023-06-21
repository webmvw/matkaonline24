  
  @php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
  @endphp

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('user.dashboard') }}" class="brand-link">
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

      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <i class="nav-icon fas fa-wallet" style="color:#f39902;font-size:20px;margin-right: 10px;"></i>
          <a href="#" class="d-block" style="color:#f39902;">
              @if(Auth::user()->balance == null)
              Rs. 0.0
              @else
                Rs. {{ Auth::user()->balance }}
              @endif
            </a>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('user.dashboard') }}" class="nav-link {{ ($route == 'user.dashboard') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Profile</p>
            </a>
          </li>
            
            @if(Auth::user()->status == 1)
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
                <a href="{{ route('user.deposit.add') }}" class="nav-link {{ ($route == 'user.deposit.add') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Deposit</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('user.withdraw.add') }}" class="nav-link {{ ($route == 'user.withdraw.add') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Withdraw</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('user.balance_transfer.view') }}" class="nav-link {{ ($route == 'user.balance_transfer.view') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Balance Transfer</p>
                </a>
              </li>
            </ul>
          </li>
        @endif
    
    
    
          <li class="nav-item">
            <a href="{{ route('user.gamerate') }}" class="nav-link {{ ($route == 'user.gamerate') ? 'active' : '' }}">
              <i class="nav-icon fas fa-balance-scale-left"></i>
              <p>Game Rate</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('user.gametime') }}" class="nav-link {{ ($route == 'user.gametime') ? 'active' : '' }}">
              <i class="nav-icon fas fa-clock"></i>
              <p>Game Timing</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('user.played_game.view') }}" class="nav-link {{ ($route == 'user.played_game.view') ? 'active' : '' }}">
              <i class="nav-icon fas fa-bullseye"></i>
              <p>Play History</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('user.result.view') }}" class="nav-link {{ ($route == 'user.result.view') ? 'active' : '' }}">
              <i class="nav-icon fas fa-poll"></i>
              <p>Result</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('user.notice.view') }}" class="nav-link {{ ($route == 'user.notice.view') ? 'active' : '' }}">
              <i class="nav-icon fas fa-poll"></i>
              <p>Notice</p>
            </a>
          </li>
          
          
          @if(Auth::user()->status == 1)
          <li class="nav-item menu-is-opening menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chess"></i>
              <p>
                Kalyan Lottery
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('user.single_game.view') }}" class="nav-link {{ ($route == 'user.single_game.view') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-chess"></i>
                  <p>Single</p>
                </a>
              </li>  
    
              <li class="nav-item">
                <a href="{{ route('user.single_patti.view') }}" class="nav-link {{ ($route == 'user.single_patti.view') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-chess"></i>
                  <p>Single Patti</p>
                </a>
              </li>
    
              <li class="nav-item">
                <a href="{{ route('user.double_patti.view') }}" class="nav-link {{ ($route == 'user.double_patti.view') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-chess"></i>
                  <p>Double Patti</p>
                </a>
              </li>
    
              <li class="nav-item">
                <a href="{{ route('user.triple_patti.view') }}" class="nav-link {{ ($route == 'user.triple_patti.view') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-chess"></i>
                  <p>Triple Patti</p>
                </a>
              </li>
    
              <li class="nav-item">
                <a href="{{ route('user.jori_game.view') }}" class="nav-link {{ ($route == 'user.jori_game.view') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-chess"></i>
                  <p>Jori</p>
                </a>
              </li>
            </ul>
          </li>  
          
          <li class="nav-item menu-is-opening menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chess"></i>
              <p>
                Thai Lottery
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-chess"></i>
                  <p>UpComming</p>
                </a>
              </li>
            </ul>  
          </li>
          
          <li class="nav-item menu-is-opening menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chess"></i>
              <p>
                Bangkok Weekly Lottery
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-chess"></i>
                  <p>UpComming</p>
                </a>
              </li>
            </ul>  
          </li>
          
          @endif

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>