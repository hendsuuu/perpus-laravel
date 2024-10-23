
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    @foreach($menus as $menu)
      <li class="nav-item">
        <a class="nav-link" href="{{ $menu->menu_link }}">
          <i class="{{ $menu->menu_icon }}"></i>
          {{-- {{dd($menu->menuLevel)}} --}}
          <span class="menu-title">{{ $menu->menu_name }} </span>
          {{-- ({{ $menu->menuLevel[0]->level }}) --}}
        </a>
      </li>
    @endforeach

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
