<div class="card border-warning text-center">
  <div class="card-header"><h2>WIP Siap Periksa MMEA & HPTL</h2></div>
  <div class="card-header bg-stack-overflow"><h1 style="font-size: 90px">{{ number_format($wip_mmhp)  }}</h1></div>
  <div class="card-body">
    <DIV class="row">
      <div class="col-md-6">
        <div class="card bg-info text-center">
            <div class="card-header text-white"><h4>Siap Periksa MMEA</h4 ></div>
            <div class="card-body bg-white">
                <h1>{{ number_format($wip_mmea) }}</h1>
            </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card bg-info text-center">
            <div class="card-header text-white"><h4>Siap Periksa HPTL</h4></div>
            <div class="card-body bg-white">
                <h1>{{ number_format($wip_hptl) }}</h1>
            </div>
        </div>
      </div>
    </DIV>
  </div>
</div>