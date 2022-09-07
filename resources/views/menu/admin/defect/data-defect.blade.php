@extends('layout.app')
@section('tittle','Data Kelolosan Pita Cukai')
@section('content')
<div class="c-body">
  <main class="c-main">
    <div class="container-fluid">
      <div class="fade-in">
        <div class="card">
          <div class="card-header">
            <h3 style="text-align: center">Data Retur Pita Cukai</h3>
          </div>
          <div class="card-body" style="overflow-x: auto">
            <div class="row">
              <div class="col-md-12">
                <a class="btn btn-primary text-white pull-right float-right" href="{{url('input-defect')}}">Tambah Data</a>
              </div>
            </div>
            {{-- Session Untuk Alert Hapus Kelolosan --}}
            @if(\Session::has('notif'))
                <div class="row">
                  <div class="col-md-12">
                    <div class="alert alert-success" style="text-align: center" role="alert">Data Kelolosan Berhasil Di Hapus</div>
                  </div>
                </div>
            @endif
            {{-- End Session Untuk Alert Hapus Kelolosan --}}
            <div class="row" style="margin-top: 20px">
              <div class="col-md-12">
                <table class="table table-responsive-sm table-bordered table-striped table-sm text-center" style="width: 100%" id="defect-table" name="defect-table">
                  <thead>
                    <tr>
                      <th> No </th>
                      <th> Nama </th>
                      <th> Np </th>
                      <th> Periode CK3 </th>
                      <th> Total Retur </th>
                      <th> Jenis Retur </th>
                      <th> Aksi </th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
            {{-- Modal Edit Defect --}}
            @include('layout.modal.edit-defect')
            {{-- Modal Detail Defect --}}
            @include('layout.modal.detail-defect')
          </div>
        </div>
      </div>
    </div>
  </main>
</div>
@endsection
@section('script-js')
  <script src="{{ asset('assets/js/plugins/jquery-3.5.1.js') }}"></script>
    @push('js')
      <script>
        $(document).ready(function() {
          $.ajaxSetup({
                headers: {
                          'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                         }
          });
          
          //Load Data Table
          load_table();

          function load_table()
            {
              $('#defect-table').DataTable(
                {
                  processing : true,
                  serverside : true,
                  dom : 'lBfrtip',

                  buttons : [
                              { 
                                extend: 'copy',
                                footer: true,
                                exportOptions: {
                                  columns: [0,1,2,3,4,5]
                                }
                              },
                              {
                                extend: 'csv',
                                footer: true,
                                exportOptions: {
                                  columns: [0,1,2,3,4,5]
                                }
                              },
                              {
                                extend: 'excel',
                                footer: true,
                                exportOptions: {
                                  columns: [0,1,2,3,4,5]
                                }
                              },
                              {
                                extend: 'pdf',
                                footer: true,
                                exportOptions: {
                                  columns: [0,1,2,3,4,5]
                                }
                              },
                              {
                                extend: 'print',
                                footer: true,
                                exportOptions: {
                                  columns: [0,1,2,3,4,5]
                                }
                              }
                            ],
                  ajax : {
                          url : "{{ route('defect.index') }}",
                         },

                  columns : [
                              {data:'DT_RowIndex' , name:'DT_RowIndex', searchable:false },
                              {data:'np_user' , name:'np_user' },
                              {data:'nama_user' , name:'nama_user' },
                              {data:'tgl_cek' , name:'tgl_cek' },
                              {data:'total_retur' , name:'total_retur' },
                              {data:'jenis_defect' , name:'jenis_defect' },
                              {data:'aksi' , name:'aksi' },
                            ]
                });
            }
        });
      </script>
      <script src="{{ asset('js/DataTables/datatables.min.js') }}"></script>
    @endpush
@endsection