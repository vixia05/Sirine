{{-- Andon Pita Cukai --}}
  {{-- Dashboard Andon Pita Cukai --}}
    <li class="c-sidebar-nav-title">
      Andon
      <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="{{ url('andon') }}">
          <span class="cil-chart c-sidebar-nav-icon"></span>
            Progress Pita Cukai
        </a>
      </li>
    </li>
  {{-- Andon Cetak Pita Cukai --}}
  @if (Helper::call()->AuthUser()->id_unit === 3 || Helper::call()->level() === 0 || Helper::call()->level() > 2)
    <li class="c-sidebar-nav-dropdown">
      <a class="c-sidebar-nav-link" href="{{ url('andon_cetak') }}">
        <span class="cil-layers c-sidebar-nav-icon"></span>
          Cetak Pita Cukai
      </a>
    </li>
  @endif
  {{-- Andon Verif Pita Cukai --}}
  @if (Helper::call()->AuthUser()->id_unit === 4 || Helper::call()->level() === 0 || Helper::call()->level() > 2)
    <li class="c-sidebar-nav-dropdown">
      <a class="c-sidebar-nav-link" href="{{ url('andon_verifikasi') }}">
        <span class="cil-layers c-sidebar-nav-icon"></span>
          Verifikasi Pita Cukai
      </a>
    </li>
  @endif
  {{-- Andon Khazkhir & Pengiriman Pita Cukai --}}
  @if (Helper::call()->AuthUser()->id_unit === 5 || Helper::call()->AuthUser()->id_unit === 5 || Helper::call()->level() === 0 || Helper::call()->level() > 2)
    <li class="c-sidebar-nav-dropdown">
      <a class="c-sidebar-nav-link" href="{{ url('andon_khazkhir') }}">
        <span class="cil-layers c-sidebar-nav-icon"></span>
          Khazkhir Pita Cukai
      </a>
    </li>
  @endif
{{-- End Andon Pita Cukai --}}