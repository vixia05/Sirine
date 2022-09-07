 <div class="card border-success text-center">    
  <div class="card-header"><h2>Hasil Verifikasi ( PCHT ) Hari Ini</h2></div>
  <div class="card-header text-white bg-success"><h1 style="font-size: 90px" id="rencet_pcht" name="rencet_pcht">{{ number_format($rencet_pcht)  }}</h1></div>
  <div class="card-body">
    <DIV class="row">
      <div class="col-md-4">
        <div class="card bg-info text-center">
          <div class="card-header text-white"><h4>Baik Periksa</h4 ></div>
          <div class="card-body bg-white">
              <h1>{{ number_format($baik_pcht) }}</h1>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card bg-info text-center">
          <div class="card-header text-white"><h4>Rusak Periksa</h4></div>
          <div class="card-body bg-white">
              <h1>{{ number_format($rusak_pcht) }}</h1>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card bg-info text-center">
          <div class="card-header text-white"><h4>Inschiet %</h4></div>
          <div class="card-body bg-white">
              <h1>{{ number_format($inschiet_pcht,2) }} %</h1>
          </div>
        </div>
      </div>
    </DIV>
  </div>  
</div>