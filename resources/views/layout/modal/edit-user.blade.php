{{-- Modal Edit Untuk Manage User --}}
<div class="modal fade" id="editUser-modal" name="editUser-modal" aria-hidden="true">
    <div class="modal-dialog modal-success modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="editUser">Edit User</h4>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body">
          <form action="{{route('manage-user.update')}}" id="editUser-form" method="Post" name="editUser-form" class="form-horizontal" enctype="multipart/form-data">
           <div class="form-group row">
             @method('put')
             @csrf
              <input type="hidden" name="edit_id" id="edit_id">
              <div class="col-md-4">
                <div class="input-group">
                  <span class="input-group-prepend">
                    <button class="btn btn-info" type="button" style="width: 100px" >
                      NP :
                    </button>
                  </span>
                  <input class="form-control" id="edit_np" type="text" name="edit_np" >
                </div>
              </div>
              <div class="col-md-8">
                <div class="input-group">
                  <span class="input-group-prepend">
                    <button class="btn btn-info" type="button" style="width: 100px" disabled >
                      Nama :
                    </button>
                  </span>
                  <input class="form-control" id="edit_nama" type="text" name="edit_nama" >
                </div>
              </div>
            </div>
            {{-- Edit Seksi --}}
            <div class="form-group row">
              <div class="col-md-12">
                <div class="input-group">
                  <span class="input-group-prepend" >
                    <button class="btn btn-info" type="button" style="width: 100px" disabled>
                      Seksi :
                    </button>
                  </span>
                  {!! Form::select('edit_seksi',$seksi,null,['class'=>'form-control text-center','id'=>'edit_seksi','required']) !!}
                </div>
              </div>
            </div>
            {{-- Edit Unit --}}
            <div class="form-group row">
              <div class="col-md-12">
                <div class="input-group">
                  <span class="input-group-prepend" >
                    <button class="btn btn-info" type="button" style="width: 100px" disabled>
                      Unit :
                    </button>
                  </span>
                  {!! Form::select('edit_unit',$unit,null,['class'=>'form-control text-center','id'=>'edit_unit','required']) !!}
                </div>
              </div>
            </div>
            {{-- Edit Station --}}
            <div class="form-group row">
              <div class="col-md-12">
                <div class="input-group">
                  <span class="input-group-prepend" >
                    <button class="btn btn-info" type="button" style="width: 100px" disabled>
                      Station :
                    </button>
                  </span>
                  {!! Form::select('edit_station',$station,null,['class'=>'form-control text-center','id'=>'edit_station','required']) !!}
                </div>
              </div>
            </div>
            {{-- Edit E-Mail --}}
            <div class="form-group row">
              <div class="col-md-12">
                <div class="input-group">
                  <span class="input-group-prepend">
                    <button class="btn btn-info" type="button" disabled style="width: 100px">
                      E-mail :
                    </button>
                  </span>
                  <input class="form-control" id="edit_email" type="text" name="edit_email" >
                </div>
              </div>
            </div>
            {{-- Edit E-Mail --}}
            <div class="form-group row">
              <div class="col-md-12">
                <div class="input-group">
                  <span class="input-group-prepend">
                    <button class="btn btn-info" type="button" disabled style="width: 100px">
                      Tgl Lahir :
                    </button>
                  </span>
                  <input type="date" id="edit_tgl_lahir" name="edit_tgl_lahir" class="form-control">
                </div>
              </div>
            </div>
            {{-- Edit Contact --}}
            <div class="form-group row">
              <div class="col-md-12">
                <div class="input-group">
                  <span class="input-group-prepend">
                    <button class="btn btn-info" type="button" disabled style="width: 100px">
                      No.HP / WA :
                    </button>
                  </span>
                  <input class="form-control" id="edit_kontak" type="text" name="edit_kontak" >
                </div>
              </div>
            </div>
            {{-- Edit Alamat --}}
            <div class="form-group row">
              <div class="col-md-12">
                <div class="input-group">
                  <span class="input-group-prepend">
                    <button class="btn btn-info" type="button" disabled style="width: 100px">
                      Alamat :
                    </button>
                  </span>
                  <textarea name="edit_alamat" rows="5" id="edit_alamat" class="form-control"> </textarea>
                </div>
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
          <button class="btn btn-info" type="submit">Simpan</button>
        </div>
      </div>
      
    </form>
      <!-- /.modal-content-->
    </div>
    <!-- /.modal-dialog-->
  </div>
{{-- End Modal Edit Untuk Manage User --}}