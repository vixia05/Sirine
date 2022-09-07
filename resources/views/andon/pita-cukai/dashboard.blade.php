@extends('layout.app')
@section('tittle', 'Andon')
@section('content')


<div class="c-body">
  <main class="c-main">
    <div class="container-fluid">
      <div class="fade-in">
      {{-- Start Table Rekap PCHT Bulanan --}}
        <div class="row">
          <div class="col-md-12">  
            <div class="card border-success text-center">
              <div class="card-header"><h2>Total Rencet PCHT November</h2></div>
              <div class="card-header text-white bg-success"><h1 style="font-size: 90px">{{ number_format($rencet_pcht) }}</h1></div>
              <div class="card-body">
                <DIV class="row">
                  <div class="col-md-3">
                    <div class="card bg-info text-center">
                      <div class="card-header text-white"><h4>Bahan Baku</h4 ></div>
                      <div class="card-body bg-white">
                          <h1>{{ number_format($bb_pcht) }}</h1>
                      </div>
                      <div class="card-footer bg-white">
                        <div class="col-sm-12 col-md mb-sm-2 mb-0">
                          <div class="text-muted">Progress Bahan Baku</div>
                            <strong>({{ number_format($progres_bb,2)}} %)</strong>
                          <div class="progress progress-xs mt-2">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: {{ $progres_bb }}%" aria-valuenow="{{ $progres_bb }}" aria-valuemin="0" aria-valuemax="100"></div>
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" style="width: {{ 100 - $progres_bb }}%" aria-valuenow="{{ 100 - $progres_bb }}" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="card bg-info text-center">
                      <div class="card-header text-white"><h4>Cetak</h4></div>
                      <div class="card-body bg-white">
                          <h1>{{ number_format($cetak_pcht) }}</h1>
                      </div>
                      <div class="card-footer bg-white">
                        <div class="col-sm-12 col-md mb-sm-2 mb-0">
                          <div class="text-muted">Progress Cetak</div>
                            <strong>({{ number_format($progres_cetak,2) }} %)</strong>
                          <div class="progress progress-xs mt-2">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: {{ $progres_cetak }}%" aria-valuenow="{{ $progres_cetak }}" aria-valuemin="0" aria-valuemax="100"></div>
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" style="width: {{ 100 - $progres_cetak }}%" aria-valuenow="{{ 100 - $progres_cetak }}" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="card bg-info text-center">
                      <div class="card-header text-white"><h4>Verifikasi</h4></div>
                      <div class="card-body bg-white">
                          <h1>{{ number_format($verif_pcht) }}</h1>
                      </div>
                      <div class="card-footer bg-white">
                        <div class="col-sm-12 col-md mb-sm-2 mb-0">
                          <div class="text-muted">Progress Verifikasi</div>
                            <strong>({{ number_format($progres_verif,2) }} %)</strong>
                          <div class="progress progress-xs mt-2">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: {{ $progres_verif }}%" aria-valuenow="{{ $progres_verif }}" aria-valuemin="0" aria-valuemax="100"></div>
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" style="width: {{ 100 - $progres_verif }}%" aria-valuenow="{{ 100 - $progres_verif }}" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="card bg-info text-center">
                      <div class="card-header text-white"><h4>Kemas</h4></div>
                      <div class="card-body bg-white">
                          <h1>{{ number_format($kemas_pcht) }}</h1>
                      </div>
                      <div class="card-footer bg-white">
                        <div class="col-sm-12 col-md mb-sm-2 mb-0">
                          <div class="text-muted">Progress Kemas</div>
                            <strong>({{ number_format($progres_kemas,2) }} %)</strong>
                          <div class="progress progress-xs mt-2">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: {{ $progres_kemas}}%" aria-valuenow="{{ $progres_kemas}}" aria-valuemin="0" aria-valuemax="100"></div>
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" style="width: {{ 100 - $progres_kemas}}%" aria-valuenow="{{ 100 - $progres_kemas}}" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </DIV>
              </div>
            </div>
          </div>
        </div>
      {{-- End Table Rekap PCHT Bulanan --}}

      {{-- Start Table Rekap MMEA&HPTL DP Bulanan --}}
        <div class="row">
          <div class="col-md-12">  
            <div class="card border-warning text-center">
              <div class="card-header"><h2>Total Rencet MMEA & HPTL DP November</h2></div>
              <div class="card-header bg-warning"><h1 style="font-size: 90px">{{ number_format($rencet_mmea) }}</h1></div>
              <div class="card-body">
                <DIV class="row">
                  <div class="col-md-3">
                    <div class="card bg-info text-center">
                      <div class="card-header text-white"><h4>Bahan Baku</h4 ></div>
                      <div class="card-body bg-white">
                          <h1>{{ number_format($bb_mmea) }}</h1>
                      </div>
                      <div class="card-footer bg-white">
                        <div class="col-sm-12 col-md mb-sm-2 mb-0">
                          <div class="text-muted">Progress Bahan Baku</div>
                            <strong>({{ number_format($progres_bb_mmea,2) }} %)</strong>
                          <div class="progress progress-xs mt-2">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: {{ $progres_bb_mmea }}%" aria-valuenow="{{ $progres_bb_mmea }}" aria-valuemin="0" aria-valuemax="100"></div>
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" style="width: {{ 100 - $progres_bb_mmea }}%" aria-valuenow="{{ 100 - $progres_bb_mmea }}" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="card bg-info text-center">
                      <div class="card-header text-white"><h4>Cetak</h4></div>
                      <div class="card-body bg-white">
                          <h1>{{ number_format($cetak_mmea) }}</h1>
                      </div>
                      <div class="card-footer bg-white">
                        <div class="col-sm-12 col-md mb-sm-2 mb-0">
                          <div class="text-muted">Progress Cetak</div>
                            <strong>({{ number_format($progres_cetak_mmea,2) }} %)</strong>
                          <div class="progress progress-xs mt-2">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: {{ $progres_cetak_mmea }}%" aria-valuenow="{{ $progres_cetak_mmea }}" aria-valuemin="0" aria-valuemax="100"></div>
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" style="width: {{ 100 - $progres_cetak_mmea }}%" aria-valuenow="{{ 100 - $progres_cetak_mmea }}" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="card bg-info text-center">
                      <div class="card-header text-white"><h4>Verifikasi</h4></div>
                      <div class="card-body bg-white">
                          <h1>{{ number_format($verif_mmea) }}</h1>
                      </div>
                      <div class="card-footer bg-white">
                        <div class="col-sm-12 col-md mb-sm-2 mb-0">
                          <div class="text-muted">Progress Verifikasi</div>
                            <strong>({{ number_format($progres_verif_mmea,2) }} %)</strong>
                          <div class="progress progress-xs mt-2">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: {{ $progres_verif_mmea }}%" aria-valuenow="{{ $progres_verif_mmea }}" aria-valuemin="0" aria-valuemax="100"></div>
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" style="width: {{ 100 - $progres_verif_mmea }}%" aria-valuenow="{{ 100 - $progres_verif_mmea }}" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="card bg-info text-center">
                      <div class="card-header text-white"><h4>Kemas</h4></div>
                      <div class="card-body bg-white">
                          <h1>{{ number_format($kemas_mmea) }}</h1>
                      </div>
                      <div class="card-footer bg-white">
                        <div class="col-sm-12 col-md mb-sm-2 mb-0">
                          <div class="text-muted">Progress Kemas</div>
                            <strong>({{ number_format($progres_kemas_mmea,2) }} %)</strong>
                          <div class="progress progress-xs mt-2">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: {{ $progres_kemas_mmea }}%" aria-valuenow="{{ $progres_kemas_mmea }}" aria-valuemin="0" aria-valuemax="100"></div>
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" style="width: {{ 100 - $progres_kemas_mmea }}%" aria-valuenow="{{ 100 - $progres_kemas_mmea }}" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </DIV>
              </div>
            </div>
          </div>
        </div>
      {{-- EndTable Rekap MMEA & HPTL DP Bulanan --}}

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
