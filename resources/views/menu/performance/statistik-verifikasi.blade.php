@extends('layout.app')
@section('tittle', 'My Performance')
@section('content')
    <div class="c-body">
      <main class="c-main">
        <div class="container-fluid">
          <div class="fade-in">
              <div class="row">
                  <div class="col-lg-8 col-md-12">
                    <div class="card" style="height: 97%">
                        <div class="card-header">
                          @if (Helper::call()->level() === 0 || Helper::call()->level() > 2)
                            <div class="row">
                                {{-- Pick Name --}}
                                <div class="col-md-4" style="margin-bottom: 10px">
                                    <h5 id="chartHeader" name="chartHeader">Hasil Verifikasi Pita Cukai</h5>
                                    <span class="small text-muted" id="chartSubHeader" name="chartSubHeader">Periode {{ now()->format('d-m-Y') }}</span>
                                </div>
                                {{-- Pick Period --}}
                                <div class="col-md-8">
                                  <div class="input-group mb-3 flex-nowrap">
                                      {!! Form::select('group',$station,null,['class'=>'form-control','placeholder'=>'Workstation','id'=>'group',]) !!}
                                      {!! Form::select('np',[],null,['class'=>'form-control','placeholder'=>'Nama / NP','id'=>'np','onChange'=>'updateData()']) !!}
                                      <input class="form-control" type="text" id="dateRangeChrt" name="dateRangeChrt">
                                      <button class="btn btn-info" type="button" id="resetFilter" onclick="reset()">Reset</button>
                                  </div>
                                </div>
                            </div>
                          @else
                            <div class="row">
                                {{-- Pick Name --}}
                                <div class="col-md-8 mb-2">
                                    <h5 id="chartHeader" name="chartHeader">Hasil Verifikasi {{ Auth::user()->nama }}</h5>
                                    <span class="small text-muted" id="chartSubHeader" name="chartSubHeader">Periode {{ now()->format('d-m-Y') }}</span>
                                </div>
                                <div class="col-md-4">
                                  <input type="hidden" value="{{ Auth::user()->np }}" id="np" name="np">
                                  <input class="form-control" type="text" id="dateRangeChrt" name="dateRangeChrt">
                                </div>
                            </div>
                          @endif
                        </div>
                        <div class="card-body">
                            <div class="row" style="height: 100%">
                                {{-- Quantity Graph Daily--}}
                                <div class="col-md-12">
                                    <div class="c-chart-wrapper" style="height: 100%">
                                      <canvas class="chart" id="chartDaily" name="chartDaily"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-12">
                    <div class="row">
                        {{-- Quatity Graph Yearly --}}
                        <div class="col-lg-12 col-md-6">
                            <div class="card" style="height: 94%">
                                <div class="card-header">
                                  <div class="row">
                                    <div class="col-md-6">
                                      <h5 class="card-title" id="chartYearHeader" name="chartYearHeader">Hasil Verifikasi</h5>
                                      <span class="small text-muted" id="chartYearSubHeader" name="chartYearSubHeader">Tahun {{ now()->format('Y') }}</span>
                                    </div>
                                    <div class="col-md-6">
                                      {!! Form::selectYear('year',now()->format('Y'),2020,null,['id'=>'year','name'=>'year','class'=>'form-control', 'style'=>'width:50%; float: right','onChange'=>'updateData()']) !!}
                                    </div>
                                  </div>
                                </div>
                                <div class="card-body">
                                      <div class="c-chart-wrapper">
                                        <canvas class="chart" id="chartYearly" name="chartYearly" ></canvas>
                                      </div>
                                </div>
                            </div>
                        </div>
                        {{-- Standar Quantity --}}
                        <div class="col-lg-12 col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Standar Verifikasi Harian (Dalam Keadaan Baik)</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                      <div class="col-md-12" style="overflow: auto">
                                        <table class="table table-striped" style="vertical-align: center;">
                                          <thead>
                                            <tr>
                                              <th nowrap>Jam Kerja</th>
                                              <th>Standar Verifikasi (Rim)</th>
                                              <th>:</th>
                                              <th>Standar Verifikasi (Lembar)</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <tr>
                                              <td>Tidak Lembur</td>
                                              <td>30 Rim</td>
                                              <td>:</td>
                                              <td>15.000 Lembar</td>
                                            </tr>
                                            <tr>
                                              <td>Lembur Awal</td>
                                              <td>40 Rim</td>
                                              <td>:</td>
                                              <td>20.000 Lembar</td>
                                            </tr>
                                            <tr>    
                                              <td>Lembur Akhir</td>
                                              <td>45 Rim</td>
                                              <td>:</td>
                                              <td>22.500 Lembar</td>
                                            </tr>
                                            <tr>
                                              <td>Lembur Awal Akhir</td>
                                              <td>55 Rim</td>
                                              <td>:</td>
                                              <td>27.500 Lembar</td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-12">
                      <div class="card">
                        <div class="card-header card-accent-info">
                          <h5 style="text-align: center" id="tableHeader" name="tableHeader">Data Hasil Verifikasi Pita Cukai</h5>
                        </div>
                          <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="input-group-prepend flex-nowrap">
                                        <button class="btn btn-info" type="button" disabled>Periode</button>
                                        <input class="form-control" type="text" id="dateRange" name="dateRange">
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 10px">
                              <div class="col-md-12 col-lg-12">
                                <table class="table table-align-middle table-bordered table-striped" id="data-verif" name = "data-verif" style="width: 100%">
                                  <thead class="table-secondary">
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>NP</th>
                                    <th>Jumlah&nbsp;(RIM)</th>
                                    <th>Lembur</th>
                                    <th>Target Verifikasi</th>
                                    <th>Keterangan</th>
                                  </thead>
                                </table>
                              </div>
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
@section('script-js')
  @push('js')
    <script>
      var dataChart = {
        dateDaily : @json($dateDaily),
        qtyVerifDaily : @json($qtyVerifDaily),
        qtyVerifYearly : @json($qtyVerifYearly),
      }
    </script>
    <script src="{{ asset('js/plugins/moment.min.js') }}"></script>
    <script src="{{ asset('js/menu/statistik-verifikasi.js') }}"></script>
    <script src="{{ asset('js/Chart/statistik-verifikasi.js') }}"></script>
    <script src="{{ asset('js/DataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/daterangepicker.js') }}"></script> 
  @endpush
@endsection
