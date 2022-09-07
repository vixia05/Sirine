<?php

namespace App\Http\Controllers;

use Auth;
use Image;
use Illuminate\Http\Request;
use App\Models\unit;
use App\Models\profile;
use App\Models\accounts;
use App\Models\workstation;
use App\Rules\KonfirmasiPassword;
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{

    public function index()
    {
        $user = Auth::user()->np;
        $profile = profile::where('np_user',$user)->first();
        $unit = unit::where('id',$profile->value('id_unit'))->first();
        $station = workstation::where('id','=',$profile->value('id_station'))->first();
        // dd($unit);
        return view('menu.profile',['unit' => $unit, 'station' => $station],compact('profile'));
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


    public function edit($id)
    {
        //
    }

    public function edit_password()
    {
        $user = Auth::user()->np;
        $accounts = accounts::where('np', $user)->first();
        //dd($profile);
        return view('menu.edit-password',compact('accounts'));
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user()->np;
        $profile = profile::where('np_user', $user)->firstorFail();

        $profile->update($request->all());

        if($request->hasFile('foto')){
    		$foto = $request->file('foto');
    		$filename = time() . '.' . $foto->getClientOriginalExtension();
    		Image::make($foto)->resize(400, 400)->save( public_path('/assets/img/' . $filename ) );

    		$profile->foto = $filename;
    		$profile->save();
    	}

        return redirect('Profile')->with('pesan','Data berhasil di ubah');
    }

    public function password(profile $profile, Request $request)
    {
        $old = $request->old_password;
        $new = $request->password;
        $conf = $request->password_confirmation;

        $request->validate([

            'old_password' => 'required',
            'password' => 'required|min:8|different:old_password',
            'password_confirmation' => 'required|same:password'
        ]);

        $user = accounts::where('np','=',Auth::user()->np)->firstorfail();

        if(Hash::check($old, $user->password))
        {
            $user->update(['password'=>Hash::make($new)]);
        }
        else
        {
            return view('menu.profile',compact('profile'));
        }

        $profile = profile::where('np_user', auth::user()->np)->firstorFail();
        return view('menu.profile',compact('profile'));

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
