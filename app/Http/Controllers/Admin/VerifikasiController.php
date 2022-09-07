<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Carbon\Carbon;
use App\Models\profile;
use App\Models\privilage;
use App\Models\verif_pikai;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VerifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $profile = profile::all();

        $np_nama = $profile
                    ->sortBy('nama')
                    ->pluck('nama','np_user'); 


        if(\Helper::call()->level() == 0 || \Helper::call()->level() > 1){
            
            return view('menu.admin.verifikasi.data-verifikasi',['profile' => $profile, 'np_nama'=>$np_nama]);
        }

        else
        {
            return abort(404);
        }
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
        // 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($hvh)
    {
        $deleteVerifikasi = verif_pikai::find($hvh);
        // dd($deleteVerifikasi);
        $deleteVerifikasi->delete();
        return redirect('data-verifikasi')->with('notif', 'User Berhasil Dihapus');
    }

    public function update_table(Request $request)
    {
        if(request()->ajax())
            {
                if(!empty($request->np))
                    {
                        if(!empty($request->startDate))
                            {
                                $data = verif_pikai::where('np_user',$request->np)
                                            ->whereBetween('tgl_verif',array($request->startDate, $request->endDate))
                                            ->get()
                                            ->sortby('tgl_verif');
                            }
                        else
                            {
                                $data = verif_pikai::where('np_user',$request->np)
                                            ->whereMonth('tgl_verif','=',Carbon::today())
                                            ->get()
                                            ->sortby('tgl_verif');
                            }
                    }
                else
                    {
                        if(!empty($request->startDate))
                            {
                                $data = verif_pikai::whereBetween('tgl_verif',array($request->startDate, $request->endDate))->get()
                                ->sortby('tgl_verif');
                            }
                        else
                            {
                                $data = verif_pikai::whereMonth('tgl_verif','=',Carbon::today())
                                ->get()
                                ->sortby('tgl_verif');
                            }
                    }
                
                return datatables()->of($data)
                                    ->addcolumn('aksi','menu.admin.verifikasi.crud-verifikasi')
                                    ->addcolumn('jml_verif','@if($jml_rim<10) 0{{$jml_rim}} @else {{$jml_rim}} @endif Rim / {{number_format($jml_lembar)}} Lbr')
                                    ->addcolumn('jml_obc','{{$jml_obc}} OBC')
                                    ->addcolumn('target','{{ number_format($target * 500) }} Lbr / {{$target}} rim')
                                    ->addcolumn('validation','@if($validation==0)<span class="badge badge-primary">Waiting Approval</span>@elseif($validation==1)<span class="badge badge-Success">Approved</span>@endif')
                                    ->rawcolumns(['aksi','jml_verif','jml_obc','target','validation'])
                                    ->addIndexColumn()
                                    ->make(true);
            }
    }
}
