<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="{{ route('dashboard') }}" class="navbar-brand mx-4 mb-3">
            <img class="" src="{{ asset('assets/img/logo1-01.png') }}" alt="" style="width: 100%; height: 100%;">
        </a>
        <div class="navbar-nav w-100 mt-2">
            <a href="{{ route('dashboard') }}" class="nav-item nav-link {{ Request::is('dashboard') ? 'active' : '' }}"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <a href="{{ route('room') }}" class="nav-item nav-link {{ Request::is('room') ? 'active' : '' }}"><i class="fas fa-bed me-2"></i>Room</a>
        </div>
    </nav>
</div>