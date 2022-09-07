@extends('layout.app')
@section('brand', 'Biodata Saya')
@section('tittle', 'Biodata Saya')

@section('content')
<div class="c-body">
  <main  class="c-main">
    <div class="container-fluid">
      <div class="fade-in">
        <div class="card">
          <div class="card-header">
            <div>
              <a href="">
                <img style="overflow: hidden; height: 200px; margin-left:auto; margin-right:auto; display:block" src="{{ asset('assets') }}/img/{{$profile->foto}}" alt="..." >
              </a>
            </div>
            <h2 style="text-align: center">Biodata Saya</h2>
            {{-- Session Untuk Alert Tambah Data --}}
            @if(\Session::has('pesan'))
             <div class="row">
               <div class="col-md-12">
                 <div class="alert alert-success" style="text-align: center" role="alert">Data Berhasil Di Simpan</div>
               </div>
             </div>
            @endif
            {{-- End Session Untuk Alert Tambah Data --}}
          </div>
          <div class="card-body">
            <div class="form-group">
              <label>Unit Kerja</label>
              <span class="form-control" >{{$unit->unit}}</span>
            </div>
            <div class="form-group">
              <label>Nama</label>
              <span class="form-control">{{$profile->nama}}</span>
            </div>
            <div class="form-group">
              <label>NP</label>
              <span class="form-control">{{$profile->np_user}}</span>
            </div>
            <div class="form-group">
              <label>No HP/WA</label>
              <span class="form-control">{{$profile->contact}}</span>
            </div>
            <div class="form-group">
              <label>Tanggal Lahir</label>
              <span class="form-control">{{$profile->tgl_lahir}}</span>
            </div>
            <div class="form-group">
              <label>Email</label>
              <span class="form-control">{{$profile->email}}</span>
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <textarea class="form-control" rows="9" disabled>{{$profile->alamat}}</textarea>
            </div>
            <div class="form-group">
              <label>Jobdesk</label>
              <span class="form-control">{{$station->station}}</span>
            </div>
          </div>
          {{-- Button Edit --}}
          <div class="card-footer">
            <div class="row align-items-center">
              <div class="col-7 col-sm-4 col-md-2 col-xl mb-3 mb-xl-0">
                <button class="btn btn-block btn-info" type="button" data-toggle="modal" data-target="#biodata-modal">Ubah Biodata</button>
              </div>
              <div class="col-6 col-sm-4 col-md-2 col-xl mb-3 mb-xl-0">
                <button class="btn btn-block btn-warning" type="button"  data-toggle="modal" data-target="#password-modal">Ganti Password</button>
              </div>
            </div>
          </div>
          {{-- End Button Edit --}}
        </div>
      </div>
    </div>
  </main>
</div>

{{-- Modal Ubah Profile --}}
@include('layout.modal.edit-profile')

{{-- Modal Ganti Password --}}
@include('layout.modal.edit-password')
@endsection
