@extends('layout.app')
@section('tittle', 'Input Cetak')

@section('content')
<div class="c-body">
  <main  class="c-main">
    <div class="container-fluid">
      <div class="fade-in">
        <div class="row">
          {{-- Form Input Hasil Produksi --}}
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="title text-center">{{__("Form Input Hasil Cetak")}}</h3>
              </div>
              <div class="card-body"  background="{{asset('assets')}}/img/bg.png">
                <form class="form-horizontal" enctype="multipart/form-data">
                  <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="tanggal">Tanggal</label>
                    <div class="col-md-4">
                      {!! Form::date('tanggal',now(),['class'=>'form-control','id'=>'tanggal']) !!}
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="gilir">Gilir</label>
                    <div class="col-md-4">
                        {!! Form::select('gilir',$gilir,null,['class'=>'form-control text-center','placeholder'=>'-- Gilir --','id'=>'gilir',]) !!}
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="nomorPo">Nomor PO</label>
                    <div class="col-md-4">
                        {!! Form::number('nomorPo',null,['class'=>'form-control text-center','id'=>'nomorPo',]) !!}
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="obc">OBC</label>
                    <div class="col-md-4">
                        {!! Form::text('text',null,['class'=>'form-control text-center','id'=>'obc']) !!}
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="mesin">Mesin</label>
                    <div class="col-md-4">
                        {!! Form::select('mesin',$mesin,null,['class'=>'form-control form-control-sm text-center','placeholder'=>'-- Mesin --','id'=>'mesin','name'=>'mesin']) !!}
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="jml_cetak">Jumlah Cetak</label>
                    <div class="col-md-4">
                        {!! Form::number('jml_cetak',null,['class'=>'form-control text-center','placeholder'=>'-- Jumlah Cetak --','id'=>'jml_cetak',]) !!}
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="petugas1">Petugas Cetak</label>
                    <div class="col-md-3">
                        {!! Form::select('petugas1',$petugas,null,['class'=>'form-control text-center','placeholder'=>'-- Petugas 1 --','id'=>'petugas1',]) !!}
                    </div>
                    <div class="col-md-3">
                        {!! Form::select('petugas2',$petugas,null,['class'=>'form-control text-center','placeholder'=>'-- Petugas 2 --','id'=>'petugas2',]) !!}
                    </div>
                    <div class="col-md-3">
                        {!! Form::select('petugas3',$petugas,null,['class'=>'form-control text-center','placeholder'=>'-- Petugas 3 --','id'=>'petugas3',]) !!}
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="petugas4"></label>
                    <div class="col-md-3">
                        {!! Form::select('petugas4',$petugas,null,['class'=>'form-control text-center','placeholder'=>'-- Petugas 4 --','id'=>'petugas4',]) !!}
                    </div>
                    <div class="col-md-3">
                        {!! Form::select('petugas5',$petugas,null,['class'=>'form-control text-center','placeholder'=>'-- Petugas 5 --','id'=>'petugas5',]) !!}
                    </div>
                    <div class="col-md-3">
                        {!! Form::select('petugas6',$petugas,null,['class'=>'form-control text-center','placeholder'=>'-- Petugas 6 --','id'=>'petugas6',]) !!}
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="petugas7"></label>
                    <div class="col-md-3">
                        {!! Form::select('petugas7',$petugas,null,['class'=>'form-control text-center','placeholder'=>'-- Petugas 7 --','id'=>'petugas7',]) !!}
                    </div>
                    <div class="col-md-3">
                        {!! Form::select('petugas8',$petugas,null,['class'=>'form-control text-center','placeholder'=>'-- Petugas 8 --','id'=>'petugas8',]) !!}
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="keterangan">Keterangan</label>
                    <div class="col-md-10">
                      {!! Form::textArea('keterangan',null,['class'=>'form-control', 'id'=>'keterangan']) !!}
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-12">
                      <button class="btn btn-pill btn-info float-right" type="submit">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          {{-- Review Produksi Harian --}}
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="tittle text-center">{{ __("Resume Produksi") }}</h3>
              </div>
              <div class="card-body">
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</div>

@endsection