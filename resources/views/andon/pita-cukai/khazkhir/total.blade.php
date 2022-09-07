{{-- Total Order PCHT Bulanan --}}  
  <div class="carousel-item active">
    <div class="card border-success text-center">    
        <div class="card-header"><h2>Total Pesanan <strong>PCHT</strong>
          {!! Form::selectMonth('month',null,['class' => 'btn','placeholder'=>$day->format('F'),'name'=>'bulanOrder', 'id' => 'bulanOrder']) !!}</h2>
        </div>
        <div class="card-header text-white bg-success"><h1 style="font-size: 80px">{{ number_format($pesanan_pcht) }}</h1></div>
        <div class="card-body">
          <DIV class="row">
            <div class="col-md-6">
              <div class="card bg-info text-center">
                <div class="card-header text-white"><h4>Pesanan Non - Personal {{ $day->format('F') }}</h4 ></div>
                <div class="card-body bg-white">
                    <h1 style="font-size: 60px">{{ number_format($order_np) }}</h1>
                </div>
                <div class="card-footer bg-white">
                  <div class="col-sm-12 col-md-12 mb-sm-2 mb-0">
                    <div class="text-muted">Progress Order Non-Personal</div>
                      <strong>{{ number_format($persentase_npersonal,2) }} % = ( {{ number_format($sisa_npersonal) }} LK )</strong>
                    <div class="progress progress-xs mt-2">
                      <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: {{ $persentase_npersonal }}%" aria-valuenow="{{ $progress_npersonal }}" aria-valuemin="0" aria-valuemax="100"></div>
                      <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" style="width: {{ 100 - $persentase_npersonal }}%" aria-valuenow="{{ 100 - $persentase_npersonal }}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </div>  
              </div>
            </div>
            <div class="col-md-6">
              <div class="card bg-info text-center">
                <div class="card-header text-white"><h4>Pesanan Personal {{ $day->format('F') }}</h4></div>
                <div class="card-body bg-white">
                    <h1 style="font-size: 60px">{{ number_format($order_p) }}</h1>
                </div>
                <div class="card-footer bg-white">
                  <div class="col-sm-12 col-md-12 mb-sm-2 mb-0">
                    <div class="text-muted">Progress Order Personal %</div>
                      <strong>{{ number_format($persentase_personal,2) }} % = ( {{ number_format($sisa_personal) }} LK )</strong>
                    <div class="progress progress-xs mt-2">
                      <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: {{ $persentase_personal }}%" aria-valuenow="{{ $persentase_personal }}" aria-valuemin="0" aria-valuemax="100"></div>
                      <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" style="width: {{ 100 - $persentase_personal }}%" aria-valuenow="{{ 100 - $persentase_personal }}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </DIV>
        </div>
    </div>
  </div>
{{-- Total Order MMEA & HPTL Bulanan --}}
  <div class="carousel-item">
    <div class="card border-warining text-center">    
        <div class="card-header"><h2>Total Pesanan <strong>MMEA & HPTL</strong> {{ $day->format('F') }} </h2></div>
        <div class="card-header bg-warning"><h1 style="font-size: 80px">{{ number_format($pesanan_mmea) }}</h1></div>
        <div class="card-body">
          <DIV class="row">
            <div class="col-md-6">
              <div class="card bg-info text-center">
                <div class="card-header text-white"><h4>Pesanan MMEA {{ $day->format('F') }}</h4 ></div>
                <div class="card-body bg-white">
                    <h1 style="font-size: 60px">{{ number_format($order_mmea) }}</h1>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card bg-info text-center">
                <div class="card-header text-white"><h4>Pesanan HPTL {{ $day->format('F') }}</h4></div>
                <div class="card-body bg-white">
                    <h1 style="font-size: 60px">{{ number_format($order_hptl) }}</h1>
                </div>
              </div>
            </div>
          </DIV>
        </div>
        <div class="card-footer">
          <div class="col-sm-12 col-md mb-sm-2 mb-0">
            <div class="text-muted">Progress Order MMEA</div>
            <strong>{{ number_format($persentase_mmea,2) }} % = ( {{ number_format($sisa_mmea) }} )</strong>
            <div class="progress progress-xs mt-2">
              <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: {{ $persentase_mmea }}%" aria-valuenow="{{ $persentase_mmea }}" aria-valuemin="0" aria-valuemax="100"></div>
              <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" style="width: {{ 100 - $persentase_mmea }}%" aria-valuenow="{{ 100 - $persentase_mmea }}" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>
        </div>  
    </div>
  </div>