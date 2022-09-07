<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class verifikasi_pikai extends Model
{
    use HasFactory;
    protected $table = 'Verifikasi_Pikai';
    protected $connection = 'sqlsrv';
}
