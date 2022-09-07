<div class="modal fade" id="success-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-success" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Data Hasil Verifikasi Harian</h4>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body">
          @csrf
          @method('delete')
           <div class="row">
             <div class="col-md-11 pr-1" style="margin-top: 20px; margin-bottom: 20px">
               <H4>Data Verifikasi Berhasil Di Simpan</H4>
             </div>
           </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
        </div>
      </div>
      <!-- /.modal-content-->
    </div>
    <!-- /.modal-dialog-->
  </div>