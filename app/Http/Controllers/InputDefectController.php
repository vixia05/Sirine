<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\defect_pikai;
use App\Models\privilage;
use App\Models\profile;
use App\Models\defect;
use Auth;

class InputDefectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $level = \Helper::call()->level();
        $profile = profile::all();
        $np_user = $profile->pluck('np_user');
        $category = defect_pikai::get()
                        ->unique('category')
                        ->pluck('category');

        if($level === 0 || $level > 1)
        {
            return view('menu.admin.defect.input-defect2',['profile' => $profile, 'np_user' => $np_user, 'category'=>$category],compact('profile'));
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
        

        $jenis_defect = $request->except(['nama','tglK3']);
        $np     = $request->np;
        $tglCek = $request->tglK3;

        

        // $getdefect = $sumDefect->get();
            //dd($nama);

        for ($i = 0; $i < count($np); $i++){

            $sumDefect =collect($request->holoMiss[$i])->sum()+
                        collect($request->holoScratch[$i])->sum()+
                        collect($request->holoMissRegister[$i])->sum()+
                        collect($request->blurText[$i])->sum()+
                        collect($request->blurImage[$i])->sum()+
                        collect($request->inkSmear[$i])->sum()+
                        collect($request->spotted[$i])->sum()+
                        collect($request->underInk[$i])->sum()+
                        collect($request->overInk[$i])->sum()+
                        collect($request->gambarTipis[$i])->sum()+
                        collect($request->gambarTebal[$i])->sum()+
                        collect($request->textTipis[$i])->sum()+
                        collect($request->textTebal[$i])->sum()+
                        collect($request->nonUniform[$i])->sum()+
                        collect($request->Incorrect[$i])->sum()+
                        collect($request->missCutting[$i])->sum()+
                        collect($request->tear[$i])->sum()+
                        collect($request->folded[$i])->sum()+
                        collect($request->plooi[$i])->sum()+
                        collect($request->hole[$i])->sum()+
                        collect($request->tercampur[$i])->sum();

                        $nama   = profile::where('np_user','=',$np[$i])->value('nama');
             
            defect_pikai::updateOrCreate(
                ['np_user' => $np[$i], 'tgl_cek' => $tglCek[$i]],
                [
                'np_user'           => $np[$i],
                'nama_user'         => $nama,
                'holoMiss'          => $request->holoMiss[$i],
                'holoScratch'       => $request->holoScratch[$i],
                'holoReg'           => $request->holoMissRegister[$i],
                'printBlurTxt'      => $request->blurText[$i],
                'printBlurImg'      => $request->blurImage[$i],
                'printSmear'        => $request->inkSmear[$i],
                'printSpot'         => $request->spotted[$i],
                'printUnder'        => $request->underInk[$i],
                'printOver'         => $request->overInk[$i],
                'colorUnderImg'     => $request->gambarTipis[$i],
                'colorOverImg'      => $request->gambarTebal[$i],
                'colorUnderTxt'     => $request->textTipis[$i],
                'colorOverTxt'      => $request->textTebal[$i],
                'colorNonUniform'   => $request->nonUniform[$i],
                'colorIncorrect'    => $request->Incorrect[$i],
                'cuttingMiss'       => $request->missCutting[$i],
                'appearanceTear'    => $request->tear[$i],
                'appearanceFolded'  => $request->folded[$i],
                'appearancePlooi'   => $request->plooi[$i],
                'appearanceHole'    => $request->hole[$i],
                'mixedProduct'      => $request->tercampur[$i],
                'total_retur'       => $sumDefect,
                ]
            );
            // dd($nama);

        }
        return redirect('input-defect')->with('notif','data berhasil di simpan');
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
}
