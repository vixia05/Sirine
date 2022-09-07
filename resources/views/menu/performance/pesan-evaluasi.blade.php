@extends('layout.app')
@section('tittle', 'Info CK3&CK4')
@section('content')
<div class="c-body">
  <main class="c-main">
    <div class="container-fluid">
      <div class="fade-in">
        <div class="card">
          <div class="card-header">
            <h2 style="text-align: center">Informasi Retur K3 Terbaru</h2>
          </div>
          <div class="card-body">
            <form method="post" action="{{route ('evaluasi.store')}}" id="formPesan">
              @csrf
              <div class="form-group row">
                <div class="col-md-3">
                  {!! Form::selectMonth('month',null,['class' => 'form-control btn-primary','placeholder'=>'-- Bulan --','name'=>'bulanRetur', 'id' => 'bulanRetur']) !!}
                </div>
                <div style="float: right">
                  <button class="btn btn-block btn-warning">
                    <i class="cil-image1"></i>
                    Foto Barang Retur
                  </button>
                </div>
              </div>
                <h4>Status Retur Bulan Ini</h4>
              <div class="form-group row">
                <textarea class="form-control" id="jumlahRetur" name="jumlahRetur" rows="3" disabled>Silahkan Pilih Bulan Untuk Melihat data</textarea>
              </div>
              <h4>Pesan Kepala Seksi</h4>  
              <div class="form-group row">
                <textarea class="form-control" id="pesanKasek" rows="3" disabled></textarea>
              </div>
              <h4>Pesan Kepala Unit</h4>  
              <div class="form-group row">
                <textarea class="form-control" id="pesanKaun" rows="3" disabled></textarea>
              </div>
              <h4>Tanggapan Saya</h4>  
              <div class="form-group row">
                <textarea class="form-control" id="respon" rows="3" name="respon">-</textarea>
              </div>
              <button type="submit" class="btn btn-primary btn-round" style="float: right">
                <i class="cil-input"></i> | Tulis Tanggapan
              </button>  
            </form>
          </div>
        </div>
      </div>
    </div>
  </main>
</div>
@endsection
@section('scriptchrt')
@push('js')
  <script>


    $(document).ready(function() {

      $("#bulanRetur").change(function(){

        var bulanReturVal = $('#bulanRetur').val();
        
        $.ajax ({
          url:"\info-retur",
          type :"Get",
          datatype : "json",
          data:{ bulanRetur:bulanReturVal,},
          success:function(data){
            if(data.sumRetur == 0) {
              $('#jumlahRetur').text("Pada Pengecekan CK3 Bulan ini kamu Tidak Memiliki Kelolosan");
              $('#pesanKasek').text("Berdasarkan Hasil CK3 Bea Cukai terbaru anda tidak mengalami kelolosan. Terimakasih telah bekerja dengan sangat baik, pertahankan ketelitian dan produktifitas kinerja anda. Tetap Semangat!");
              $('#pesanKaun').text("Berdasarkan Hasil CK3 Bea Cukai terbaru anda tidak mengalami kelolosan. Terimakasih telah bekerja dengan sangat baik, pertahankan ketelitian dan produktifitas kinerja anda. Tetap Semangat!");
              $('#respon').text("");
          }
          else {
              $('#jumlahRetur').text("Pada Hasil Pengecekan CK3 Pada Bulan Kamu memiliki Retur Sebanyak "+data.sumRetur+" Lembar");
                $('#pesanKasek').text(data.pesanKasek);
                $('#pesanKaun').text(data.pesanKaun);
                $('#respon').text(data.responPegawai);
          }
        },
          });
      });
    });

      
  </script>
@endpush
@endsection
