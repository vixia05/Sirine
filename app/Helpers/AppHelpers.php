<?php

namespace App\Helpers;

use Auth;
use Carbon\Carbon;
use App\Models\unit;
use App\Models\seksi;
use App\Models\workstation;
use App\Models\profile;
use App\Models\privilage;

class AppHelpers
{
    /**
     * Call Authenticate NP
     */

    public function AuthNP()
    {    
        return Auth::user()->np;
    }

    /**
     * Call Authenticate Seksi
     */

    public function AuthSeksi()
    {
        $seksi = profile::where('np_user',Auth::user()->np)
                        ->get()
                        ->pluck('id_seksi');
        return $seksi;
    }

    /**
     * Call Authenticate Unit
     */

    public function AuthUnit()
    {
        $unit = profile::where('np_user',Auth::user()->np)
                        ->get()
                        ->pluck('id_unit');
        return $unit;
    }

    /**
     * Call Authenticate Unit
     */

    public function AuthStation()
    {
        $station = profile::where('np_user',Auth::user()->np)
                        ->get()
                        ->pluck('id_station');
        return $station;
    }

    public function AuthUser()
    {    
        $profile = profile::where('np_user',Auth::user()->np)->firstOrFail();

        return $profile;
    }

    /**
     * Check & Call Level
     */
    
    public function level()
    {
        $checkPriv = privilage::where('np','=',Auth::user()->np)->exists();

        if($checkPriv)
        {
            $level = privilage::where('np',Auth::user()->np)->value('level');
        }
        else
        {
            $level = null;
        }

        return $level;
    }

    public function getMonthRange()
    {
        $range = [carbon::now()->firstOfMonth(),carbon::now()];

        return $range;
    }

    public function listLevel()
    {
        $level = [0 => 'Super User' , 5 => 'Administrator',  1 => 'User', 2 => 'Admin', 3 => 'Kaun' , 4 => 'Kasek', ];

        return $level;
    }

    public function listSeksi()
    {
        $seksi = seksi::pluck('seksi','id');

        return $seksi;
    }
    
    public function listUnit()
    {
        $unit = unit::pluck('unit','id');

        return $unit;
    }

    public function listStation()
    {
        $unit = workstation::pluck('station','id');

        return $unit;
    }
    
    public function Station($level,$seksi,$unit)
    {
        if($level !== null)
        {
          /**
           * Jika Privilage Kaun / Admin Unit
           */
            if($level == 3 || $level == 2)
            {
                if(!empty($seksi) && !empty($unit))
                {
                    $station = workstation::where('id_seksi',$seksi)
                                          ->where('id_unit',$unit)
                                          ->get()
                                          ->pluck('station','id');
                }
                else
                {
                    $station = [];
                }
            }

          /**
           * Jika Privillage Kasek / Admin Kasek
           */
            elseif($level == 4)
            {
                if(!empty($seksi))
                {
                    $station = workstation::where('id_seksi',$seksi)
                                          ->get()
                                          ->pluck('station','id');
                }
                else
                {
                    $station = [];
                }
            }

          /**
           * Jika Privillage SU
           */
            
            elseif($level === 0 || $level == 5 )
            {
                $station = workstation::pluck('station','id');
            }

            return $station;
        }

        else
        {
            //
        }

    }
    
    // public function seksi_auth()
    // {
    //     $id_seksi = $this->profileAuth('id_seksi');
        
    //     return $seksi;
    // }
    
    public static function call()
    {
        return new AppHelpers();
    }
}