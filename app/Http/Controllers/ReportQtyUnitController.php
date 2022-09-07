<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\verif_pikai;
use App\Models\profile;
use Carbon\Carbon;

class ReportQtyUnitController extends Controller
{
    public function index()
    {

        return view('menu.performance.report-verifikasi');
    }

    public function getData(Request $request)
    {
        $group  = $request->group;
        $satuan = $request->satuanVal;
        $startDate  = $request->startDate;
        $endDate   = $request->endDate;

        $user   = $this->users($group);
        
        if($satuan == "performance")
        {
            $data = $this->qtyPerformance($startDate,$endDate,$user);
        }

        elseif($satuan == "jumlahVerif")
        {
            $data = $this->sumLembar($startDate,$endDate,$user);
        }
        
        else
        {
            //
        }
        $users = array_keys($data->toArray());
        $sum = $data->values();

        return response()->json([
            'users' => $users,
            'sumLembar' => $sum,
        ]);
    }

    public function users($station = null)
    {
        if($station != null)
        {
            $users = profile::where('id_station',$station)->pluck('np_user');
        }
        else
        {
            $users = profile::where('id_station',18)->pluck('np_user');
        }

        return $users;
    }

    public function sumLembar($start = null,$end = null,$users = null)
    {
        if($start != null && $end != null)
        {
            $sum = verif_pikai::whereBetween('tgl_verif',[$start,$end])
                                ->whereIn('np_user',$users)
                                ->get()
                                ->groupBy('np_user')
                                ->map(function($sum){
                                    return $sum->sum('jml_lembar');
                                })->sortDesc();
        }
        else
        {
            $sum = verif_pikai::whereMonth('tgl_verif',now())
                                ->whereIn('np_user',$users)
                                ->get()
                                ->groupBy('np_user')
                                ->map(function($sum){
                                    return $sum->sum('jml_lembar');
                                })->sortDesc();
        }

        return $sum;
    }

    public function qtyPerformance($start = null, $end = null,$users = null)
    {
        if($start != null && $end != null)
        {
            $target = verif_pikai::whereBetween('tgl_verif',[$start,$end])
                                 ->whereIn('np_user',$users)
                                 ->get()
                                 ->groupBy('np_user')
                                 ->map(function($data){
                                    $sum    = $data->sum('jml_lembar');
                                    $target = $data->sum('target')*500;
                                    $percent= ($sum / $target) * 100;
                                    return $percent;
                                 })->sortDesc();
        }

        else
        {
            $target = verif_pikai::whereMonth('tgl_verif',now())
                                 ->whereIn('np_user',$users)
                                 ->get()
                                 ->groupBy('np_user')
                                 ->map(function($data){
                                    $sum    = $data->sum('jml_lembar');
                                    $target = $data->sum('target')*500;
                                    $percent= ($sum / $target) * 100;
                                    return $percent;
                                 })->sortDesc();
        }

        return $target;
    }
}
