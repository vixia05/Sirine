{{-- Pengemasan PCHT Harian --}}
  <div class="carousel-item active">
      <div class="card border-success text-center">    
          <div class="card-header"><h2>Kemas <strong>PCHT</strong> Hari Ini </h2></div>
          <div class="card-header text-white bg-success"><h1 style="font-size: 80px">{{ number_format($kemas_pcht) }}</h1></div>
          <div class="card-body">
            <DIV class="row">
              <div class="col-md-6">
                <div class="card bg-info text-center">
                  <div class="card-header text-white"><h4>Non - Personal</h4 ></div>
                  <div class="card-body bg-white">
                      <h1 style="font-size: 60px">{{ number_format($kemas_np) }}</h1>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="card bg-info text-center">
                  <div class="card-header text-white"><h4>Personal</h4></div>
                  <div class="card-body bg-white">
                      <h1 style="font-size: 60px">{{ number_format($kemas_p) }}</h1>
                  </div>
                </div>
              </div>
            </DIV>
          </div>
          <div class="card-footer">
            <div class="row">
              <div class="col-sm-6 col-md-6 mb-sm-2 mb-0">
                <div class="text-muted">Komposisi Kirim Harian Non-Personal</div>
                  <strong>{{ number_format($progress_npersonal,2) }} % = ( {{ number_format($komposisi_npersonal) }} LK )</strong>
                <div class="progress progress-xs mt-2">
                  <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: {{ $progress_npersonal }}%" aria-valuenow="{{ $progress_npersonal }}" aria-valuemin="0" aria-valuemax="100"></div>
                  <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" style="width: {{ 100 - $progress_npersonal }}%" aria-valuenow="{{ 100 - $progress_npersonal }}" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
              <div class="col-sm-6 col-md-6 mb-sm-2 mb-0">
                <div class="text-muted">Komposisi Kirim Harian Personal %</div>
                  <strong>{{ number_format($progress_personal,2) }} % = ( {{ number_format($komposisi_personal) }} LK )</strong>
                  <div class="progress progress-xs mt-2">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: {{ $progress_personal }}%" aria-valuenow="{{ $progress_personal }}" aria-valuemin="0" aria-valuemax="100"></div>
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" style="width: {{ 100 - $progress_personal }}%" aria-valuenow="{{ 100 - $progress_personal }}" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
              </div>
            </div>
          </div>  
      </div>
  </div>
{{-- Pengemasan MMEA Harian --}}
  <div class="carousel-item">
    <div class="card border-warning text-center">    
        <div class="card-header"><h2>Kemas <strong>MMEA</strong> Hari Ini </h2></div>
        <div class="card-header bg-warning"><h1 style="font-size: 80px">{{ number_format($kemas_mmhp) }}</h1></div>
        <div class="card-body">
          <DIV class="row">
            <div class="col-md-6">
              <div class="card bg-info text-center">
                <div class="card-header text-white"><h4>MMEA</h4 ></div>
                <div class="card-body bg-white">
                    <h1 style="font-size: 60px">{{ number_format($kemas_mmea) }}</h1>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card bg-info text-center">
                <div class="card-header text-white"><h4>HPTL</h4></div>
                <div class="card-body bg-white">
                    <h1 style="font-size: 60px">{{ number_format($kemas_hptl) }}</h1>
                </div>
              </div>
            </div>
          </DIV>
        </div>
        <div class="card-footer">
          <div class="col-sm-12 col-md mb-sm-2 mb-0">
            <div class="text-muted">Komposisi Kirim Harian MMEA</div>
            <strong>{{ number_format($progress_mmea,2) }} % = ( {{ number_format($komposisi_mmea) }} )</strong>
            <div class="progress progress-xs mt-2">
              <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: {{ $progress_mmea }}%" aria-valuenow="{{ $progress_mmea }}" aria-valuemin="0" aria-valuemax="100"></div>
              <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" style="width: {{ 100 - $progress_mmea }}%" aria-valuenow="{{ 100 - $progress_mmea }}" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>
        </div>  
    </div>
  </div>