@extends('layout.app')
@section('tittle', 'Andon Cetak')
@section('content')


<div class="c-body">
  <main class="c-main">
    <div class="container-fluid">
      <div class="fade-in">
      {{-- Start Table Verif harian --}}
        <div class="row">
          <div class="col-md-12">  
            <div class="carousel slide" id="carouselCetak" data-ride="carousel" data-interval="15000">
              <div class="carousel-inner">
                @include('andon.pita-cukai.cetak.total-rencet') {{-- carousel Total Cetak --}}
                @include('andon.pita-cukai.cetak.jumlah-cetak')
              </div>
              <a class="carousel-control-prev" href="#carouselCetak" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselCetak" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
            </div>
          </div>
        </div>
      {{-- End Table Verif Harian --}}
      {{-- Start Chart Verif --}}
        <div class="row">
          <div class="col-md-6">
            <div class="card border-success text-center">
              <div class="card-header bg-success text-white"><h3>Grafik Cetak Harian (PCHT)</h3></div>
              <div class="card-body">
                <div class="c-chart-wrapper">
                  <canvas id="cetak_pcht"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card border-warning text-center">
              <div class="card-header bg-warning"><h3>Grafik Cetak Harian (MMEA & HPTL)</h3></div>
              <div class="card-body">
                <div class="c-chart-wrapper">
                  <canvas id="cetak_mmea"></canvas>
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
<script src="{{ asset('assets') }}/chart/andon/cetak.js"></script>

@endsection
