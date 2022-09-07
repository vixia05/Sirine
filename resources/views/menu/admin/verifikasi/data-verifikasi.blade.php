@extends('layout.app')
@section('tittle','Data Verifikasi Pita Cukai')
@section('content')
<div class="c-body">
    <main class="c-main">
        <div class="container-fluid">
            <div class="fade-in">
                <div class="card">
                    <div class="card-header">
                      <h3 style="text-align: center">Data Verifikasi Pita Cukai</h3>
                    </div>
                    <div class="card-body" style="overflow-x: auto">
                      <div class="row">
                        <div class="col-md-2">
                          {!! Form::label('np','Filter') !!}
                          {!! Form::select('np',$np_nama,null,['class'=>'form-control','placeholder'=>'---- Nama / NP ----']) !!}
                        </div>
                        <div class="col-md-3" style="margin-left: 10%">
                          <h5 style="text-align: center">Dari Tanggal</h4>
                          {!! Form::date('date',null,['class' => 'form-control','placeholder'=>'-- Dari Tanggal --','name'=>'startDate', 'id' => 'startDate']) !!}
                        </div>
                        <div class="col-md-3">
                          <h5 style="text-align: center">Sampai Tanggal</h4>
                          {!! Form::date('date',null,['class' => 'form-control','placeholder'=>'-- Sampai Tanggal --','name'=>'endDate', 'id' => 'endDate']) !!}
                        </div>
                        <div class="col-md-2">
                          <div class="form-group" style="margin-left: 10%; margin-top:10%">
                            <span class="input-group-prepend">
                              <button class="btn btn-warning" type="button" id="refresh" name="refresh">Refresh</button>
                            </span>
                          </div>
                        </div>
                      </div>
                      {{-- Session Untuk Alert Hapus User --}}
                      @if(\Session::has('notif'))
                          <div class="row" style="margin-top: 10px">
                            <div class="col-md-12">
                              <div class="alert alert-success" style="text-align: center" role="alert">Data Berhasil Di Hapus</div>
                            </div>
                          </div>
                      @endif
                      {{-- End Session Untuk Alert Hapus User --}}
                      <div class="row" style="margin-top: 20px; overflow: auto;" >
                        <div class="col-md-12">
                            <table class="table table-align-middle table-bordered table-striped" id="data-verif" name = "data-verif" style="width: 100%">
                              <thead>
                                  <th> No </th>
                                  <th> Np </th>
                                  <th> Nama </th>
                                  <th> Tgl Verif </th>
                                  <th> Jumlah Rim / Lembar </th>
                                  <th> Jumlah OBC </th>
                                  <th> Target </th>
                                  <th> Lembur </th>
                                  <th> Keterangan </th>
                                  <th> Status </th>
                                  <th> Aksi </th>
                                  {{-- <th> Status </th> --}}
                              </thead>
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
@section('scriptchrt')
<script src="{{ asset('assets') }}/js/plugins/jquery-3.5.1.js"></script>
@push('js')
<script>
  $(document).ready(function() {

    $.ajaxSetup({
                headers: {
                          'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                         }
    });

    load_data();

    // Load Data Table
    function load_data(startDate = '', endDate = '')
      {
        var npVal = $('#np').val();

        $('#data-verif').DataTable(
          {
            processing : true,
            serverside : true,
            dom: 'lBfrtip',
            
            buttons: [
                      { 
                        extend: 'copy',
                        footer: true,
                        exportOptions: {
                          columns: [0,1,2,3,4,5,6,7,8]
                        }
                      },
                      {
                        extend: 'csv',
                        footer: true,
                        exportOptions: {
                          columns: [0,1,2,3,4,5,6,7,8]
                        }
                      },
                      {
                        extend: 'excel',
                        footer: true,
                        exportOptions: {
                          columns: [0,1,2,3,4,5,6,7,8]
                        }
                      },
                      {
                        extend: 'pdf',
                        footer: true,
                        exportOptions: {
                          columns: [0,1,2,3,4,5,6,7,8]
                        }
                      },
                      {
                        extend: 'print',
                        footer: true,
                        exportOptions: {
                          columns: [0,1,2,3,4,5,6,7,8]
                        }
                      }
                     ],
            
            ajax: {
                    url : 'dataTable-Verif',
                    data: {startDate:startDate, endDate:endDate, np:npVal}
                  },
                
            columns : [
                        {data : 'DT_RowIndex', name : 'DT_RowIndex',searchable:false},      
                        {data : 'np_user', name : 'np_user'},      
                        {data : 'nama_user', name : 'nama_user'},      
                        {data : 'tgl_verif', name : 'tgl_verif'},      
                        {data : 'jml_verif', name : 'jml_verif'},           
                        {data : 'jml_obc', name : 'jml_obc'},               
                        {data : 'target' , name : 'target'},      
                        {data : 'lembur', name : 'lembur'},      
                        {data : 'keterangan', name : 'keterangan'},      
                        {data : 'validation', name : 'validation'},      
                        {data : 'aksi', name : 'aksi'},        
                        // {data : 'status', name : 'status'},        
                       ]
                    });
          }

    // Update Data Table if StartDate Change
    $("#startDate").change(function()
      {
        var startDateval = $('#startDate').val();
        var endDateval = $('#endDate').val();

        $('#data-verif').DataTable().destroy();
        load_data(startDateval, endDateval);
      });

    // Update Data if endDate chnage
    $("#endDate").change(function()
      {
        var startDateval = $('#startDate').val();
        var endDateval = $('#endDate').val();
        
        $('#data-verif').DataTable().destroy();
        load_data(startDateval, endDateval);
      });

    // Update Data if NP Change
    $("#np").change(function()
    {
      var npVal = $('#np').val();
      var startDateVal = $('#startDate').val();
      var endDateVal = $('#endDate').val();

      $('#data-verif').DataTable().destroy();
      load_data(startDateVal, endDateVal, npVal);

    });

    // Refresh All Selection
    $("#refresh").click(function(){
      $('#np').val('');
      $('#startDate').val('');
      $('#endDate').val('');
      $('#data-verif').DataTable().destroy();
      load_data();
    });

  });
</script>
<script src="{{ asset('js') }}/DataTables/datatables.min.js"></script>
@endpush
@endsection
