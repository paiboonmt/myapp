  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
          <li class="nav-item">
              <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
          <li class="nav-item">
              <a class="nav-link" href="#" role="button">
                  <i class="far fa-smile"></i>
                  <span style="text-transform: uppercase">{{ Auth::user()->name }}</span>
              </a>
          </li>
      </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="text-transform: uppercase">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
          <img src="{{ asset('/images/image-logo.png') }}" class="brand-image  elevation-4" style="opacity: .8">
          <span class="brand-text font-weight-light">PUNCH KING</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">

                  {{-- dashboard --}}
                  <li class="nav-item">
                      <a href="{{ route('admin.dashboard') }}"
                          class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>Dashboard</p>
                      </a>
                  </li>

                  {{-- member system --}}
                  <li
                      {{-- class="nav-item {{ Request::is(['admin/member', 'admin/member_create', 'admin/capture']) ? 'menu-open' : '' }}"> --}}
                      class="nav-item {{ request()->routeIs(['admin.member', 'admin.member_create', 'admin.member_profile','admin.member_edit']) ? 'menu-open' : '' }}">
                      <a href="#"
                          class="nav-link {{ request()->routeIs(['admin.member', 'admin.member_create', 'admin.member_profile','admin.member_edit']) ? 'active' : '' }}">
                          <i class="fas fa-users-cog nav-icon"></i>
                          <p>Member System
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('admin.member') }}"
                                  class="nav-link {{ request()->routeIs(['admin.member','admin.member_profile','admin.member_edit']) ? 'active' : '' }}">
                                  <i class="fas fa-users-cog nav-icon"></i>
                                  <p>Member</p>
                              </a>
                          </li>

                          <li class="nav-item">
                              <a href="{{ route('admin.member_create') }}"
                                  class="nav-link {{ request()->routeIs('admin.member_create') ? 'active' : '' }}">
                                  <i class="fas fa-user-plus nav-icon"></i>
                                  <p>create Member</p>
                              </a>
                          </li>

                          {{-- <li class="nav-item">
                              <a href="{{ route('admin.capture') }}"
                                  class="nav-link {{ Request::is(['admin/capture']) ? 'active' : '' }}">
                                  <i class="fas fa-tablet-alt nav-icon"></i>
                                  <p>capture</p>
                              </a>
                          </li> --}}
                      </ul>
                  </li>

                  {{-- product --}}
                  <li class="nav-item">
                    <a href="{{ route('admin.product') }}"
                        class="nav-link {{ request()->routeIs('admin.product') ? 'active' : '' }}">
                        <i class="fab fa-product-hunt nav-icon"></i>
                        <p>product</p>
                    </a>
                  </li>

                  {{-- nationality --}}
                  <li class="nav-item">
                    <a href="{{ route('admin.nationality') }}"
                        class="nav-link {{ request()->routeIs('admin.nationality') ? 'active' : '' }}">
                        <i class="fas fa-language nav-icon"></i>
                        <p>nationality</p>
                    </a>
                  </li>

                  {{-- topup --}}
                  <li class="nav-item">
                      <a href="{{ route('admin.topup-monney') }}"
                          class="nav-link {{ request()->routeIs(['admin.topup-monney', 'admin.topup']) ? 'active' : '' }}">
                          <i class="fas fa-money-bill-alt nav-icon"></i>
                          <p>Shop System</p>
                      </a>
                  </li>

                  {{-- config --}}
                  <li class="nav-item">
                      <a href="#"
                          class="nav-link">
                          <i class="fas fa-cog nav-icon"></i>
                          <p>Config</p>
                          <i class="right fas fa-angle-left"></i>
                      </a>
                  </li>

                  {{-- logout --}}
                  <li class="nav-item">
                      <form method="POST" action="{{ route('logout') }}">
                          @csrf
                          <a href="{{ route('logout') }}" class="nav-link"
                              onclick="event.preventDefault(); this.closest('form').submit();">
                              <i class="nav-icon fas fa-sign-out-alt"></i>
                              {{ __('Log Out') }}
                          </a>
                      </form>
                  </li>

              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
