<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\dataPcht;
use App\Models\dataMmea;

class TestController extends Controller
{
    public function test()
    {
        // dd($this->homeChart());
        return view('test',[
            // 'pcht'  => $this->orderPcht(),
            // 'mmea'  => $this->orderMmea(),
        ]);
    }

}
