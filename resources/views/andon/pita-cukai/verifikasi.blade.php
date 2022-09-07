@extends('layout.app')
@section('tittle', 'Andon Verifikasi')
@section('content')


<div class="c-body">
  <main class="c-main">
    <div class="container-fluid">
      <div class="fade-in">
      {{-- Start Table Verif harian --}}
        <div class="row">
          <div class="col-md-12">  
            <div class="carousel slide" id="carouselVerifikasi" data-ride="carousel" data-interval="15000">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  @include('andon.pita-cukai.verifikasi.harian-pcht') {{-- carousel Harian PCHT --}}
                </div>
                <div class="carousel-item"> 
                  @include('andon.pita-cukai.verifikasi.harian-mmea') {{-- carousel Harian MMEA --}}
                </div>
                <div class="carousel-item"> 
                  @include('andon.pita-cukai.verifikasi.bulanan-pcht') {{-- carousel Bulanan PCHT --}}
                </div>
                <div class="carousel-item">
                  @include('andon.pita-cukai.verifikasi.bulanan-mmea') {{-- carousel Bulanan MMEA & HPTL --}}
                </div>
                <div class="carousel-item">
                  @include('andon.pita-cukai.verifikasi.wip-pcht') {{-- carousel Bulanan MMEA & HPTL --}}
                </div>
                <div class="carousel-item">
                  @include('andon.pita-cukai.verifikasi.wip-mmea') {{-- carousel Bulanan MMEA & HPTL --}}
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselVerifikasi" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselVerifikasi" role="button" data-slide="next">
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
            <div class="card border-warning text-center">
              <div class="card-header bg-warning"><h3>Grafik Pendapatan Harian (PCHT)</h3></div>
              <div class="card-body">
                <div class="c-chart-wrapper">
                  <canvas id="daily_verif"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card border-warning text-center">
              <div class="card-header bg-warning"><h3>Grafik Inschiet Harian</h3></div>
              <div class="card-body">
                <div class="c-chart-wrapper">
                  <canvas id="daily_inschiet"></canvas>
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
    },90000);
  })
</script>
<script>
var dataChart = {
        SumChartMMEA : @json($sum_chm),
        SumChartPCHT : @json($sum_chp),
        DateChartMMEA : @json($date_chm),
        InschietChartPCHT : @json($inschiet_chp),
      }
</script>
<script src="{{ asset('js/Chart.min.js') }}"></script>
<script src="{{ asset('js/coreui-chartjs.bundle.js') }}"></script>
<script src="{{ asset('assets') }}/chart/andon/verifikasi.js"></script>

@endsection
