@extends('layout.app')
@section('tittle', 'Dashboard')
@section('content')
    <div class="c-body">
        <main class="c-main">
            <div class="container-fluid">
                <div class="fade-in">
                    {{-- Row 1 --}}
                    <div class="row">
                        {{-- 1.0 Order Pcht --}}
                        <div class="col-6 col-lg-3">
                            <div class="card rounded" style="border-radius: 24px">
                                <div class="card-header bg-info text-white">
                                    <h5>Order Pcht</h5>
                                </div>
                                <div class="card-body">
                                    <h2 style="text-align: right">{{ number_format($pcht['rencet'], 0) }} Lk</h2>
                                </div>
                            </div>
                        </div>
                        {{-- 2.0 Order MMEA --}}
                        <div class="col-6 col-lg-3">
                            <div class="card rounded" style="border-radius: 24px">
                                <div class="card-header bg-info text-white">
                                    <h5>Order MMEA</h5>
                                </div>
                                <div class="card-body">
                                    <h2 style="text-align: right">{{ number_format($mmea['rencet'], 0) }} Lk</h2>
                                </div>
                            </div>
                        </div>
                        {{-- 3.0 Sisa Order Pcht --}}
                        <div class="col-6 col-lg-3">
                            <div class="card rounded" style="border-radius: 24px">
                                <div class="card-header bg-info text-white">
                                    <h5>Sisa Order Pcht</h5>
                                </div>
                                <div class="card-body">
                                    <h2 style="text-align: right">{{ number_format($pcht['sisa'], 0) }} Lk</h2>
                                </div>
                            </div>
                        </div>
                        {{-- 4.0 Order Pcht --}}
                        <div class="col-6 col-lg-3">
                            <div class="card rounded" style="border-radius: 24px">
                                <div class="card-header bg-info text-white">
                                    <h5>Sisa Order MMEA</h5>
                                </div>
                                <div class="card-body">
                                    <h2 style="text-align: right">{{ number_format($mmea['sisa'], 0) }} Lk</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Row 2 --}}
                    <div class="row">
                        <div class="col-12 col-lg-3">
                            <div class="row" style="height: 100%">
                                <div class="col-12">
                                    <div class="card rounded" style="border-radius: 24px; height: 90%">
                                        <div class="card-header bg-warning">
                                            <h5>Inschiet PCHT</h5>
                                        </div>
                                        <div class="card-body d-flex justify-content-end align-items-center">
                                            <h2>
                                                {{ number_format($pcht['inschiet'], 2) }} %</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="card rounded" style="border-radius: 24px; height: 90%">
                                        <div class="card-header bg-warning">
                                            <h5>Inschiet MMEA</h5>
                                        </div>
                                        <div class="card-body d-flex justify-content-end align-items-center">
                                            <h2 style="text-align: right">{{ number_format($mmea['inschiet'], 2) }} %</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-9">
                            <div class="card rounded" style="height: 95%;">
                                <div class="card-header bg-success text-white">
                                    <h5 style="text-align: center">Verifikasi PCHT</h5>
                                </div>
                                <div class="card-body">
                                    <div>
                                        <canvas class="chart" id="verifPcht" height="300px"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Row 3 --}}
                    <div class="row">
                        <div class="col-12 col-lg-9">
                            <div class="card rounded" style="height: 95%;">
                                <div class="card-header bg-success text-white">
                                    <h5 style="text-align: center">Verifikasi MMEA</h5>
                                </div>
                                <div class="card-body">
                                    <div>
                                        <canvas class="chart" id="verifMmea" height="300px"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-3">
                            <div class="row" style="height: 100%">
                                <div class="col-12">
                                    <div class="card rounded" style="border-radius: 24px; height: 90%">
                                        <div class="card-header bg-warning">
                                            <h5>Retur PCHT</h5>
                                        </div>
                                        <div class="card-body d-flex justify-content-end align-items-center">
                                            <h2 style="text-align: right">0 Lk</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="card rounded" style="border-radius: 24px; height: 90%">
                                        <div class="card-header bg-warning">
                                            <h5>Retur MMEA</h5>
                                        </div>
                                        <div class="card-body d-flex justify-content-end align-items-center">
                                            <h2 style="text-align: right">0 Lk</h2>
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

@section('scriptchrt')
    @push('js')
        <script src="{{ asset('js/Chart/dashboard.js') }}"></script>
    @endpush
@endsection
