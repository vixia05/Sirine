<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\verif_pikai;
use App\Models\dataPcht;
use App\Models\privilage;
use App\Models\profile;
use App\Models\defect;
use App\Models\workstation;
use Carbon\Carbon;
use Auth;

class PerformanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function level()
    {
        $level = \Helper::call()->level();
        return $level;
    }

    // class untuk Halaman Hasil Verifikasi Harian

    public function index()
    {
        
       $profile = profile::all();
       $station = $this->getListStation(\Helper::call()->AuthSeksi());

        if($this->level() === 0 || $this->level() > 2)
        {
            return view('menu.performance.statistik-verifikasi',[
                                                                    'level'     => $this->level(),
                                                                    'station'   => $station,
                                                                    'dateDaily' => $this->dateRange('',carbon::now()->firstOfMonth(),carbon::now()),
                                                                    'qtyVerifDaily' => $this->qtyVerifikasiDaily('',carbon::now()->firstOfMonth(),carbon::now()),
                                                                    'qtyVerifYearly'=> $this->qtyVerifikasiYearly('',carbon::now()),
                                                                ]);
        }
        elseif($this->level() == 1 || $this->level() == 2)
        {
            return view('menu.performance.statistik-verifikasi',[
                                                                    'level' => $this->level(),
                                                                    'dateDaily' => $this->dateRange(Auth::user()->np,carbon::now()->firstOfMonth(),carbon::now()),
                                                                    'qtyVerifDaily' => $this->qtyVerifikasiDaily(Auth::user()->np,carbon::now()->firstOfMonth(),carbon::now()),
                                                                    'qtyVerifYearly'=> $this->qtyVerifikasiYearly(Auth::user()->np,carbon::now()),
                                                                ]);
        }
    }

    /** 
     * 
     * 
     * 
    */
    
    public function call(Request $request)
    {
        $seksi  = \Helper::call()->AuthSeksi();
        $npUser = $request->npVal;
        $yearVal = $request->yearVal;
        $station = $request->stationVal;
        $startDateTable = $request->startDateTable;
        $startDateChart = $request->startDateChart;
        $endDateTable   = $request->endDateTable;
        $endDateChart   = $request->endDateChart;


        $namaUser = profile::where('np_user',$npUser)
                            ->value('nama');

        $listUser   = $this->getListUserCall($station);
        $listStation= $this->getListStation($seksi);
        $chartDate  = $this->dateRange($npUser,$startDateChart,$endDateChart);
        $qtyTarget  = $this->qtyTarget($npUser,$startDateChart,$endDateChart);
        $qtyAverage = $this->qtyAverage($npUser,$startDateChart,$endDateChart);
        $qtyVerifDaily   = $this->qtyVerifikasiDaily($npUser,$startDateChart,$endDateChart);
        $qtyVerifYearly  = $this->qtyVerifikasiYearly($npUser,$yearVal);

        return response()->json([
            'listUser'  => $listUser,
            'namaUser'  => $namaUser,
            'chartDate' => $chartDate,
            'qtyTarget' => $qtyTarget,
            'qtyAverage' => $qtyAverage,
            'listStation' => $listStation,
            'qtyVerifDaily'  => $qtyVerifDaily,
            'qtyVerifYearly'  => $qtyVerifYearly,
        ]);
    }
    
    /** 
     * Get List Worksatiton
    */

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
    
    /** 
     * Get Date Range For Daily Chart
    */

    public function dateRange($npUser,$startDateChart,$endDateChart)
    {
        if(!empty($startDateChart) && !empty($endDateChart))
        {
            if(!empty($npUser))
            {
                $date = verif_pikai::where('np_user',$npUser)
                                    ->whereBetween('tgl_verif',[$startDateChart,$endDateChart])
                                    ->get()
                                    ->sortBy('tgl_verif')
                                    ->pluck('tgl_verif');
            }
        
            else
            {
                $date = dataPcht::whereBetween('tgl_verifikasi',[$startDateChart,$endDateChart])
                                ->get()
                                ->sortBy('tgl_verifikasi')
                                ->unique('tgl_verifikasi')
                                ->pluck('tgl_verifikasi');
            }
        }

        else
        {
            $date = dataPcht::whereBetween('tgl_verifikasi',\Helper::call()->getMonthRange())
                            ->get()
                            ->sortBy('tgl_verifikasi')
                            ->unique('tgl_verifikasi')
                            ->pluck('tgl_verifikasi');
        }
        
        return $date;
    }

    /** 
     * Qty Verifikasi Pita Cukai Daily
     * 
     * Sum By Each Date Base By NP
    */

    public function qtyVerifikasiDaily($npUser,$startDateChart,$endDateChart)
    {
        if(!empty($npUser))
        {
            if(!empty($startDateChart) && !empty($endDateChart))
            {
                $dateRange = [$startDateChart,$endDateChart];
        
                $qtyVerif = verif_pikai::where('np_user',$npUser)
                                       ->whereBetween('tgl_verif',$dateRange)
                                       ->get()
                                       ->sortBy('tgl_verif')
                                       ->pluck('jml_lembar');
            }
        
            else
            {
                $qtyVerif = dataPcht::whereBetween('tgl_verifikasi',[$startDateChart,$endDateChart])
                                    ->get()
                                    ->sortBy('tgl_verifikasi')
                                    ->groupBy('tgl_verifikasi')
                                    ->map(function($sum){
                                        return $sum->sum('rencet');
                                    })->values();
            }

        }

        else
        {
            $qtyVerif = dataPcht::whereBetween('tgl_verifikasi',\Helper::call()->getMonthRange())
                                ->get()
                                ->sortBy('tgl_verifikasi')
                                ->groupBy('tgl_verifikasi')
                                ->map(function($sum){
                                    return $sum->sum('rencet');
                                })->values();
        }

        return $qtyVerif;
    }
    
    /** 
     * Qty Verifikasi Pita Cukai Yearly
     * 
     * Sum By Each Date Base By NP
    */

    public function qtyVerifikasiYearly($npUser,$yearVal)
    {
        if(!empty($yearVal))
        {
            if(!empty($npUser))
            {
                $qtyVerif = DB::table('verif_pikai')
                               ->Where('np_user',$npUser)
                               ->WhereYear('tgl_verif',$yearVal)
                               ->select(DB::raw('SUM(jml_lembar) as total_lembar, MONTH( tgl_verif ) as month'))
                               ->groupBy(DB::raw('MONTH(tgl_verif) ASC'))
                               ->pluck('total_lembar');
            }

            else
            {
                $qtyVerif = DB::table('bulanan_pcht')
                               ->WhereYear('tgl_verifikasi',$yearVal)
                               ->select(DB::raw('SUM(rencet) as total_rencet, MONTH( tgl_verifikasi ) as month'))
                               ->groupBy(DB::raw('MONTH(tgl_verifikasi) ASC'))
                               ->pluck('total_rencet');
            }
        }

        else
        {
            $qtyVerif = DB::table('bulanan_pcht')
                           ->WhereYear('tgl_verifikasi',carbon::today())
                           ->select(DB::raw('SUM(rencet) as total_rencet, MONTH( tgl_verifikasi ) as month'))
                           ->groupBy(DB::raw('MONTH(tgl_verifikasi) ASC'))
                           ->pluck('total_rencet');
        }

        return $qtyVerif;
    }
    
    /** 
     * Target Verifikasi Pita Cukai Daily
     * 
     * Sum By Each Date Base By NP
    */

    public function qtyTarget($npUser,$startDateChart,$endDateChart)
    {
        if(!empty($npUser))
        {
            if(!empty($startDateChart) && !empty($endDateChart))
            {
                $target = verif_pikai::where('np_user',$npUser)
                                      ->whereBetween('tgl_verif',[$startDateChart,$endDateChart])
                                      ->get()
                                      ->sortBy('tgl_verif')
                                      ->map(function($sum){
                                          return $sum->target*500;
                                      })->values();
            }

            else
            {
                $target = [];
            }
        }

        else
        {
            $target = [];
        }

        return $target;
    }
    
    /** 
     * Rata - Rata Verifikasi Pita Cukai Daily
     * 
     * Sum By Each Date Base By NP
    */

    public function qtyAverage($npUser,$startDateChart,$endDateChart)
    {
        if(!empty($npUser))
        {
            if(!empty($startDateChart) && !empty($endDateChart))
            {
                $dateRange = [$startDateChart,$endDateChart];

                $average = DB::table('verif_pikai')
                            ->whereBetween('tgl_verif',$dateRange)
                            ->select(DB::raw('AVG(jml_lembar) as average_verif'))
                            ->groupBy(DB::raw('DAY(tgl_verif) ASC'))
                            ->get()
                            ->map(function($format){
                                return round($format->average_verif);
                            });;
            }

            else
            {
                $average = [];
            }
        }

        else
        {
            $average = [];
        }

        return $average;
    }

    /** 
     * Table for Verification Data
     * 
     * Including Statistik Verifikasi Monthly And Years
    */
    
    public function update_table(Request $request)
    {
        $startDate = $request->startDate;
        $endDate   = $request->endDate;
        //** Ajax Untuk Performa User Admin */
        if(request()->ajax())
        {
            if(!empty($request->npVal))
            {
                $npUser = $request->npVal;
                $data   = verif_pikai::where('np_user',$npUser)
                                    ->whereBetween('tgl_verif',[$startDate,$endDate])
                                    ->get();
            }
            else
            {
                if(!empty($startDate && $endDate))
                {
                    $data = verif_pikai::whereBetween('tgl_verif',[$startDate,$endDate])
                                        ->get();
                }
                else
                {
                    $data = verif_pikai::whereMonth('tgl_verif',carbon::today())
                                        ->get();
                }
            }

            return datatables()->of($data)
                                ->addIndexColumn()
                                ->make(true);
        }
    }


}
