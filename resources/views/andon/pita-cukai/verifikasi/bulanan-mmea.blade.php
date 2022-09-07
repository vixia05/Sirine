<div class="card border-warning text-center">    
  <div class="card-header"><h2>Total Order MMEA & HPTL ( Rencet )</h2></div>
  <div class="card-header bg-warning"><h1 style="font-size: 90px">{{ number_format($rencet_mmea_month)  }}</h1></div>
  <div class="card-body">
    <DIV class="row">
      <div class="col-md-3">
        <div class="card bg-info text-center">
          <div class="card-header text-white"><h4>Sisa Order</h4></div>
          <div class="card-body bg-white">
              <h1>{{ number_format($sisa_mmea_month) }}</h1>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card bg-info text-center">
          <div class="card-header text-white"><h4>Baik Periksa</h4 ></div>
          <div class="card-body bg-white">
              <h1>{{ number_format($baik_mmea_month) }}</h1>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card bg-info text-center">
          <div class="card-header text-white"><h4>Rusak Periksa</h4></div>
          <div class="card-body bg-white">
              <h1>{{ number_format($rusak_mmea_month) }}</h1>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card bg-info text-center">
          <div class="card-header text-white"><h4>Inschiet %</h4></div>
          <div class="card-body bg-white">
              <h1>{{ number_format($inschiet_mmea_month,2) }} %</h1>
          </div>
        </div>
      </div>
    </DIV>
  </div>  
</div>