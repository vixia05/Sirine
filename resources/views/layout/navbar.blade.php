<header class="c-header c-header-light c-header-fixed c-header-with-subheader">
  <button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar" data-class="c-sidebar-show">
    <i class="cil-menu"></i>
  </button>
  <a class="c-header-brand d-lg-none" href="#">
  </a>
  <button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true">
    <i class="cil-menu"></i>
  </button>
  <ul class="c-header-nav d-md-down-none">
    <li class="c-header-nav-item px-3">
      <a class="c-header-nav-link" href="{{ url('home') }}">Beranda</a>
    </li>
    <li class="c-header-nav-item px-3">
      <a class="c-header-nav-link" href="{{ url('Profile') }}">Profile</a>
    </li>
  </ul>
  <ul class="c-header-nav ml-auto mr-4">
    <li class="c-header-nav-item dropdown">
      <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
        <p style="margin-right: 10px; margin-top: 15px"><strong>{{ auth::user()->nama }}</strong></p>
        <div class="c-avatar">
          <img class="c-avatar-img" src="{{ asset('assets') }}/img/{{ $foto->foto }}" alt="user@email.com">
        </div>
      </a>
      <div class="dropdown-menu dropdown-menu-right pt-0">
        <div class="dropdown-header bg-light py-2">
          <strong>Account</strong>
        </div>
        <a class="dropdown-item" href="{{url('Profile')}}">
          <i class="cil-user"></i></i> Profile
        </a>
        <a class="dropdown-item" href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <i class="cil-account-logout"></i></i> Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
      </div>
    </li>
  </ul>
</header>