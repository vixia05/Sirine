@extends('layout.app')
@section('brand', 'Edit User')
@section('tittle', 'Edit User')

@section('content')
<div class="c-body">
  <main  class="c-main">
    <div class="container-fluid">
      <div class="fade-in">
       <div class="row">
        <div class="card col-md-6" style="margin-left: 10px; margin-right: 10px;">
          <div class="card-header">
            <h5 class="title" style="text-align: center">Data Kelolosan {{ $defect->nama_user }}</h5>
          </div>
          <div class="card-body">
            <form method="post" action="{{route('manage-user.update',[$defect->id])}}" autocomplete="off" enctype="multipart/form-data">
              @csrf
              @method('put')
              <div class="row">
                  <input type="hidden" name="varue" value="{{ $defect->id }}">
              </div>
                <div class="row">
                    <div class="col-md-6 pr-1">
                        <div class="form-group">
                            <label>{{__(" Nama")}}</label>
                                <input type="text" name="nama" class="form-control" value="{{$defect->nama_user}}" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 pr-1">
                        <div class="form-group">
                            <label>{{__(" NP")}}</label>
                                <input type="text" name="np" class="form-control" value="{{$defect->np_user}}" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 pr-1">
                        <div class="form-group">
                            <label>{{__(" Unit")}}</label>
                            <select class="form-control" name="unit">
                                <option value="Verifikasi Pita Cukai">Verifikasi Pita Cukai</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 pr-1">
                        <div class="form-group">
                            <label>{{__(" E-mail")}}</label>
                                <input type="text" name="email" class="form-control" value="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 pr-1">
                        <div class="form-group">
                            <label>{{__(" Alamat")}}</label>
                                <textarea name="alamat" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 pr-1">
                        <div class="form-group">
                            <label>{{__(" No.Hp / WA")}}</label>
                                <input type="text" name="contact" class="form-control" value="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 pr-1">
                        <div class="form-group">
                            <label>{{__(" Bagian")}}</label>
                            <select class="form-control" name="bagian">
                                <option value="Verifikasi PCHT">Verifikasi PCHT</option>
                                <option value="Verifikasi MMEA">Verifikasi MMEA</option>
                                <option value="Operator Mesin Inspeksi">Operator Mesin Inspeksi</option>
                                <option value="Kepala Unit Verifikasi Pita Cukai">Kepala Unit Verpikai</option>
                                <option value="Kepala Seksi Verifikasi Tasganu">Kepala Seksi Verifikasi</option>
                                <option value="Assisten Kepala Meja">Asisstan Kepala Meja</option>
                                <option value="Kepala Meja">Kepala Meja</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 pr-1">
                        <div class="form-group">
                            <label>{{__(" Tanggal Lahir")}}</label>
                                <input type="date" name="tgl_lahir" class="form-control" value="">
                        </div>
                    </div>
                </div>
                </div>
                <div class="row">
                    <div class="col-md-12 pr-1">
                        <div class="form-group" style="float: right; margin-right: 10%">
                            <button type="submit" class="btn btn-primary btn-round">{{__('Simpan')}}</button>
                        </div>
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
