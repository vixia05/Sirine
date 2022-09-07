@extends('layout.app')
@section('tittle', 'Report Verif')

@section('content')
    @php
    $level = Helper::call()->level();
    $seksi = Helper::call()->AuthSeksi();
    $unit = Helper::call()->AuthUnit();
    $group = Helper::call()->Station($level, $seksi, $unit);
    @endphp
    <div class="c-body">
        <main class="c-main">
            <div class="container-fluid">
                <div class="fade-in">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card px-4 py-2">
                                <div class="card-header p-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4>Performa Periksa Verifikator</h4>
                                            <span class="text-muted">Periode {{ date_format(now(), 'F Y') }}</span>
                                        </div>
                                        <div class="col-md-6 my-auto">
                                            <div class="input-group flex-row w-auto">
                                                {!! Form::select('group', $group, null, ['class' => 'form-control', 'placeholder' => 'Group', 'id' => 'group', 'onChange' => 'updateData()']) !!}
                                                <select class="form-control" id="satuan" name="satuan"
                                                    onChange="updateData()">
                                                    <option value="performance" selected>Performance</option>
                                                    <option value="jumlahVerif">Jumlah Verifikasi</option>
                                                </select>
                                                <input class="form-control" type="text" id="dateRangeChrt"
                                                    name="dateRangeChrt">
                                                <button class="btn btn-info" type="button" id="resetFilter"
                                                    onclick="reset()">Reset</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="c-chart-wrapper min-vh-75">
                                        <canvas class="chart" id="leader-board1" name="leader-board1" height="500"
                                            style="overflow-x: scroll;" width="1200"></canvas>
                                    </div>
                                </div>
                                <div class="footer">

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
        <script src="{{ asset('js/plugins/moment.min.js') }}"></script>
        <script src="{{ asset('js/plugins/daterangepicker.js') }}"></script>
        <script src="{{ asset('js/menu/leader-board-verifikasi.js') }}"></script>
        <script src="{{ asset('js/Chart/leader-board-verifikasi.js') }}"></script>
    @endpush
@endsection
