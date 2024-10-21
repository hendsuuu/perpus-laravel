<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="{{ route('dashboard') }}">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>  
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('user.index') }}">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Master User</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('role.index') }}">
        <i class="icon-columns menu-icon"></i>
        <span class="menu-title">Master Jenis Role</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('menu.index') }}">
        <i class="icon-layout menu-icon"></i>
        <span class="menu-title">Master Menu</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('buku.index') }}">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Daftar Buku</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('buku.create') }}">
        <i class="icon-columns menu-icon"></i>
        <span class="menu-title">Tambah Buku</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('kategori.index') }}">
        <i class="icon-layout menu-icon"></i>
        <span class="menu-title">Kategori Buku</span>
      </a>
    </li>
    @auth
    <li class="nav-item">
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
            <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="icon-logout menu-icon"></i>
                <span class="menu-title">Logout</span>
            </a>
        </form>
    </li>
@endauth
  </ul>
</nav>

{{-- <ul class="sidebar-menu">
  @foreach(auth()->user()->role->menus as $menu)
      <li>
          <a href="{{ $menu->url }}">
              <i class="{{ $menu->icon }}"></i>
              <span>{{ $menu->name }}</span>
          </a>
      </li>
  @endforeach
</ul> --}}
