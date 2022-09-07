@extends('layout.app')
@section('tittle', 'Andon Khazkhir')
@section('content')


<div class="c-body">
  <main class="c-main">
    <div class="container-fluid">
      <div class="fade-in">
      {{-- Start Table Total Order --}}
        <div class="row">
          <div class="col-md-12">  
            <div class="carousel slide" id="carouselOrder" data-ride="carousel" data-interval="15000">
              <div class="carousel-inner">
                  @include('andon.pita-cukai.khazkhir.total') {{-- carousel Total Kirim PCHT & MMEA --}}
              </div>
              <a class="carousel-control-prev" href="#carouselOrder" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselOrder" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
            </div>
          </div>
        </div>
      {{-- End Table Total Order --}}
      {{-- Start Table Khazkhir --}}
        <div class="row">
          <div class="col-md-6">  
            <div class="carousel slide" id="carouselKhazkhir" data-ride="carousel" data-interval="15000">
              <div class="carousel-inner">
                  @include('andon.pita-cukai.khazkhir.kemas') {{-- carousel Kemas PCHT & MMEA --}}
              </div>
              <a class="carousel-control-prev" href="#carouselKhazkhir" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselKhazkhir" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
            </div>
          </div>
          <div class="col-md-6">  
            <div class="carousel slide" id="carouselPengiriman" data-ride="carousel" data-interval="15000">
              <div class="carousel-inner">
                  @include('andon.pita-cukai.khazkhir.kirim') {{-- carousel Kirim PCHT & MMEA --}}
              </div>
              <a class="carousel-control-prev" href="#carouselPengiriman" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselPengiriman" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
            </div>
          </div>
        </div>
      {{-- End Table Khazkhir --}}
      {{-- Start Chart Verif --}}
        <div class="row">
          <div class="col-md-12">
            <div class="card border-warning text-center">
              <div class="card-header bg-warning"><h3>Grafik Pengemasan Harian (PCHT)</h3></div>
              <div class="card-body">
                <div class="c-chart-wrapper">
                  <canvas id="daily_kemas"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>      
</div>

@endsection

@section('scriptchrt')
<script>
  $(document).ready(function(){
    setTimeout(function(){
      location.reload();
    },60000);
  })
</script>
<script>
</script>
<script src="{{ asset('js/Chart.min.js') }}"></script>
<script src="{{ asset('js/coreui-chartjs.bundle.js') }}"></script>
<script src="{{ asset('assets') }}/chart/andon/verifikasi.js"></script>

@endsection
