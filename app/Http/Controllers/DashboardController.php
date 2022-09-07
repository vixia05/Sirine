<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;

use App\Models\dataPcht;
use App\Models\dataMmea;

class DashboardController extends Controller
{
    public function index()
    {
        // dd($this->homeChart());
        return view('dashboard',[
            'pcht'  => $this->orderPcht(),
            'mmea'  => $this->orderMmea(),
        ]);
    }

    public function orderPcht()
    {
        $rencet   = dataPcht::whereMonth('tgl_obc',today())
                          ->sum('rencet');

        $baik     = dataPcht::WhereMonth('tgl_obc',today())
                          ->sum('baik_verifikasi');

        $rusak    = dataPcht::WhereMonth('tgl_obc',today())
                          ->sum('rusak_verifikasi');

        $verif    = $baik + $rusak;

        $sisa     = $rencet - ($baik + $rusak);

        $inschiet = ($rusak / $verif) * 100;

        return [
            'rencet'  => $rencet,
            'baik'    => $baik,
            'rusak'   => $rusak,
            'sisa'    => $sisa,
            'inschiet'=> $inschiet,
        ];
    }

    public function orderMmea()
    {
        $rencet   = dataMmea::whereMonth('tgl_obc',today())
                          ->sum('rencet');

        $baik     = dataMmea::WhereMonth('tgl_obc',today())
                          ->sum('baik_verifikasi');

        $rusak    = dataMmea::WhereMonth('tgl_obc',today())
                          ->sum('rusak_verifikasi');

        $verif    = $baik + $rusak;

        $sisa     = $rencet - ($baik + $rusak);

        $inschiet = ($rusak / $verif) * 100;

        return [
            'rencet'  => $rencet,
            'baik'    => $baik,
            'rusak'   => $rusak,
            'sisa'    => $sisa,
            'inschiet'=> $inschiet,
        ];
    }

    public function chartPcht()
    {
        $periode = today();

        $verif    = dataPcht::whereMonth('tgl_verifikasi',$periode)
                            ->get()
                            ->groupBy('tgl_verifikasi')
                            ->map(function($sum){
                                return $sum->sum('baik_verifikasi');
                            });
        return $verif;
    }

    public function chartMmea()
    {
        $periode = today();

        $verif    = dataMmea::whereMonth('tgl_verifikasi',$periode)
                            ->get()
                            ->groupBy('tgl_verifikasi')
                            ->map(function($sum){
                                return $sum->sum('baik_verifikasi');
                            });
        return $verif;
    }

    public function homeChart()
    {
        $verifPcht = $this->chartPcht()->toArray();
        $verifMmea = $this->chartMmea()->toArray();
        $datePcht  = array_keys($verifPcht);
        $dateMmea  = array_keys($verifMmea);

        return [
            'verifPcht' => $verifPcht,
            'verifMmea' => $verifMmea,
            'datePcht'  => $datePcht,
            'dateMmea'  => $dateMmea,
        ];
    }
}
