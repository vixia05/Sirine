<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use App\Models\privilage;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |---------------------------------------------------------  -----------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        if(Auth::check())
        {
            return redirect()->route('home');
        }
        else
        {
            return view('login');
        }
    }

    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'np' => 'required',
            'password' => 'required',
            ]);


        if(auth()->attempt(array('np' => $input['np'], 'password' => $input['password'])))
        {
            $level = privilage::where('np',Auth::user()->np)
                        ->value('level');

            if ($level === 0)
                {
                    return redirect()->route('home');
                }
            else
                {
                    // dd($level);
                    return redirect()->route('home');
                }
        }

        else
        {
            return redirect()->route('login')
                ->with('error','Akun tidak ditemukan');
        }

    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect()->route('login');
      }
}
