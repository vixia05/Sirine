<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class evaluation extends Model
{
	protected $table = "evaluation";
    use HasFactory;
    protected $fillable = ['respon_pegawai'];
}
