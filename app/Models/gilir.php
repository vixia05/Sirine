<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gilir extends Model
{
    use HasFactory;
    protected $table = "gilir";
    protected $fillable = ['mesin','created_at','updated_at'];
}
