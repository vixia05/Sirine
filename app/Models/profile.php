<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
	protected $table = "profile";
    protected $fillable = [
                            'foto',
                            'nama',
                            'email',
                            'alamat',
                            'contact',
                            'np_user',
                            'tgl_lahir',
                            'id_unit',
                            'id_seksi',
                            'id_station',
                        ];
    use HasFactory;
}
