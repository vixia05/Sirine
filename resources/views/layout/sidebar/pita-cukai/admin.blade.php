{{-- ------ Menu Sidebar Jika Seksi Khazver Pikai ------ --}}
{{-- Menu Performa --}}
<li class="c-sidebar-nav-title">
    Performa Pegawai
    {{-- statistik verif pikai --}}
<li class="c-sidebar-nav-dropdown">
    <a class="c-sidebar-nav-dropdown-toggle" href="#">
        <span class="cil-chart-line c-sidebar-nav-icon"></span>
        Statistik Verifikasi
    </a>
    <ul class="c-sidebar-nav-dropdown-items">
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('performance.index') }}">
                Verifikasi Individu
            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('qty-unit.index') }}">
                Verifikasi Unit
            </a>
        </li>
    </ul>
</li>
{{-- statistik verif pikai --}}
<li class="c-sidebar-nav-item">
    <a class="c-sidebar-nav-link" href="{{ url('statistik-retur') }}">
        <span class="cil-chart-pie c-sidebar-nav-icon"></span>
        Statistik Retur
    </a>
</li>
</li>
{{-- menu admin pikai --}}
<li class="c-sidebar-nav-title">
    Menu Admin
    {{-- Update Order --}}
<li class="c-sidebar-nav-item">
    <a class="c-sidebar-nav-link" href="{{ url('update-data') }}">
        <span class="cil-cloud c-sidebar-nav-icon"></span>
        Update Order Pikai
    </a>
</li>
{{-- manajemen pikai --}}
<li class="c-sidebar-nav-item">
    <a class="c-sidebar-nav-link" href="{{ url('manage-user') }}">
        <span class="cil-user-follow c-sidebar-nav-icon"></span>
        Manajemen User
    </a>
</li>
{{-- verif pikai --}}
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
{{-- Kelolosan verif pikai --}}
<li class="c-sidebar-nav-dropdown">
    <a class="c-sidebar-nav-dropdown-toggle" href="#">
        <span class="fas fa-recycle c-sidebar-nav-icon"></span>
        Retur Pita Cukai
    </a>
    <ul class="c-sidebar-nav-dropdown-items">
        {{-- input kelolosan pikai --}}
        <li class="c-sidebar-nav-items">
            <a class="c-sidebar-nav-link" href="{{ url('input-defect') }}">
                Input Data Retur
            </a>
        </li>
        {{-- Data Kelolosan --}}
        <li class="c-sidebar-nav-items">
            <a class="c-sidebar-nav-link" href="{{ url('defect') }}">
                Data Retur
            </a>
        </li>
    </ul>
</li>
<li class="c-sidebar-nav-item">
    <a class="c-sidebar-nav-link" href="{{ url('evaluasi') }}">
        <span class="cil-clipboard c-sidebar-nav-icon"></span>
        Pesan Evaluasi
    </a>
</li>
</li>
