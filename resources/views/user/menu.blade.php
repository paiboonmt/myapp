  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav me-5">
      <li class="nav-item ">
        <a class="nav-link" href="#" role="button">
            <i class="far fa-smile"></i>
          <span style="text-transform: uppercase"> Welcome : {{ Auth::user()->name }}</span>
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
                <a href="{{route('user.dashboard')}}" class="nav-link {{ Request::is('user/dashboard') ? 'active' : '' }}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
                </a>
            </li>
            {{-- sponsor active --}}
            <li class="nav-item">
                <a href="{{route('user.sponsoractive')}}" class="nav-link {{ Request::is('user/sponsoractive','user/profile') ? 'active' : '' }}">
                <i class="nav-icon fas fa-user-clock"></i>
                <p>
                    Sponsor Active
                </p>
                </a>
            </li>
            {{-- sponsor expired --}}
            <li class="nav-item">
                <a href="{{route('user.exprired')}}" class="nav-link {{ Request::is('user/sponsorexpired') ? 'active' : '' }}">
                <i class="nav-icon fas fa-user-lock"></i>
                <p>
                    Sponsor Expired
                </p>
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
