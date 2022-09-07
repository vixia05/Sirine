@extends('layout.app')
@section('tittle', 'Input Data Verifikasi Harian')
@section('content')
    <div class="c-body">
        <main class="c-main">
            <div class="container-fluid">
                <div class="fade-in">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" style="text-align: center">Input Pendapatan Harian Pita Cukai</h4>
                        </div>
                        <div class="card-body" style="overflow-x: auto">
                            <form method="post" action="{{ route('input-verifikasi.store') }}">
                                @csrf
                                <div class="row form-inline">
                                    <div class="col-md-4 col-sm-4">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-prepend">
                                                    <button class="btn btn-success" type="button">
                                                        <i class="cil-magnifying-glass"></i> Workstation
                                                    </button>
                                                </span>
                                                {!! Form::select('workstation', $station, $station_user, ['class' => 'form-control', 'id' => 'workstation']) !!}
                                            </div>
                                            <div class="input-group mt-2">
                                                <span class="input-group-prepend">
                                                    <button class="btn btn-success" type="button">
                                                        <i class="cil-magnifying-glass"></i> Jenis Periksa
                                                    </button>
                                                </span>
                                                {!! Form::select('jenis_verif', ['PCHT' => 'PCHT', 'MMEA' => 'MMEA'], '', [
                                                    'class' => 'form-control',
                                                    'id' => 'jenis_verif',
                                                ]) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <div class="form-group">
                                            <div class="input-group">
                                                {!! Form::date('pilih_tgl', now(), [
                                                    'class' => 'form-control',
                                                    'id' => 'pilih_tgl',
                                                    'required',
                                                ]) !!}
                                                <span class="input-group-prepend">
                                                    <button class="btn btn-success" type="button">Pilih Tanggal
                                                    </button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <button class="btn btn-primary float-sm-right float-md-right"
                                            type="submit">Simpan</button>
                                    </div>
                                </div>
                                @if (\Session::has('notif'))
                                    <div class="row" style="margin-top: 10px">
                                        <div class="col-md-12">
                                            <div class="alert alert-success" style="text-align: center" role="alert">Data
                                                Verifikasi Berhasil Di Simpan</div>
                                        </div>
                                    </div>
                                @endif
                                <div class="row" style="margin-top: 10px">
                                    <div class="col-md-12">
                                        <table class="table-align-middle table-bordered table-striped table"
                                            id="input-verifikasi" style="width: 100%">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>No</th>
                                                    <th>NP</th>
                                                    <th>Nama</th>
                                                    <th>Workstation</th>
                                                    <th>Verifikasi (Lembar)</th>
                                                    <th>Jumlah OBC</th>
                                                    <th>Lembur</th>
                                                    <th>Keterangan</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
@section('script-js')

    @if (\Session::has('pesan'))
        @include('layout.modal.hvh-success')
        <script>
            $(function() {
                $('#success-modal').modal('show');
            });
        </script>
    @endif
@endsection
@section('script-js')
    <script src="{{ asset('assets') }}/js/plugins/jquery-3.5.1.js"></script>
    <script src="{{ asset('js') }}/tooltips.js"></script>
@endsection
@push('js')
    <script type="text/javascript">
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            load_form_rim();

            function load_form_rim() {
                var workstationVal = $('#workstation').val();

                $('#input-verifikasi').DataTable({

                    processing: true,
                    serverside: true,
                    paging: false,

                    ajax: {
                        url: "form-rim",
                        data: {
                            workstation: workstationVal
                        },
                    },

                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            searchable: false
                        },
                        {
                            data: 'np_user',
                            name: 'np_user'
                        },
                        {
                            data: 'nama',
                            name: 'nama'
                        },
                        {
                            data: 'workstation',
                            name: 'workstation'
                        },
                        {
                            data: 'form_lembar',
                            name: 'form_lembar',
                            searchable: false,
                            sortable: false
                        },
                        {
                            data: 'form_obc',
                            name: 'form_obc',
                            searchable: false,
                            sortable: false
                        },
                        {
                            data: 'form_lembur',
                            name: 'form_lembur',
                            searchable: false,
                            sortable: false
                        },
                        {
                            data: 'form_keterangan',
                            name: 'form_keterangan',
                            searchable: false,
                            sortable: false
                        },

                    ]

                });
            };

            $('#workstation').change(function() {
                var workstationVal = $('#workstation').val();

                $('#input-verifikasi').DataTable().destroy();
                load_form_rim(workstationVal);
            });
        });
    </script>

    <script src="{{ asset('js') }}/DataTables/datatables.min.js"></script>
@endpush
