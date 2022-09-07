<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataMmea extends Model
{
    use HasFactory;
    protected $table = 'bulanan_mmea';
    protected $guarded = ['id'];
}
