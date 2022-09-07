@extends('layout.app')
@section('tittle', 'Biodata Pegawai')
@section('content')
<div class="c-body">
  <main class="c-main">
    <div class="container-fluid">
      <div class="fade-in">
        <div class="card">
          <div class="card-header">
            <h3 style="text-align: center">Biodata Pegawai Unit Verifikasi Pita Cukai</h3>
          </div>
          <div class="card-body" style="overflow: auto"  >
            <div class="row">
              <div class="col-md-12 col-sm-" style="margin-bottom: 10px">
                <a class="btn btn-primary text-white pull-right" href="{{route('manage-user.create')}}" style="float: right">Tambah User</a>
              </div>
            </div>
            {{-- Session Untuk Alert Hapus User --}}
            @if(\Session::has('pesan'))
                <div class="row">
                  <div class="col-md-12">
                    <div class="alert alert-success" style="text-align: center" role="alert">Data User Berhasil Di Ubah</div>
                  </div>
                </div>
            @endif
            @if(\Session::has('notif'))
                <div class="row">
                  <div class="col-md-12">
                    <div class="alert alert-success" style="text-align: center" role="alert">User Berhasil Di Hapus</div>
                  </div>
                </div>
            @endif
            {{-- End Session Untuk Alert Hapus User --}}
            <div class="row" style="margin-top: 20px" id="table-user">
              <div class="col-md-12 sm-12 lg-12">
                <table class="table table-align-middle table-bordered table-striped" id="data-user" name="data-user" style="width: 100%">
                  <thead>
                    <tr>
                      <th> No </th>
                      <th> Nama </th>
                      <th> Np </th>
                      <th> Seksi </th>
                      <th> Unit </th>
                      <th> E-mail </th>
                      <th> No.Hp/WA </th>
                      <th> Alamat </th>
                      <th> Tanggal Lahir </th>
                      <th> Aksi </th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
            @include('layout.modal.edit-user')
          </div>
          <div class="card-footer">
          </div>
        </div>
      </div>
    </div>
  </main>
</div>

@endsection

@section('script-js')
<script src="{{ asset('assets') }}/js/plugins/jquery-3.5.1.js"></script>
<script src="{{ asset('js') }}/tooltips.js"></script>
@push('js')
<script type="text/javascript">
  $(document).ready(function(){

    $.ajaxSetup({
                headers: {
                          'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                         }
    });

    load_data();

    //** Load Data Table **//
    function load_data()
      {
        $('#data-user').DataTable({
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
                  url : "{{ route('manage-user.index') }}"
                },

          columns : [
                      {data : 'DT_RowIndex', name : 'DT_RowIndex',searchabhle:false},
                      {data : 'nama', name : 'nama',},
                      {data : 'np_user', name : 'np_user',},
                      {data : 'seksi', name : 'seksi',},
                      {data : 'unit', name : 'unit',},
                      {data : 'email', name : 'email',},
                      {data : 'contact', name : 'contact',},
                      {data : 'alamat', name : 'alamat',},
                      {data : 'tgl_lahir', name : 'tgl_lahir',},
                      {data : 'aksi', name : 'aksi',orderable:false, printable:false, exportable:false,},
                    ]
        });
      }
  });

  //** CRUD ---Edit Section--- **//
  function edit(id)
    {
      $.ajax({
              url: "manage-user-edit",
              type: "POST",
              datatype: "Json",
              data: {id:id},
              success:function(res){
                $('#editUser').html("Edit Data User");
                $('#edit_id').val(res.id);
                $('#edit_np').val(res.np_user);
                $('#edit_nama').val(res.nama);
                $('#edit_unit').val(res.id_unit);
                $('#edit_seksi').val(res.id_seksi);
                $('#edit_station').val(res.id_station);
                $('#edit_email').val(res.email);
                $('#edit_tgl_lahir').val(res.tgl_lahir);
                $('#edit_kontak').val(res.contact);
                $('#edit_alamat').val(res.alamat);
              },
            });
    }

  //** CRUD ---Delete Section--- **//

</script>


{{-- Session Untuk Ubah dan Tambah User --}}
@if(\Session::has('pesan'))
  @include('layout.modal.user-success')
    <script>
      $(function() {
          $('#success-modal').modal('show');
      });
      </script>
  @elseif (\Session::has('tambah-user'))
  @include('layout.modal.user-success')
    <script>
      $(function() {
          $('#tambah-modal').modal('show');
      });
      </script>
@endif
{{-- End Session Untuk Ubah dan Tambah User --}}
@endpush
<script src="{{ asset('js') }}/DataTables/datatables.min.js"></script>
@endsection
