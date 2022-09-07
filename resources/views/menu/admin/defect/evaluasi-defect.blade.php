@extends('layout.app')
@section('tittle', 'Pesan Evaluasi')
@section('content')
<div class="c-body">
  <main class="c-main">
    <div class="container-fluid">
      <div class="fade-in">
        <div class="card">
          <div class="card-header bg-dark">
            <h4 class="card-title text-center text-white">Pesan Evaluasi Pegawai</h4>
          </div>
          <div class="card-body">
            <form>
              <div class="form-inline">
                <div class="col-md-4">
                  <div class="form-group row">
                    <div class="input-group">
                      <span class="input-group-prepend">
                        <button class="btn btn-success" type="button">
                          <i class="cil-magnifying-glass"></i> Filter
                        </button>
                      </span>
                      <input class="form-control" id="cari_nama" type="text" name="cari_nama" placeholder="NP/Nama">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="input-group">
                      <input class="form-control" id="tglVerif" oninput="pilihTgl()" type="date">
                      <span class="input-group-prepend">
                        <button class="btn btn-success" type="button">Pilih Tanggal
                        </button>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="col-md-2 col-sm-3">
                    <div class="form-group"  style="float: right">
                      <span class="input-group-prepend">
                        <a href="{{ url('formEva') }}"><button class="btn btn-success">Tambah Pesan</button></a>
                      </span>
                    </div>
                </div>
              </div>
              <div class="row mt-4 px-3">
                <table class="table table-striped border-secondary">
                  <thead>
                    <tr class="text-center bold">
                      <th>No</th>
                      <th>NP Pegawai</th>
                      <th>NP Kepala Seksi</th>
                      <th>NP Kepala Unit</th>
                      <th>Evaluasi Kepala Seksi</th>
                      <th>Evaluasi Unit</th>
                      <th>Tanggapan Pegawai</th>
                      <th>Tanggal Evaluasi</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                      <tr>
                        <td class="text-center">1</td>
                        <td class="text-center">I444</td>
                        <td class="text-center">7206</td>
                        <td class="text-center">7426</td>
                        <td class="text-truncate" style="max-width: 15rem">Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia quia, quo molestias asperiores repudiandae odit.</td>
                        <td class="text-truncate" style="max-width: 15rem">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Necessitatibus sapiente, cumque obcaecati aliquid veritatis impedit!</td>
                        <td class="text-truncate" style="max-width: 15rem">Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident nihil facilis maiores. Aliquam, fugiat vero.</td>
                        <td class="text-center">20-Juni-2022</td>
                        <td><span class="badge me-1 rounded-pill bg-success text-white px-2 py-1">Responded</span></td>
                        <td>
                          <button type="button" rel="tooltip" class="btn btn-danger btn-sm btn-icon">
                            <i class="icon icon-2xl mt-5 mb-2 cil-trash"></i>
                          </button>
                          <button type="button" rel="tooltip" class="btn btn-success btn-sm btn-icon">
                            <i class="icon icon-2xl mt-5 mb-2 cil-pencil"></i>
                          </button>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-center">1</td>
                        <td class="text-center">I444</td>
                        <td class="text-center">7206</td>
                        <td class="text-center">7426</td>
                        <td class="text-truncate" style="max-width: 15rem">Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia quia, quo molestias asperiores repudiandae odit.</td>
                        <td class="text-truncate" style="max-width: 15rem">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Necessitatibus sapiente, cumque obcaecati aliquid veritatis impedit!</td>
                        <td class="text-truncate" style="max-width: 15rem">-</td>
                        <td class="text-center">-</td>
                        <td><span class="badge me-1 rounded-pill bg-warning px-2 py-1">Not Read</span></td>
                        <td>
                          <button type="button" rel="tooltip" class="btn btn-danger btn-sm btn-icon">
                            <i class="icon icon-2xl mt-5 mb-2 cil-trash"></i>
                          </button>
                          <button type="button" rel="tooltip" class="btn btn-success btn-sm btn-icon">
                            <i class="icon icon-2xl mt-5 mb-2 cil-pencil"></i>
                          </button>
                        </td>
                      </tr>
                  </tbody>
                </table>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </main>
</div>
@endsection
