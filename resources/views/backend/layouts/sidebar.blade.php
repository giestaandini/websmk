<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="position-sticky pt-3">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
          <span data-feather="home"></span>
          Dashboard
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('beritaback*') ? 'active' : '' }}" href="{{ route('beritaback') }}">
          <span data-feather="file-text"></span>
          Berita Sekolah
        </a>
      </li>
    </ul> 

    @if(auth()->user()->role === 'admin')
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Administrator</span>
        </h6>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('kategori*') ? 'active' : '' }}" href="{{ route('kategori') }}">
              <span data-feather="layers"></span>
              Kategori Berita 
            </a>
          </li>
        </ul>
      @endif
  </div>
</nav>