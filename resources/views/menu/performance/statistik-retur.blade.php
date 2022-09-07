@extends('layout.app')
@section('tittle', 'Statistik Retur')
@section('content')
    <div class="c-body">
      <main class="c-main">
        <div class="container-fluid">
          <div class="fade-in">
              <div class="row">
                  <div class="col-lg-8 col-md-12">
                    <div class="card" style="height: 97%">
                        <div class="card-header">
                          @if ($level === 0 || $level > 2)
                            <div class="row">
                                {{-- Pick Name --}}
                                <div class="col-md-4 mb-2">
                                    <h5 id="chartHeader" name="chartHeader">Data Retur Pita Cukai</h5>
                                    <span class="small text-muted" id="chartSubHeader" name="chartSubHeader">Tahun {{ now()->format('Y') }}</span>
                                </div>
                                {{-- Pick Period --}}
                                <div class="col-md-8">
                                  <div class="input-group flex-nowrap">
                                      {!! Form::select('group',[],null,['class'=>'form-control','placeholder'=>'Workstation','id'=>'group',]) !!}
                                      {!! Form::select('np',[],null,['class'=>'form-control','placeholder'=>'Nama / NP','id'=>'np','onChange'=>'updateData()']) !!}
                                      {!! Form::selectYear('year',now()->format('Y'),2020,null,['id'=>'year','name'=>'year','class'=>'form-control','onChange'=>'updateData()']) !!}
                                      <button class="btn btn-info" type="button" id="resetFilter" onclick="reset()">Reset</button>
                                  </div>
                                </div>
                            </div>
                          @else
                            <div class="row">
                                {{-- Pick Name --}}
                                <div class="col-md-8 mb-2">
                                    <h5 id="chartHeader" name="chartHeader">Data Retur {{ Auth::user()->nama }}</h5>
                                    <span class="small text-muted" id="chartSubHeader" name="chartSubHeader">Periode {{ now()->format('d-m-Y') }}</span>
                                </div>
                                <div class="col-md-4">
                                  <input type="hidden" value="{{ Auth::user()->np }}" id="np" name="np">
                                  {!! Form::selectYear('year',now()->format('Y'),2020,null,['id'=>'year','name'=>'year','class'=>'form-control','onChange'=>'updateData()']) !!}
                                </div>
                            </div>
                          @endif
                        </div>
                        <div class="card-body">
                            <div class="row" style="height: 100%">
                                {{-- Quantity Graph Daily--}}
                                <div class="col-md-12">
                                    <div class="c-chart-wrapper" style="height: 100%">
                                      <canvas class="chart" id="myDefect" name="myDefect"></canvas>
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
                                      <h5 class="card-title" id="chartYearHeader" name="chartYearHeader">Jenis Retur Pita Cukai</h5>
                                      <span class="small text-muted" id="chartYearSubHeader" name="chartYearSubHeader">Tahun {{ now()->format('Y') }}</span>
                                    </div>
                                  </div>
                                </div>
                                <div class="card-body">
                                      <div class="c-chart-wrapper">
                                        <canvas class="chart" id="typeInd" name="typeInd" ></canvas>
                                      </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6">
                            <div class="card" style="height: 94%">
                                <div class="card-header">
                                  <div class="row">
                                    <div class="col-md-6">
                                      <h5 class="card-title" id="chartYearHeader" name="chartYearHeader">Jenis Retur Unit Pita Cukai</h5>
                                      <span class="small text-muted" id="chartYearSubHeader" name="chartYearSubHeader">Tahun {{ now()->format('Y') }}</span>
                                    </div>
                                  </div>
                                </div>
                                <div class="card-body">
                                      <div class="c-chart-wrapper">
                                        <canvas class="chart" id="typeAll" name="typeAll" ></canvas>
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
                        <div class="card-header card-accent-info text-center">
                          <h5 id="tableHeader" name="tableHeader">List Jenis Kerusakan Pita Cukai</h5>
                        </div>
                        <div class="card-body">
                          <table class="table table-responsive-sm table-striped text-center" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>Jenis Kerusakan ( Bahasa Formal )</th>
                                    <th>Jenis Kerusakan ( Bahasa Produksi )</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Hologram (Missing)</td>
                                    <td>Hologram Hilang</td>
                                </tr>
                                <tr>
                                    <td>Hologram (Scratch)</td>
                                    <td>Hologram Terkelupas</td>
                                </tr>
                                <tr>
                                    <td>Hologram (Miss Register)</td>
                                    <td>Hologram Bergeser</td>
                                </tr>
                                <tr>
                                    <td>Print (Blur Text)</td>
                                    <td>Text Blur</td>
                                </tr>
                                <tr>
                                    <td>Print (Blur Image)</td>
                                    <td>Cetakan Dasar Blur</td>
                                </tr>
                                <tr>
                                    <td>Print (Ink Smear)</td>
                                    <td>Blobor</td>
                                </tr>
                                <tr>
                                    <td>Print (Spot)</td>
                                    <td>Noda</td>
                                </tr>
                                <tr>
                                    <td>Print (Under Inking)</td>
                                    <td>Text Dasar Tipis</td>
                                </tr>
                                <tr>
                                    <td>Print (Over Inking)</td>
                                    <td>Text Dasar Tebal</td>
                                </tr>
                                <tr>
                                    <td>Color (Under Image)</td>
                                    <td>Warna Dasar Tipis</td>
                                </tr>
                                <tr>
                                    <td>Color (Over Image)</td>
                                    <td>Warna Dasar Tebal</td>
                                </tr>
                                <tr>
                                    <td>Color (Under Text)</td>
                                    <td>Warna Text Tipis</td>
                                </tr>
                                <tr>
                                    <td>Color (Over Text)</td>
                                    <td>Warna Text Tebal</td>
                                </tr>
                                <tr>
                                    <td>Color (Non Uniform)</td>
                                    <td>Kombinasi Warna Tidak Sesuai</td>
                                </tr>
                                <tr>
                                    <td>Color (Incorrect)</td>
                                    <td>Warna Dasar Tidak Sesuai</td>
                                </tr>
                                <tr>
                                    <td>Appeareance (Folded)</td>
                                    <td>Terlipat</td>
                                </tr>
                                <tr>
                                    <td>Appereance (Plooi)</td>
                                    <td>Flui</td>
                                </tr>
                                <tr>
                                    <td>Appereance (Hole)</td>
                                    <td>Bolong</td>
                                </tr>
                                <tr>
                                    <td>Appeareance (Tear)</td>
                                    <td>Sobek</td>
                                </tr>
                                <tr>
                                    <td>Mixed Product</td>
                                    <td>Tercampur</td>
                                </tr>
                            </tbody>
                          </table>
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
  @if ($level === 0 || $level > 2)
    <script>
      var dataChart = {
        returUnit : @json($returUnit),
        jenisReturInd  : @json($jenisReturUnit),
        jenisReturUnit : @json($jenisReturUnit),
      }
    </script>
  @elseif($level == 1 || $level == 2)
  <script>
    var dataChart = {
      returInd  : @json($returInd),
      returUnit : @json($returUnit),
      jenisReturInd  : @json($jenisReturInd),
      jenisReturUnit : @json($jenisReturUnit),
    }
  </script>
  @endif
    <script src="{{ asset('js/plugins/moment.min.js') }}"></script>
    <script src="{{ asset('js/menu/statistik-retur.js') }}"></script>
    <script src="{{ asset('js/Chart/statistik-retur.js') }}"></script>
    {{-- <script src="{{ asset('js/DataTables/datatables.min.js') }}"></script> --}}
    <script src="{{ asset('js/plugins/daterangepicker.js') }}"></script> 
  @endpush
@endsection
