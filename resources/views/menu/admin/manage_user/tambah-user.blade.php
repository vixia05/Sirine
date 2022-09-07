@extends('layout.app')
@section('tittle', 'Create User')

@section('content')
<div class="c-body">
  <main  class="c-main">
    <div class="container-fluid">
      <div class="fade-in">
        <div class="row">
            {{-- Form Profile User --}}
            <div class="col-md-6"> 
                <form method="post" action="{{route('manage-user.store')}}" autocomplete="off" enctype="multipart/form-data">
                @csrf
              <div class="card" style="margin-left: 10px; margin-right: 10px;">
                <div class="card-header">
                    <h5 class="title" style="text-align: center">{{__("Profile User")}}</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                      <div class="col-md-12 pr-1">
                        <div class="form-group">
                          <label>{{__(" Nama")}}</label>
                          <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12 pr-1">
                        <div class="form-group">
                          <label>{{__(" NP")}}</label>
                          <input type="text" name="np" class="form-control" value="{{ old('np') }}" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12 pr-1">
                        <div class="form-group">
                            <label>{{__(" Tgl Lahir")}}</label>
                            <input type="date" name="tglLahir" class="form-control" value="{{ old('tglLahir') }}" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 pr-1">
                            <div class="form-group">
                                <label>{{__(" E-mail")}}</label>
                                    <input type="text" name="email" class="form-control" value="{{ old('email') }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 pr-1">
                            <div class="form-group">
                                <label>{{__(" Alamat")}}</label>
                                <textarea name="alamat"class="form-control" value="{{ old('alamat') }}" ></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 pr-1">
                            <div class="form-group">
                                <label>{{__(" No.Hp / WA")}}</label>
                                    <input type="text" name="contact" class="form-control" value="{{ old('contact') }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer" style="height: 105px">
                    <button type="submit" style="float: right; margin-top: 20px" class="btn btn-primary btn-round">{{__('Save')}}</button>
                </div>
              </div>
            </div>
            {{-- Form Workstation --}} 
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">
                    <h5 class="title" style="text-align: center">{{__("Work Station")}}</h5>
                </div>
                <div class="card-body">
                  <div class="row">
                      <div class="col-md-12 pr-1">
                          <div class="form-group">
                            <label>{{__(" Seksi")}}</label>
                            {!! Form::select('seksi',$seksi,null,['class'=>'form-control','id'=>'seksi']) !!}
                          </div>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 pr-1">
                      <div class="form-group">
                        <label>{{__(" Unit")}}</label>
                        {!! Form::select('unit',$unit,null,['class'=>'form-control','id'=>'unit']) !!}
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 pr-1">
                      <div class="form-group">
                        <label>{{__(" Station")}}</label>
                        {!! Form::select('station',$station,null,['class'=>'form-control','id'=>'station']) !!}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              {{-- Form Password & Privillage --}} 
              <div class="card">
                <div class="card-header">
                    <h5 class="title" style="text-align: center">{{__("Password & Privillege")}}</h5>
                </div>
                <div class="card-body">
                  <div class="row">
                      <div class="col-md-12 pr-1">
                          <div class="form-group">
                              <label>{{__(" Privillege ")}}</label>
                              {!! Form::select('role',$role,null,['class'=>'form-control','id'=>'role']) !!}
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-12 pr-1">
                          <div class="form-group">
                              <label>{{__(" Password  ")}}</label>
                                  <input type="password" name="password" class="form-control" required>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-12 pr-1">
                          <div class="form-group">
                              <label>{{__(" Konfirmasi Password  ")}}</label>
                                  <input type="password" name="konfirmasi_password" class="form-control" required>
                                  @error('konfirmasi_password')
                                    <div class="error text-red">Error</div>
                                  @enderror
                          </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>
</div>
@endsection
