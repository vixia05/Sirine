<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class seksi extends Model
{
    protected $table = "seksi";
    protected $fillable = ['id_seksi','seksi','created_at','updated_at'];
    use HasFactory;
}
