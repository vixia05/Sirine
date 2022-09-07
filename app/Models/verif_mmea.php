<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class verif_mmea extends Model
{
	protected $table = "verif_mmea";
    protected $attributes  = ['np_user'=>'0','jml_rim'=>0,'tgl_verif'=>0,'lembur'=>0,'keterangan'=>0];
    protected $fillable = ['np_user','nama_user','jml_rim','jml_lembar','jml_obc','tgl_verif','lembur','keterangan','target'];
    public $primarykey = 'id';
    use HasFactory;
}
