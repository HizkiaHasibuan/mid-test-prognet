<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('user/dashboard') ? 'active' : '' }}" aria-current="page" href="{{ route('user-dashboard') }}">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('user/profil*') ? 'active' : '' }}" aria-current="page" href="{{ route('user-profil') }}">
                    <span data-feather="user"></span>
                    Profil
                </a>
            </li>
        </ul>

        @can('is-admin')
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Administrator</span>
        </h6>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/nasabah*') ? 'active' : '' }}" href="{{ route('admin-nasabah') }}">
                    <span data-feather="users"></span>
                    List Nasabah
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/admin*') ? 'active' : '' }}" href="{{ route('admin-list') }}">
                    <span data-feather="users"></span>
                    List Admin
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/simpanan*') ? 'active' : '' }}" href="{{ route('admin-simpanan') }}">
                    <span data-feather="dollar-sign"></span>
                    List Transaksi Simpanan
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/penarikan*') ? 'active' : '' }}" href="{{ route('admin-penarikan') }}">
                    <span data-feather="credit-card"></span>
                    List Transaksi Penarikan
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/bunga*') ? 'active' : '' }}" href="{{ route('admin-bunga') }}">
                    <span data-feather="percent"></span>
                    List Bunga
                </a>
            </li>
        </ul>
        @endcan
        <ul class="nav flex-column">
            <li>
                <form action="/signout" method="POST">
                    @csrf
                    <button type="submit" class="nav-link px-3 bg-light border-0"><span data-feather="log-out"></span> Sign Out</a></button>
                  </form>
            </li>
        </ul>
    </div>
</nav>