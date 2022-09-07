<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class workstation extends Model
{
    protected $table = "workstation";
    protected $fillable = ['station','id_seksi','id_unit'];
    use HasFactory;
}
