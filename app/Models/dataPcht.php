<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataPcht extends Model
{
    use HasFactory;
    protected $table = 'bulanan_pcht';
    protected $guarded = ['id'];
}
