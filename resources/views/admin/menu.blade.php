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
      <img src="{{asset('/images/logo.png')}}" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Web Application</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            {{-- dashboard --}}
            <li class="nav-item">
                <a href="{{route('admin.dashboard')}}" class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.register-card') }}" class="nav-link {{ Request::is(['admin/register-card']) ? 'active' : '' }}">
                    <i class="fas fa-money-bill-alt nav-icon"></i>
                    <p>Register card</p>
                </a>
            </li>


            <li class="nav-item">
                <a href="{{ route('admin.topup-monney') }}" class="nav-link {{ Request::is(['admin/topup-monney','admin/topup']) ? 'active' : '' }}">
                    <i class="fas fa-money-bill-alt nav-icon"></i>
                    <p>Topup Monney</p>
                </a>
            </li>


            {{-- logout --}}
            <li class="nav-item">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <a href="{{ route('logout') }}" class="nav-link"  onclick="event.preventDefault(); this.closest('form').submit();">
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
