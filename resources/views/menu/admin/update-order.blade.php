@extends('layout.app')
@section('brand', 'Biodata Saya')
@section('tittle', 'Biodata Saya')
@section('content')
<div class="c-body">
  <main  class="c-main">
    <div class="container-fluid">
      <div class="fade-in">
          <div class="row">
              <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center">Update Order Pita Cukai</h4>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-info btn-block" type="button" data-toggle="modal" data-target="#importExcelPcht"><h3>Upload Excel PCHT +</h3></button>
                        <button class="btn btn-warning btn-block" type="button" data-toggle="modal" data-target="#importExcelMmea"><h3>Upload Excel MMEA +</h3></button>
                    </div>
                </div>
              </div>
          </div>
          {{-- Modal Import PCHT --}}
          <div class="modal modal-info fade" id="importExcelPcht" tabindex="-1" role="dialog" aria-labelledby="PchtModalLable" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <form method="post" action="{{ route('update-data.pcht') }}" enctype="multipart/form-data">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="PchtModalLable">Import Excel</h5>
                  </div>
                  <div class="modal-body">
       
                    {{ csrf_field() }}
       
                    <label>Pilih file excel</label>
                    <div class="form-group">
                      <input type="file" name="file" required="required">
                    </div>
       
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Import</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          {{-- Modal Import MMEA --}}
          <div class="modal modal-warning fade" id="importExcelMmea" tabindex="-1" role="dialog" aria-labelledby="MmeaModalLable" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <form method="post" action="{{ route('update-data.mmea') }}" enctype="multipart/form-data">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="MmeaModalLable">Import Excel</h5>
                  </div>
                  <div class="modal-body">
       
                    {{ csrf_field() }}
       
                    <label>Pilih file excel</label>
                    <div class="form-group">
                      <input type="file" name="file" required="required">
                    </div>
       
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Import</button>
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