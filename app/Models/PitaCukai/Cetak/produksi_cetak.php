<?php

namespace App\Models\PitaCukai\Cetak;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produksi_cetak extends Model
{
    use HasFactory; 
    protected $table = "produksi_cetak";
    
    protected $fillable = [
        'nomor_po',
        'tanggal',
        'obc',
        'mesin',
        'jumlah_cetak',
        'gilir',
        'petugas1',
        'petugas2',
        'petugas3',
        'petugas4',
        'petugas5',
        'petugas6',
        'petugas7',
        'petugas8',
        'keterangan',
    ];
}
