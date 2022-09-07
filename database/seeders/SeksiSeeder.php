<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\seksi;
use Illuminate\Support\Facades\DB;

class SeksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('seksi')->delete();

        $seksi = [
                    ['id' => ' 1', 'seksi' => 'SBU Produk Non Uang', 'created_at' => now()],
                    ['id' => ' 2', 'seksi' => 'Khazanah & Verifikasi Pita Cukai', 'created_at' => now()],
                    ['id' => ' 3', 'seksi' => 'Cetak Pita Cukai', 'created_at' => now()],
                    ['id' => ' 4', 'seksi' => 'Pengiriman Pita Cukai', 'created_at' => now()],
                    ['id' => ' 5', 'seksi' => 'Khazanah & Verifikasi Materai', 'created_at' => now()],
                    ['id' => ' 6', 'seksi' => 'Cetak Materai', 'created_at' => now()],
                    ['id' => ' 7', 'seksi' => 'Khazanah & Verifikasi Paspor', 'created_at' => now()],
                    ['id' => ' 8', 'seksi' => 'Cetak Paspor', 'created_at' => now()],
        ];

        foreach($seksi as $sks){
            seksi::create($sks);
        }
    }
}
