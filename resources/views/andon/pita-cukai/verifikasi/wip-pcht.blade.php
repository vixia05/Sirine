 <div class="card border-success text-center">    
  <div class="card-header"><h2>WIP Siap Periksa PCHT</h2></div>
  <div class="card-header text-white bg-gradient-info"><h1 style="font-size: 90px">{{ number_format($wip_pcht)  }}</h1></div>
  <div class="card-body">
    <DIV class="row">
      <div class="col-md-6">
        <div class="card bg-info text-center">
          <div class="card-header text-white"><h4>Siap Periksa Non-Personal</h4 ></div>
          <div class="card-body bg-white">
              <h1>{{ number_format($wip_np) }}</h1>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card bg-info text-center">
          <div class="card-header text-white"><h4>Siap Periksa Personal</h4></div>
          <div class="card-body bg-white">
              <h1>{{ number_format($wip_p) }}</h1>
          </div>
        </div>
      </div>
    </DIV>
  </div>  
</div>