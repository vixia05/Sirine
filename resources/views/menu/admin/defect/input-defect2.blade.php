@extends('layout.app')
@section('tittle', 'Input Retur Pita Cukai')
@section('content')
<div class="c-body">
  <main class="c-main">
    <div class="container-fluid">
      <div class="fade-in">
        <div class="card">
          <div class="card-header card-accent-info">
            <h3 style="text-align: center">Input Retur Pita Cukai</h3>
          </div>
          <div class="card-body" style="overflow-x: auto">
            <form method="post" action="{{ route('input-defect.store') }}">
              @csrf
            <div class="row">
              <div class="col-md-1">
                <div class="form-group">
                  <input type="number" class="form-control" min="1" max="200" value="1" id="numRows">
                  @csrf
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <button type="button" class="btn btn-success" id="addRows" >Tambah Baris</button>
                  @csrf
                </div>
              </div>
              <div class="col-sm-2 ">
                <div class="form-group">
                  <select class="form-control" id="namaBaris">
                    <option value="">NP / Nama</option>
                      @foreach ($profile as $nama)
                        <option value="{{$nama->np_user}}">{{$nama->np_user}} | {{$nama->nama}}</option>
                      @endforeach
                  </select>
						    </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <input type="date" class="form-control" id="tglBaris">
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <button type="button" class="btn btn-success" id="addRowsNama" >Tambah Baris</button>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group" style="margin-left: 10px">
                  <button type="button" rel="tooltip" class="btn btn-info" style="float:right">Foto</button>&nbsp;
                  <button type="submit" class="btn btn-primary" style="float:right; margin-right: 10px" >Simpan</button>
                </div>
              </div>
            </div>
            {{-- Session Untuk Alert Tambah Data --}}
          @if(\Session::has('notif'))
           <div class="row">
             <div class="col-md-12">
               <div class="alert alert-success" style="text-align: center" role="alert">Data Berhasil Di Simpan</div>
             </div>
           </div>
          @endif
          {{-- End Session Untuk Alert Tambah Data --}}
            <div class="row" style="margin-top: 20px">
              <table class="table table-responsive-sm table-bordered table-striped table-sm">
                <thead>
                  <tr class="text-center">
                      <th>NP/Nama</th>
                      <th>Tgl CK3</th>
                      <th>Hologram (Missing)</th>
                      <th>Hologram (Scratch)</th>
                      <th>Hologram (Miss Register)</th>
                      <th>Printing (Blur Print Text)</th>
                      <th>Printing (Blur Print Image)</th>
                      <th>Printing (Ink Smear)</th>
                      <th>Printing (Spotted)</th>
                      <th>Printing (Under Inking)</th>
                      <th>Printing (Over Inking)</th>
                      <th>Color (Gambar Tipis)</th>
                      <th>Color (Gambar Tebal)</th>
                      <th>Color (Teks Tipis)</th>
                      <th>Color (Teks Tebal)</th>
                      <th>Color (Non Uniform)</th>
                      <th>Color (Incorrect)</th>
                      <th>Cutting (Miss Cutting)</th>
                      <th>Appearance (Tear)</th>
                      <th>Appearance (Folded)</th>
                      <th>Appearance (Plooi)</th>
                      <th>Appearance (Hole)</th>
                      <th>Mixed Product (Tercampur)</th>
                      <th class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr id="tableRow">
                    <td>
                        <select class="form-control" placeholder="NP/Nama" name="np[]" >
                          <option value="">NP / Nama</option>
                          @foreach ($profile as $nama)
                              <option value="{{$nama->np_user}}">{{$nama->np_user}} | {{$nama->nama}}</option>
                          @endforeach
                        </select>
                    </td>
                    <td><input type="date" class="form-control" name="tglK3[]"></td>
                    <td><input type="number" class="form-control" value="0" name="holoMiss[]" id="holoMiss"></td>
                    <td><input type="number" class="form-control" value="0" name="holoScratch[]" id="holoScratch"></td>
                    <td><input type="number" class="form-control" value="0" name="holoMissRegister[]"></td>
                    <td><input type="number" class="form-control" value="0" name="blurText[]"></td>
                    <td><input type="number" class="form-control" value="0" name="blurImage[]"></td>
                    <td><input type="number" class="form-control" value="0" name="inkSmear[]"></td>
                    <td><input type="number" class="form-control" value="0" name="spotted[]"></td>
                    <td><input type="number" class="form-control" value="0" name="underInk[]"></td>
                    <td><input type="number" class="form-control" value="0" name="overInk[]"></td>
                    <td><input type="number" class="form-control" value="0" name="gambarTipis[]"></td>
                    <td><input type="number" class="form-control" value="0" name="gambarTebal[]"></td>
                    <td><input type="number" class="form-control" value="0" name="textTipis[]"></td>
                    <td><input type="number" class="form-control" value="0" name="textTebal[]"></td>
                    <td><input type="number" class="form-control" value="0" name="nonUniform[]"></td>
                    <td><input type="number" class="form-control" value="0" name="Incorrect[]"></td>
                    <td><input type="number" class="form-control" value="0" name="missCutting[]"></td>
                    <td><input type="number" class="form-control" value="0" name="tear[]"></td>
                    <td><input type="number" class="form-control" value="0" name="folded[]"></td>
                    <td><input type="number" class="form-control" value="0" name="plooi[]"></td>
                    <td><input type="number" class="form-control" value="0" name="hole[]"></td>
                    <td><input type="number" class="form-control" value="0" name="tercampur[]"></td>
                    <td style="width:140px">
                      <button type='button' rel='tooltip' class='btn btn-danger btn-sm btn-icon removeRow'style='float:right; width:60px'>Hapus</button>
                    </td>
                </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer">
          </div>
        </form>
        </div>
      </div>
    </div>
  </main>
</div>
@endsection
@push('js')
<script>
    $(document).ready(function(){

      $('#maxIndexTable').val(0);

      $('#addRows').click(function(){

          var lastIndexTable = Number($('#maxIndexTable').val());
          var jumRow = Number($('#numRows').val());
          var i;

          for (i=0; i < jumRow; i++) {
            lastIndexTable = lastIndexTable + 1;
            var tr = "<tr id=\"tableRow"+lastIndexTable+"\">"+
                          "<td>"+
                              "<select class='form-control'  placeholder='NP/Nama' name='np[]'>"+
                                "<option value=''>NP / Nama</option>"+
                                "@foreach ($profile as $nama)"+
                                    "<option value='{{$nama->np_user}}'>{{$nama->np_user}} | {{$nama->nama}}</option>"+
                                "@endforeach"+
                              "</select>"+
                          "</td>"+
                          "<td><input type='date' class='form-control' name='tglK3[]'></td>"+
                          "<td><input type='number' class='form-control' value='0' name='holoMiss[]'></td>"+
                          "<td><input type='number' class='form-control' value='0' name='holoScratch[]'></td>"+
                          "<td><input type='number' class='form-control' value='0' name='holoMissRegister[]'></td>"+
                          "<td><input type='number' class='form-control' value='0' name='blurText[]'></td>"+
                          "<td><input type='number' class='form-control' value='0' name='blurImage[]'></td>"+
                          "<td><input type='number' class='form-control' value='0' name='inkSmear[]'></td>"+
                          "<td><input type='number' class='form-control' value='0' name='spotted[]'></td>"+
                          "<td><input type='number' class='form-control' value='0' name='underInk[]'></td>"+
                          "<td><input type='number' class='form-control' value='0' name='overInk[]'></td>"+
                          "<td><input type='number' class='form-control' value='0' name='gambarTipis[]'></td>"+
                          "<td><input type='number' class='form-control' value='0' name='gambarTebal[]'></td>"+
                          "<td><input type='number' class='form-control' value='0' name='textTipis[]'></td>"+
                          "<td><input type='number' class='form-control' value='0' name='textTebal[]'></td>"+
                          "<td><input type='number' class='form-control' value='0' name='nonUniform[]'></td>"+
                          "<td><input type='number' class='form-control' value='0' name='Incorrect[]'></td>"+
                          "<td><input type='number' class='form-control' value='0' name='missCutting[]'></td>"+
                          "<td><input type='number' class='form-control' value='0' name='tear[]'></td>"+
                          "<td><input type='number' class='form-control' value='0' name='folded[]'></td>"+
                          "<td><input type='number' class='form-control' value='0' name='plooi[]'></td>"+
                          "<td><input type='number' class='form-control' value='0' name='hole[]'></td>"+
                          "<td><input type='number' class='form-control' value='0' name='tercampur[]'></td>"+
                          "<td style='width:140px'>"+
                            "<button type='button' rel='tooltip' class='btn btn-danger btn-sm btn-icon removeRow'style='float:right; width:60px'>Hapus</button>"+
                          "</td>"+
                     "</tr>";

                $('tbody').append(tr);
          }
          $('#maxIndexTable').val(lastIndexTable);
          });

      $('#addRowsNama').click(function(){

          var lastIndexTable = Number($('#maxIndexTable').val());
          var jumRow = Number($('#numRows').val());
          var i;
          var namaBaris = $('#namaBaris').val();
          var tglBaris = $('#tglBaris').val();

          for (i=0; i < jumRow; i++) {
            lastIndexTable = lastIndexTable + 1;
            var tr = "<tr id=\"tableRow"+lastIndexTable+"\">"+
                          "<td>"+
                              "<select class='form-control' name='np[]'>"+
                                "<option value=\'"+namaBaris+"\'>\ "+namaBaris+" |  \</option>"+
                                "@foreach ($profile as $nama)"+
                                    "<option value='{{$nama->np_user}}'>{{$nama->np_user}} | {{$nama->nama}}</option>"+
                                "@endforeach"+
                              "</select>"+
                          "</td>"+
                          "<td><input type='date' class='form-control' name='tglK3[]' value=\'"+tglBaris+"\'></td>"+
                          "<td><input type='number' class='form-control' value='0' name='holoMiss[]'></td>"+
                          "<td><input type='number' class='form-control' value='0' name='holoScratch[]'></td>"+
                          "<td><input type='number' class='form-control' value='0' name='holoMissRegister[]'></td>"+
                          "<td><input type='number' class='form-control' value='0' name='blurText[]'></td>"+
                          "<td><input type='number' class='form-control' value='0' name='blurImage[]'></td>"+
                          "<td><input type='number' class='form-control' value='0' name='inkSmear[]'></td>"+
                          "<td><input type='number' class='form-control' value='0' name='spotted[]'></td>"+
                          "<td><input type='number' class='form-control' value='0' name='underInk[]'></td>"+
                          "<td><input type='number' class='form-control' value='0' name='overInk[]'></td>"+
                          "<td><input type='number' class='form-control' value='0' name='gambarTipis[]'></td>"+
                          "<td><input type='number' class='form-control' value='0' name='gambarTebal[]'></td>"+
                          "<td><input type='number' class='form-control' value='0' name='textTipis[]'></td>"+
                          "<td><input type='number' class='form-control' value='0' name='textTebal[]'></td>"+
                          "<td><input type='number' class='form-control' value='0' name='nonUniform[]'></td>"+
                          "<td><input type='number' class='form-control' value='0' name='Incorrect[]'></td>"+
                          "<td><input type='number' class='form-control' value='0' name='missCutting[]'></td>"+
                          "<td><input type='number' class='form-control' value='0' name='tear[]'></td>"+
                          "<td><input type='number' class='form-control' value='0' name='folded[]'></td>"+
                          "<td><input type='number' class='form-control' value='0' name='plooi[]'></td>"+
                          "<td><input type='number' class='form-control' value='0' name='hole[]'></td>"+
                          "<td><input type='number' class='form-control' value='0' name='tercampur[]'></td>"+
                          "<td style='width:140px'>"+
                            "<button type='button' rel='tooltip' class='btn btn-danger btn-sm btn-icon removeRow'style='float:right; width:60px'>Hapus</button>"+
                          "</td>"+
                     "</tr>";

                $('tbody').append(tr);
          }
          $('#maxIndexTable').val(lastIndexTable);
          });
      $('tbody').on('click','.removeRow', function(){
              $(this).parent().parent().remove();
          });
    });
</script>

@endpush
