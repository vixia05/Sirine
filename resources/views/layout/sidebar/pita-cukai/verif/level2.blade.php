{{-- Menu User PIC Verif Pikai --}}
    {{-- Menu Performa --}}
        <li class="c-sidebar-nav-title">
            Performa Pegawai
         {{-- statistik verif pikai --}}
            <li class="c-sidebar-nav-item">
              <a class="c-sidebar-nav-link" href="{{ url('performance') }}">
                <span class="cil-chart-line c-sidebar-nav-icon"></span>
                  Statistik Verifikasi
              </a>
            </li>
         {{-- statistik verif pikai --}}
            <li class="c-sidebar-nav-item">
              <a class="c-sidebar-nav-link" href="{{ url('statistik-retur') }}">
                <span class="cil-chart-pie c-sidebar-nav-icon"></span>
                  Statistik Retur
              </a>
            </li>
        </li>

    {{-- Menu PIC --}}
        <li class="c-sidebar-nav-title">
            Menu PIC
            <li class="c-sidebar-nav-dropdown">
              <a class="c-sidebar-nav-dropdown-toggle" href="#">
                <span class="cil-color-border  c-sidebar-nav-icon"></span>
                Verifikasi Pita Cukai
              </a>
              <ul class="c-sidebar-nav-dropdown-items">
                {{-- Input verif pikai --}}
                <li class="c-sidebar-nav-item">
                  <a class="c-sidebar-nav-link" href="{{ url('input-verifikasi') }}">
                    Input Data Verifikasi
                  </a>
                </li>
                {{-- Data verif pikai --}}
                <li class="c-sidebar-nav-items">
                  <a class="c-sidebar-nav-link" href="{{ url('data-verifikasi') }}">
                    Data Verifikasi
                  </a>
                </li>
              </ul>
            </li>
        </li>