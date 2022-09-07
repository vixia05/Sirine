<?php

namespace App\Http\Controllers;

use App\Models\evaluation;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\notif;
use App\Models\defect;
use Auth;
use DB;

class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->np;
        $evaluation = evaluation::all();
        
        return view('menu.admin.defect.evaluasi-defect',compact('evaluation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $np = Auth::user()->np;
        $tglCek = $request->bulanRetur;
        $respon = $request->respon;

       evaluation::where('np_pegawai',$np)
                    ->whereMonth('tgl_cek','=',$tglCek)
                    ->update(['respon_pegawai'=>$respon]);
        //dd($np);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('menu.admin.pesanEva',compact('evaluation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    //** Pesan Evaluasi Untuk User */
    public function info(Request $request)
    {
        $user = Auth::user()->np;
        $notif = evaluation::where('np_pegawai',$user);
        $lolos = defect::where('np_user',$user);


        if(request()->ajax())
        {
            if(!empty($request->bulanRetur))
            {
                $sumRetur = $lolos
                    ->whereMonth('tgl_cek','=',$request->bulanRetur)
                    ->sum(DB::raw('holoMiss + holoScratch + holoReg + printBlurTxt + printBlurImg + printSmear + printSpot + printUnder + printOver + colorUnderImg + colorOverImg + colorUnderTxt + colorOverTxt + colorNonUniform + colorIncorrect + cuttingMiss + appearanceTear + appearanceFolded + appearancePlooi + appearanceHole + mixedProduct'));
                
                $notifUser = $notif
                        ->whereMonth('tgl_cek','=',$request->bulanRetur);

                $pesanKasek = $notifUser->pluck('pesan_kasek');
                $pesanKaun = $notifUser->pluck('pesan_kaun');
                $responPegawai = $notifUser->pluck('respon_pegawai');
                

            }
            else
            {
                $sumRetur = $lolos
                    ->whereMonth('tgl_cek','=',Carbon::now())
                    ->sum(DB::raw('holoMiss + holoScratch + holoReg + printBlurTxt + printBlurImg + printSmear + printSpot + printUnder + printOver + colorUnderImg + colorOverImg + colorUnderTxt + colorOverTxt + colorNonUniform + colorIncorrect + cuttingMiss + appearanceTear + appearanceFolded + appearancePlooi + appearanceHole + mixedProduct'));
        
                $notifUser = $notif
                        ->whereMonth('tgl_cek','=',carbon::now());

                $pesanKasek = $notifUser->pluck('pesan_kasek');
                $pesanKaun = $notifUser->pluck('pesan_kaun');
                $responPegawai = $notifUser->pluck('respon_pegawai');
            }
            return response()->json(['sumRetur'=>$sumRetur,'pesanKasek'=>$pesanKasek,'pesanKaun'=>$pesanKaun,'responPegawai'=>$responPegawai]);
        }
        

        return view('menu.performance.pesan-evaluasi',compact('notif'));

    }

}
