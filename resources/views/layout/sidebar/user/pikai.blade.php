<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
  <div class="c-sidebar-brand d-lg-down-none">
    <img class="c-sidebar-brand-full" src="{{asset('assets')}}/img/logo.png" width="118" height="46" alt="Sirine Logo" >
  </div>
  <ul class="c-sidebar-nav">
    <li class="c-sidebar-nav-item">
      <a class="c-sidebar-nav-link" href="{{url('home')}}">
        <i class="cil-home c-sidebar-nav-icon"></i>
          Beranda
      </a>
    </li>
    <li class="c-navbar-nav-item">
      <a class="c-sidebar-nav-link" href="{{url('Profile')}}">
        <i class="far fa-user c-sidebar-nav-icon"></i>
        Biodata Saya
      </a>
    </li>
    <li class="c-navbar-nav-item">
      <a class="c-sidebar-nav-link" href="{{ url('info-retur') }}">
        <i class="fas fa-recycle c-sidebar-nav-icon"></i>
        Informasi Retur Pita Cukai
      </a>
    </li>
    <li class="c-sidebar-nav-dropdown">
      <a class="c-sidebar-nav-dropdown-toggle">
        <i class="cil-graph c-sidebar-nav-icon"></i>
          Performa Saya
      </a>
      <ul class="c-sidebar-nav-dropdown-items">
        <li class="c-sidebar-nav-item">
          <a class="c-sidebar-nav-link" href="{{ url('stat-defect') }}">
            <span class="cil-chart-pie c-sidebar-nav-icon"></span>
              Statistik Retur
          </a>
        </li>
        <li class="c-sidebar-nav-item">
          <a class="c-sidebar-nav-link" href="{{ url('performance') }}">
            <span class="cil-chart-line c-sidebar-nav-icon"></span>
              Statistik Verifikasi
          </a>
        </li>
      </ul>
    </li>
  </ul>
  <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
</div>
