<div class="c-sidebar c-sidebar-dark c-sidebar-fixed  c-sidebar-xl-show" id="sidebar">
  <div class="c-sidebar-brand d-lg-down-none">
    <img class="c-sidebar-brand-full" src="{{asset('assets')}}/img/logo.png" width="100" height="100" alt="Sirine Logo" >
  </div>
  <ul class="c-sidebar-nav">
    {{-- Dashboard --}}
      <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="{{url('home')}}">
          <i class="cil-home c-sidebar-nav-icon"></i>
            Beranda
        </a>
      </li>
    {{-- Biodata --}}
      <li class="c-navbar-nav-item">
        <a class="c-sidebar-nav-link" href="{{url('Profile')}}">
          <i class="far fa-user c-sidebar-nav-icon"></i>
          Biodata Saya
        </a>
      </li>
    {{------------ Menu untuk Super User ------------}}
      @if (Helper::call()->level() == 0)
        @include('layout.sidebar.pita-cukai.admin')
      @endif

    {{------------ Menu Untuk User ------------}}
      {{-- Menu Untuk Kadep Ke Atas --}}
        @if (Helper::call()->AuthUser()->id_seksi == 1 && Helper::call()->level() > 3)       
          @include('layout.sidebar.pita-cukai.admin')

      {{---- Menu Until Seksi Khazver Pikai ----}}
        @elseif (Helper::call()->AuthUser()->id_seksi == 2)

          {{----- Menu Untuk User Level 1 (User Biasa) -----}}     
            @if (Helper::call()->level() == 1)                      
              {{---- Menu Untuk Unit Verifikasi Pita Cukai ----}}  
                @if (Helper::call()->AuthUser()->id_unit == 4)         
                  @include('layout.sidebar.pita-cukai.verif.level1')            
                @endif

          {{----- Menu Untuk User Level 2 (PIC) -----}}      
            @elseif (Helper::call()->level() == 2)
              {{---- Menu Untuk Unit Verifikasi ----}}                  
                @if (Helper::call()->AuthUser()->id_unit == 4)         
                  @include('layout.sidebar.pita-cukai.verif.level2')            
                @endif
                
          {{----- Menu Untuk User Level 3 (Admin) -----}}
            @elseif (Helper::call()->level() == 3)                  
              {{---- If Unit Verifikasi ----}}  
                @if (Helper::call()->AuthUser()->id_unit == 4)          
                  @include('layout.sidebar.pita-cukai.verif.level3')            
                @endif
                
          {{----- Menu Untuk User Level 4 (Kaun - Kasek) -----}}
            @elseif (Helper::call()->level() == 4)                  
              {{---- If Unit Verifikasi ----}}  
                @if (Helper::call()->AuthUser()->id_unit == 4)          
                  @include('layout.sidebar.pita-cukai.verif.level4')            
                @endif
            @endif
        @endif            
        @include('layout.sidebar.pita-cukai.andon')
  </ul>
  <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
</div>
