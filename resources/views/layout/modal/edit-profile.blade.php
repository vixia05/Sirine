<div class="modal fade" id="biodata-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-info" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Ubah Biodata</h4>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{route('Profile.update',[$profile->id])}}" autocomplete="off" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="row">
        </div>
          <div class="row">
              <div class="col-md-11 pr-1">
                  <div class="form-group">
                      <label>{{__(" Nama")}}</label>
                          <input type="text" name="nama" class="form-control" value="{{$profile->nama}}" disabled>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-md-11 pr-1">
                  <div class="form-group">
                      <label>{{__(" E-mail")}}</label>
                          <input type="text" name="email" class="form-control" value="{{$profile->email}}">
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-md-11 pr-1">
                  <div class="form-group">
                      <label>{{__(" Alamat")}}</label>
                          <input type="text" name="alamat" class="form-control" value="{{$profile->alamat}}">
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-md-11 pr-1">
                  <div class="form-group">
                      <label>{{__(" No.Hp / WA")}}</label>
                          <input type="text" name="contact" class="form-control" value="{{$profile->contact}}">
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-md-10 pr-1">
                  <div class="form-group">
                      <label>{{__(" Ganti Foto")}}</label>
                        <input type="file" name="foto" class="btn btn-primary">
                  </div>
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
        <button class="btn btn-info" type="submit">Simpan Perubahan</button>
      </div>
    </div>
    <!-- /.modal-content-->
  </div>
  </form>
  <!-- /.modal-dialog-->
</div>
