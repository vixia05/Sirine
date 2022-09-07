<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use App\Models\profile;
use App\Models\privilage;
use Illuminate\Http\Request;
use App\Models\defect_pikai;
use App\Models\verifikasi_pikai;

class DefectController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $level = \Helper::call()->level();

        if($level === 0 || $level > 1)
        {
            $defect = defect_pikai::all();

            if (request()->ajax())
              {
                  $data = $defect;

                  return datatables()->of($data)
                                     ->addcolumn('aksi','menu.admin.defect.crud-defect')
                                     ->addcolumn('jenis_defect','menu.admin.defect.tipe-defect')
                                     ->rawcolumns(['aksi','jenis_defect'])
                                     ->addIndexColumn()
                                     ->make(true);
              }

            return view('menu.admin.defect.data-defect',['defect'=>$defect,'level' => $level]);

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
        $level = \Helper::call()->level();
        $auth = Auth::user()->privillege;

        if($level === 0 || $level > 1)
        {
            $defect = defect_pikai::find($id);

            return view('menu.admin.defect.detail-defect',['defect'=>$defect]);

        }
        else
        {
            return abort(404);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $level = \Helper::call()->level();
        if($level === 0 || $level > 1)
        {
            
        }
        else
        {
            return abort(404);
        }
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
        $level = \Helper::call()->level();

        if($level === 0 || $level > 1)
        {
            $deleteDefect = defect_pikai::findorfail($id);
            $deleteDefect->delete();

            return redirect('defect')->with('notif','Data Kelolosan Berhasil di Hapus');
        }
        else
        {
            return abort(404);
        }
    }
}
