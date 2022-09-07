<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use App\Models\privilage;
use Illuminate\Http\Request;

class Administrator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $level = privilage::where('np',Auth::user()->np)
                    ->value('level');

        if($level == 0){
            return  $next($request);
        }

        return redirect('home')->with('error',"Kamu Tidak Memiliki Akses Ini");
    }
}
