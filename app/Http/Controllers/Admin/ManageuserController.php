<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Auth;
use Session;
use \App\Models\unit;
use \App\Models\seksi;
use \App\Models\profile;
use \App\Models\Station;
use \App\Models\privilage;
use \App\Models\accounts;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class ManageuserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $level = \Helper::call()->level();
        $unit = unit::get()
                    ->sortBy('unit')
                    ->pluck('unit','id');

        $seksi = seksi::get()
                    ->sortBy('seksi')
                    ->pluck('seksi','id');

        $station = Station::get()
                    ->sortBy('station')
                    ->pluck('station','id');

        $profile = profile::all();

        if($level === 0 || $level > 1 && $level !== null)
        {
            if(request()->ajax())
            {
                $data = $profile;

                return datatables()->of($data)
                                    ->addcolumn('aksi','menu.admin.manage_user.crud-user')
                                    ->addcolumn('seksi',function(Profile $profile){
                                           return seksi::where('id',$profile->id_seksi)->value('seksi');
                                        })
                                    ->addcolumn('unit',function(Profile $profile){
                                           return unit::where('id',$profile->id_unit)->value('unit');
                                        })
                                    ->rawcolumns(['seksi','aksi','unit'])
                                    ->addIndexColumn()
                                    ->make(true);
            }
            return view('menu.admin.manage_user.manage-user',['profile' => $profile,'unit'=>$unit,'seksi'=>$seksi,'station'=>$station],compact('profile'));



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
        $level = \Helper::call()->level();

        if($level === 0)
        {
            $role   = \Helper::call()->listLevel();
            $unit   = \Helper::call()->listUnit();
            $seksi  = \Helper::call()->listSeksi();
            $station= \Helper::call()->listStation();
            // dd($role);

            return view('menu.admin.manage_user.tambah-user',[
                'role'  => $role,
                'unit'  => $unit,
                'seksi' => $seksi,
                'station' => $station,
            ]);
        }
        else
        {
            return abort(404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $level = \Helper::call()->level();
        if ($level === 0)
        {
           $validator = $request->validate([
               'nama' => 'required',
               'np' => 'required|max:4',
               'unit' => 'required',
               'password' => 'required|min:8',
               'konfirmasi_password' => 'required|same:password',
               'role' => 'required',
               'email' => 'required',
               'seksi' => 'required',
               'station' => 'required',
               'tglLahir' => 'required',
           ]);


           accounts::updateOrCreate(
            ['np' => $request->np,'nama' => $request->nama,],
            [
            'password' => hash::make($request->password),
            'remember_token' => Str::random(10),
            ]);

            privilage::updateOrCreate(
                ['np' => $request->np],
                ['level' => $request->role,]
            );

            profile::UpdateOrcreate(
                ['np_user' => $request->np,],
            [
                'nama' => $request->nama,
                'email' => $request->email,
                'alamat' => $request->alamat,
                'contact' => $request->contact,
                'id_unit' => $request->unit,
                'id_seksi' => $request->seksi,
                'id_station' => $request->station,
                'tgl_lahir' => $request->tglLahir,
            ]);

        }
        else
        {
            return abort(404);
        }

        return redirect()->back()->withErrors($validator);
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

        if(ajax()->request())
            {
                $profile = profile::find($id);
            }

        if ($level === 0 || $level > 2)
        {
            return view('menu.admin.manage_user.edit-user-profile',compact('profile'));
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
    public function edit(Request $request)
    {
        $where = array('id' => $request->id);
        $user = profile::where($where)->first();

        return Response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $level = \Helper::call()->level();
        $profile = profile::where('id','=',$request->edit_id);
        $nama = $profile->pluck('nama');

        if ($level === 0 || $level > 2)
        {
            $profile->update([
            'nama' => $request->edit_nama,
            'np_user' => $request->edit_np,
            'email' => $request->edit_email,
            'alamat' => $request->edit_alamat,
            'contact' => $request->edit_kontak,
            'id_unit' => $request->edit_unit,
            'id_seksi' => $request->edit_seksi,
            'id_station' => $request->edit_station,
            'tgl_lahir' => $request->edit_tgl_lahir,
            ]);



        }
        else
        {
            return abort(404);
        }
        return redirect('manage-user')->with('pesan', 'data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($np)
    {
        $level = \Helper::call()->level();
        if($level === 0)
        {
         $deleteAccounts = accounts::find($np);

         $deleteAccounts->delete();
        return redirect('manage-user')->with('notif', 'data Berhasil Dihapus');
        }
        else
        {
            return abort(404);
        }
    }
}
