<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class defect_pikai extends Model
{
    use HasFactory; 
    protected $table = "defect_pikai";
    protected $fillable  = [ 'np_user',
                             'nama_user',
                             'total_retur',
                             'tgl_cek',
                             'holoMiss',
                             'holoScratch',
                             'holoReg',
                             'printBlurTxt',
                             'printBlurImg',
                             'printSmear',
                             'printSpot',
                             'printUnder',
                             'printOver',
                             'colorUnderImg',
                             'colorOverImg',
                             'colorUnderTxt',
                             'colorOverTxt',
                             'colorNonUniform',
                             'colorIncorrect',
                             'cuttingMiss',
                             'appearanceTear',
                             'appearanceFolded',
                             'appearancePlooi',
                             'appearanceHole',
                             'mixedProduct'
                            ];
    protected $casts = [
        'np_user' => 'string'
    ];

    
}
