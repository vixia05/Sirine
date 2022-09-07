<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class privilage extends Model
{
    protected $table = "privilage";
    protected $fillable = ['np','level'];
    use HasFactory;
}
