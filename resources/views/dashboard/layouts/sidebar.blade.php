<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('/dashboard') ? 'active' : '' }}" aria-current="page" href="{{ route('dashboard') }}">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('user/profil*') ? 'active' : '' }}" aria-current="page" href="{{ route('user-profil') }}">
                    {{-- user-profil --}}
                    <span data-feather="user"></span>
                    Profil
                </a>
            </li>

            @if (auth()->user()->isAdmin == 1)    
            <li class="nav-item">
                <a class="nav-link" href="{{ route('newkamera') }}">
                    <span data-feather="camera"></span>
                    Tambah Kamera
                </a>
            </li>
            @endif

            @if (auth()->user()->isAdmin == 1)    
            <li class="nav-item">
                <a class="nav-link" href="{{ route('listpesan') }}">
                    <span data-feather="camera"></span>
                    List Pesanan
                </a>
            </li>
            @endif

            @if (auth()->user()->isAdmin == 1)    
            <li class="nav-item">
                <a class="nav-link {{ Request::is('user/simpanan*') ? 'active' : '' }}" href="{{ route('listkameraadmin') }}">
                    <span data-feather="camera"></span>
                    Lihat Kamera
                </a>
            </li>
            @else
            <li class="nav-item">
                <a class="nav-link {{ Request::is('user/simpanan*') ? 'active' : '' }}" href="{{ route('listkamera') }}">
                    <span data-feather="camera"></span>
                    Lihat Kamera
                </a>
            </li>
            @endif
    </div>
</nav>