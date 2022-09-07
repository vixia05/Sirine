<div class="modal fade" id="password-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-warning" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Ganti Password</h4>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{route('user.password')}}" autocomplete="off">
        @csrf
        @method('put')
         <div class="row">
           <div class="col-md-11 pr-1">
             <div class="form-group {{ $errors->has('password') ? ' has-danger' : '' }}">
               <label>{{__(" Password Sekarang")}}</label>
               <input class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="old_password" placeholder="{{ __('Password Sekarang') }}" type="password"  required>
             </div>
           </div>
         </div>
         <div class="row">
           <div class="col-md-11 pr-1">
             <div class="form-group {{ $errors->has('password') ? ' has-danger' : '' }}">
               <label>{{__(" Password Baru")}}</label>
               <input class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password Baru') }}" type="password" name="password" required>
             </div>
           </div>
         </div>
         <div class="row">
           <div class="col-md-11 pr-1">
             <div class="form-group {{ $errors->has('password') ? ' has-danger' : '' }}">
               <label>{{__(" Konfirmasi Password Baru")}}</label>
               <input class="form-control" placeholder="{{ __('Konfirmasi Password Baru') }}" type="password" name="password_confirmation" required>
             </div>
           </div>
         </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
        <button class="btn btn-warning" type="submit">Simpan Perubahan</button>
      </div>
    </div>
    <!-- /.modal-content-->
  </div>
  <!-- /.modal-dialog-->
</form>
</div>