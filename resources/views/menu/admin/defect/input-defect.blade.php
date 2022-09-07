@extends('layout.app')
@section('tittle', 'Input Retur Pita Cukai')
@section('content')
<div class="c-body">
  <main class="c-main">
    <div class="container-fluid">
      <div class="fade-in">
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header card-accent-info">
                <h3 style="text-align: center">Input Retur Pita Cukai</h3>
              </div>
              <div class="card-body">
                <form class="form-horizontal" enctype="multipart/form-data">
                  <div class="form-group row ">
                    <label class="col-md-2 col-form-label" for="tanggal">Tanggal K3</label>
                    <div class="col-md-4">
                      {!! Form::date('tanggal',now(),['class'=>'form-control','id'=>'tanggal','required']) !!}
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="np">Nomor Pokok</label>
                    <div class="col-md-3">
                        {!! Form::select('np',$np_user,null,['class'=>'form-control text-center','placeholder'=>'-- NP --','id'=>'np','required']) !!}
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="nama">Nama</label>
                    <div class="col-md-5">
                        {!! Form::text('nama',null,['class'=>'form-control text-center','id'=>'nama','disabled']) !!}
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="jenisRusak">Jenis Defect</label>
                    <div class="col-md-3">
                        {!! Form::select('jenisDefect',$category,null,['class'=>'form-control text-center','placeholder'=>'Jenis Defect','id'=>'jenisDefect']) !!}
                    </div>
                    <div class="col-md-3">
                        {!! Form::select('type',[0],null,['class'=>'form-control text-center','placeholder'=>'Tipe Kerusakan','id'=>'type','disabled','required']) !!}
                    </div>
                    <div class="col-md-4">
                      <div class="input-group">
                        {!! Form::number('lembar',null,['class'=>'form-control text-center','placeholder'=>'Jumlah Defect Lbr ','id'=>'lembar']) !!}
                        <span class="input-group-append">
                          <button class="btn btn-success" type="button" id="add-defect" name="add-defect">+</button>
                        </span>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="card-footer">
                <div class="form-group row">
                  <div class="col-md-12">
                    <button class="btn btn-pill btn-info float-right" type="submit">Submit</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
      </div>
    </div>
  </main>
</div>
@endsection

@push('js')
<script>
  
</script>
@endpush
