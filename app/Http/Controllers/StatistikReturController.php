<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use App\Models\defect_pikai;
use Illuminate\Http\Request;

class StatistikReturController extends Controller
{
    public function level()
    {
        return \Helper::call()->level();
    }
    public function index()
    {
            if($this->level() === 0 || $this->level() > 2)
            {
                return view('menu.performance.statistik-retur',[
                    'level' => $this->level(),
                    'returUnit' => $this->dataReturUnit(now()),
                    'jenisReturUnit' => $this->jenisReturUnit(now()),
                ]);
            }
            elseif($this->level() == 1 || $this->level() == 2)
            {
                return view('menu.performance.statistik-retur',[
                    'level' => $this->level(),
                    'returUnit' => $this->dataReturUnit(now()),
                    'returInd'  => $this->dataReturInd(Auth::user()->np,now()),
                    'jenisReturUnit' => $this->jenisReturUnit(now()),
                    'jenisReturInd'  => $this->jenisReturInd(Auth::user()->np,now())
                ]);
            }
            else
            {
                return abort(404);
            }
    }

    public function chartData(Request $request)
    {
        $seksi  = \Helper::call()->AuthSeksi();
        $npUser = $request->npVal;
        $yearVal = $request->yearVal;
        $station = $request->stationVal;
        $startDateTable = $request->startDateTable;
        $startDateChart = $request->startDateChart;
        $endDateTable   = $request->endDateTable;
        $endDateChart   = $request->endDateChart;
        return response()->json([

        ]);
    }
    
    public function getListStation($seksi)
    {
        $level = \Helper::call()->level();

        if($level === 4)
        {
            if(!empty($seksi))
            {
                $listStation = workstation::where('id_seksi',$seksi)
                                   ->get()
                                   ->sortBy('station')
                                   ->pluck('station','id');
            }
            else
            {
                $listStation = [];
            }

        }
        elseif($level === 3 || $level === 2)
        {
            if(!empty($seksi))
            {
                $listStation = workstation::where('id_seksi',$seksi)
                                          ->where('id_unit',\Helper::call()->AuthUnit())
                                          ->get()
                                          ->sortBy('station')
                                          ->pluck('station','id');
            }
            else
            {
                $listStation = [];
            }

        }
        elseif($level === 0 || $level === 5)
        {
           $listStation = workstation::all()
                                    ->sortBy('station')
                                    ->pluck('station','id');
        }
        else
        {
            $listStation = [];
        }

        return $listStation;
    }

    /** 
     * Get List User
    */

    public function getListUserCall($station)
    {
        if(!empty($station))
        {
            $listUser = profile::where('id_station',$station)
                               ->get()
                               ->sortBy('nama');

            $listNp   = $listUser->pluck('np_user');
            $listNama = $listUser->pluck('nama');
        }
        else
        {
            $listNp = [];
            $listNama = [];
        }

        return response()->json([
            'listNama' => $listNama,
            'listNp'   => $listNp,
        ]);
    }
    

    public function getListUser(Request $request)
    {
        if(!empty($request->station))
        {
            $listUser = profile::where('id_station',$request->station)
                               ->get()
                               ->sortBy('nama');

            $listNp   = $listUser->pluck('np_user');
            $listNama = $listUser->pluck('nama');
        }
        else
        {
            $listNp = [];
            $listNama = [];
        }

        return response()->json([
            'listNama' => $listNama,
            'listNp'   => $listNp,
        ]);
    }

    public function dataReturUnit($year)
    {
        $jan = defect_pikai::whereYear('tgl_cek',$year)->whereMonth('tgl_cek',1)->sum('total_retur');
        $feb = defect_pikai::whereYear('tgl_cek',$year)->whereMonth('tgl_cek',2)->sum('total_retur');
        $mar = defect_pikai::whereYear('tgl_cek',$year)->whereMonth('tgl_cek',3)->sum('total_retur');
        $apr = defect_pikai::whereYear('tgl_cek',$year)->whereMonth('tgl_cek',4)->sum('total_retur');
        $mei = defect_pikai::whereYear('tgl_cek',$year)->whereMonth('tgl_cek',5)->sum('total_retur');
        $jun = defect_pikai::whereYear('tgl_cek',$year)->whereMonth('tgl_cek',6)->sum('total_retur');
        $jul = defect_pikai::whereYear('tgl_cek',$year)->whereMonth('tgl_cek',7)->sum('total_retur');
        $agu = defect_pikai::whereYear('tgl_cek',$year)->whereMonth('tgl_cek',8)->sum('total_retur');
        $sep = defect_pikai::whereYear('tgl_cek',$year)->whereMonth('tgl_cek',9)->sum('total_retur');
        $okt = defect_pikai::whereYear('tgl_cek',$year)->whereMonth('tgl_cek',10)->sum('total_retur');
        $nov = defect_pikai::whereYear('tgl_cek',$year)->whereMonth('tgl_cek',11)->sum('total_retur');
        $des = defect_pikai::whereYear('tgl_cek',$year)->whereMonth('tgl_cek',12)->sum('total_retur');

        return [$jan,$feb,$mar,$apr,$mei,$jun,$jul,$agu,$sep,$okt,$nov,$des];
    }

    public function dataReturInd($np,$year)
    {
        $jan = defect_pikai::where('np_user',$np)->whereYear('tgl_cek',$year)->whereMonth('tgl_cek',1)->sum('total_retur');
        $feb = defect_pikai::where('np_user',$np)->whereYear('tgl_cek',$year)->whereMonth('tgl_cek',2)->sum('total_retur');
        $mar = defect_pikai::where('np_user',$np)->whereYear('tgl_cek',$year)->whereMonth('tgl_cek',3)->sum('total_retur');
        $apr = defect_pikai::where('np_user',$np)->whereYear('tgl_cek',$year)->whereMonth('tgl_cek',4)->sum('total_retur');
        $mei = defect_pikai::where('np_user',$np)->whereYear('tgl_cek',$year)->whereMonth('tgl_cek',5)->sum('total_retur');
        $jun = defect_pikai::where('np_user',$np)->whereYear('tgl_cek',$year)->whereMonth('tgl_cek',6)->sum('total_retur');
        $jul = defect_pikai::where('np_user',$np)->whereYear('tgl_cek',$year)->whereMonth('tgl_cek',7)->sum('total_retur');
        $agu = defect_pikai::where('np_user',$np)->whereYear('tgl_cek',$year)->whereMonth('tgl_cek',8)->sum('total_retur');
        $sep = defect_pikai::where('np_user',$np)->whereYear('tgl_cek',$year)->whereMonth('tgl_cek',9)->sum('total_retur');
        $okt = defect_pikai::where('np_user',$np)->whereYear('tgl_cek',$year)->whereMonth('tgl_cek',10)->sum('total_retur');
        $nov = defect_pikai::where('np_user',$np)->whereYear('tgl_cek',$year)->whereMonth('tgl_cek',11)->sum('total_retur');
        $des = defect_pikai::where('np_user',$np)->whereYear('tgl_cek',$year)->whereMonth('tgl_cek',12)->sum('total_retur');

        return [$jan,$feb,$mar,$apr,$mei,$jun,$jul,$agu,$sep,$okt,$nov,$des];
    }

    public function jenisReturUnit($year)
    {
        $get = defect_pikai::whereYear('tgl_cek',$year);

        $jenis = [
                    $get->sum('holoMiss'),
                    $get->sum('holoScratch'),
                    $get->sum('holoReg'),
                    $get->sum('printBlurTxt'),
                    $get->sum('printBlurImg'),
                    $get->sum('printSmear'),
                    $get->sum('printSpot'),
                    $get->sum('printUnder'),
                    $get->sum('printOver'),
                    $get->sum('colorUnderImg'),
                    $get->sum('colorOverImg'),
                    $get->sum('colorUnderTxt'),
                    $get->sum('colorOverTxt'),
                    $get->sum('colorNonUniform'),
                    $get->sum('colorIncorrect'),
                    $get->sum('cuttingMiss'),
                    $get->sum('appearanceTear'),
                    $get->sum('appearanceFolded'),
                    $get->sum('appearancePlooi'),
                    $get->sum('appearanceHole'),
                    $get->sum('mixedProduct'),
        ];

        return $jenis;

    }
    
    public function jenisReturInd($np,$year)
    {
        $get = defect_pikai::where('np_user',$np)
                           ->whereYear('tgl_cek',$year);

        $jenis = [
                    $get->sum('holoMiss'),
                    $get->sum('holoScratch'),
                    $get->sum('holoReg'),
                    $get->sum('printBlurTxt'),
                    $get->sum('printBlurImg'),
                    $get->sum('printSmear'),
                    $get->sum('printSpot'),
                    $get->sum('printUnder'),
                    $get->sum('printOver'),
                    $get->sum('colorUnderImg'),
                    $get->sum('colorOverImg'),
                    $get->sum('colorUnderTxt'),
                    $get->sum('colorOverTxt'),
                    $get->sum('colorNonUniform'),
                    $get->sum('colorIncorrect'),
                    $get->sum('cuttingMiss'),
                    $get->sum('appearanceTear'),
                    $get->sum('appearanceFolded'),
                    $get->sum('appearancePlooi'),
                    $get->sum('appearanceHole'),
                    $get->sum('mixedProduct'),
        ];

        return $jenis;
    }

}
