<nav class="navbar navbar-expand-lg navbar-ireport">
  <div class="container">
    <a class="navbar-brand" href="/laporan">
      <img src="{{ asset('logoIREPORT.png') }}" alt="IReport">
      <span class="brand-name">IReport</span>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain"
      aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarMain">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-3">
        <li class="nav-item">
          <a class="nav-link {{ request()->is('laporan') && !request('search') ? 'active' : '' }}" href="/laporan">HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="/about">ABOUT</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('berita_user') ? 'active' : '' }}" href="/berita_user">BERITA</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('our_team') ? 'active' : '' }}" href="/our_team">TIM</a>
        </li>
        @auth
        <li class="nav-item ms-lg-1">
          <a href="/createLaporan" class="btn-laporan nav-link">
            <i class="fas fa-plus-circle me-1"></i> Laporan Baru
          </a>
        </li>
        @endauth
      </ul>

      <div class="d-flex align-items-center">
        @guest
          <a href="/login" class="btn-laporan nav-link">
            <i class="fas fa-sign-in-alt me-1"></i> Login
          </a>
        @endguest

        @auth
        <div class="nav-item dropdown">
          <a class="nav-link dropdown-toggle d-flex align-items-center gap-1" href="#"
            role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-user-circle" style="font-size:1.1rem;color:rgba(255,255,255,.8)"></i>
            <span style="font-size:.82rem;color:rgba(255,255,255,.85);font-family:'Poppins',sans-serif">
              {{ Auth::user()->name }}
            </span>
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="/profile">
              <i class="fas fa-user me-2 text-muted" style="font-size:.75rem"></i> Profil
            </a></li>
            <li><a class="dropdown-item" href="/myreport">
              <i class="fas fa-file-alt me-2 text-muted" style="font-size:.75rem"></i> Laporan Saya
            </a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <a class="dropdown-item text-danger" href="#"
                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt me-2" style="font-size:.75rem"></i> Logout
              </a>
            </li>
          </ul>
        </div>
        @endauth
      </div>
    </div>
  </div>
</nav>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none">
  @csrf
</form>
