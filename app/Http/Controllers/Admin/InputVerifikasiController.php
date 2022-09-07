<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\profile;
use App\Models\privilage;
use App\Models\workstation;
use App\Models\verif_pikai;
use App\Models\verif_mmea;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Auth;

class InputVerifikasiController extends Controller
{

    public function level()
    {
        $level = privilage::where('np',Auth::user()->np)
                    ->value('level');
        return $level;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $station_user = profile::where('np_user',Auth::user()->np)
                            ->value('id_station');

        $unit_user = profile::where('np_user',Auth::user()->np)
                            ->value('id_unit');

        $station = workstation::where('id_unit',$unit_user)
                        ->get()
                        ->sortBy('station')
                        ->pluck('station','id');

        if($this->level() == 0 || $this->level() > 1)
        {

            return view('menu.admin.verifikasi.input-verifikasi',compact('station','station_user'));
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
    public function create(Request $request)
    {

        //dd($modelTgl);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $level = privilage::where('np',Auth::user()->np)
                            ->value('level');
        if($this->level() == 0 || $this->level() > 1)
            {
                $np = $request->np;
                $nama = $request->nama;
                $lembur = $request->lembur;
                $jmlRim = $request->jml_rim;
                $jmlOBC = $request->jml_obc;
                $tglVerif = $request->pilih_tgl;
                $jmlLembar = $request->jml_lembar;
                $keterangan = $request->keterangan;
                $jenis_verif = $request->jenis_verif;

                if($jenis_verif == 'PCHT')
                {
                for($i=0 ; $i < count($np) ; $i++){

                    if($lembur[$i] == "Awal")
                        {
                            $target = 40;
                        }
                    elseif($lembur[$i] == "Akhir")
                        {
                            $target = 45;
                        }
                    elseif($lembur[$i] == "Awal Akhir")
                        {
                            $target = 55;
                        }
                    else
                        {
                            $target = 30;
                        }
                            if($jmlLembar[$i]>0 || $keterangan[$i]==!null )
                             {
                                verif_pikai::updateOrCreate(
                                    [ 'np_user' => $np[$i], 'tgl_verif'  => $tglVerif],
                                    [
                                    'nama_user'  => $nama[$i],
                                    'jml_lembar' => $jmlLembar[$i],
                                    'jml_rim'    => $jmlLembar[$i]/500,
                                    'jml_obc'    => $jmlOBC[$i],
                                    'lembur'     => $lembur[$i],
                                    'target'     => $target,
                                    'keterangan' => $keterangan[$i],
                                ]);
                             }
                        // }
                   }
                }
                elseif($jenis_verif == 'MMEA')
                {

                for($i=0 ; $i < count($np) ; $i++){

                    if($lembur[$i] == "Awal")
                        {
                            $target = 40;
                        }
                    elseif($lembur[$i] == "Akhir")
                        {
                            $target = 45;
                        }
                    elseif($lembur[$i] == "Awal Akhir")
                        {
                            $target = 55;
                        }
                    else
                        {
                            $target = 30;
                        }
                        // dd($tglVerif[$i]);
                    // if($jmlRim[$i] == !null)
                    //     {
                    //         if($jmlRim[$i]>0 || $keterangan[$i]==!null )
                    //          {
                    //             verif_mmea::updateOrCreate(
                    //                 [ 'np_user' => $np[$i], 'tgl_verif'  => $tglVerif],
                    //                 [
                    //                 'nama_user'  => $nama[$i],
                    //                 'jml_rim'    => $jmlRim[$i],
                    //                 'jml_lembar' => $jmlRim[$i]*500,
                    //                 'jml_obc'    => $jmlOBC[$i],
                    //                 'lembur'     => $lembur[$i],
                    //                 'target'     => $target,
                    //                 'keterangan' => $keterangan[$i],
                    //             ]);
                    //          }
                    //     }
                    // else
                    //     {
                            if($jmlLembar[$i]>0 || $keterangan[$i]==!null )
                             {
                                verif_mmea::updateOrCreate(
                                    [ 'np_user' => $np[$i], 'tgl_verif'  => $tglVerif],
                                    [
                                    'nama_user'  => $nama[$i],
                                    'jml_lembar' => $jmlLembar[$i],
                                    'jml_rim'    => $jmlLembar[$i]/500,
                                    'jml_obc'    => $jmlOBC[$i],
                                    'lembur'     => $lembur[$i],
                                    'target'     => $target,
                                    'keterangan' => $keterangan[$i],
                                ]);
                             }
                        // }
                   }
                }

                return redirect()->back()->with('notif','Data Berhasil di Simpan');
            }

            else
                {
                    return abort(404);
                }

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

    public function form_rim(Request $request)
    {
        $profile = profile::all();
        $station_user = profile::where('np_user',Auth::user()->np)
                                ->value('id_station');
        $tglFilter = $request->pilih_tgl;

        if(request()->ajax())
            {
                if(!empty($request->workstation))
                    {
                        $data = profile::where('id_station',$request->workstation)
                                    ->get()
                                    ->sortBy('np_user');
                        // $hvh = verif_pikai::where('np_user',$profile->pluck('np_user'))
                        //                   ->where('tgl_verif',$tglFilter)
                        //                   ->get();
                    }
                else
                    {
                        $data = profile::where('id_station',$station_user);
                    }

                    return datatables()->of($data)
                                        ->addcolumn('np_user','{{$np_user}}<input type="hidden" name="np[]" value="{{$np_user}}">')
                                        ->addcolumn('nama','{{$nama}}<input type="hidden" name="nama[]" value="{{$nama}}">')
                                        ->addcolumn('form_lembar','{!! Form::number("jml_lembar[]",null,["class"=>"form-control text-right","id"=>"jml_lembar[]","placeholder"=>"Jml Lembar "]) !!}')
                                        ->addcolumn('form_lembur','layout.form.input-lembur')
                                        ->addcolumn('form_obc','{!! Form::number("jml_obc[]",null,["class"=>"form-control text-right","id"=>"jml_obc[]","placeholder"=>"Jml OBC "]) !!}')
                                        ->addcolumn('form_keterangan','layout.form.input-keterangan')
                                        ->addcolumn('workstation',function(profile $profile){
                                                return workstation::where('id',$profile->id_station)->value('station');
                                            })
                                        ->rawcolumns(['form_rim','form_lembur','form_lembar','form_obc','form_keterangan','np_user','nama','workstation'])
                                        ->addIndexColumn()
                                        ->skipPaging()
                                        ->make(true);
            }
    }

}
