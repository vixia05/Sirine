<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\unit;
use Illuminate\Support\Facades\DB;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('unit')->delete();

        $unit = [
                    ['id' => ' 1', 'unit' => 'SBU Produk Non Uang', 'created_at' => now()],
                    ['id' => ' 2', 'unit' => 'Khazanah Awal Pita Cukai', 'created_at' => now()],
                    ['id' => ' 3', 'unit' => 'Cetak Pita Cukai', 'created_at' => now()],
                    ['id' => ' 4', 'unit' => 'Verifikasi Pita Cukai', 'created_at' => now()],
                    ['id' => ' 5', 'unit' => 'Khazanah Akhir Pita Cuka', 'created_at' => now()],
                    ['id' => ' 6', 'unit' => 'Pengiriman Pita Cukai', 'created_at' => now()],
                    ['id' => ' 7', 'unit' => 'Khazanah Awal Materai', 'created_at' => now()],
                    ['id' => ' 8', 'unit' => 'Cetak Materai', 'created_at' => now()],
                    ['id' => ' 9', 'unit' => 'Khazanah Akhir Materai', 'created_at' => now()],
                    ['id' => '10', 'unit' => 'Khazanah Awal Paspor', 'created_at' => now()],
                    ['id' => '11', 'unit' => 'Cetak Paspor', 'created_at' => now()],
                    ['id' => '12', 'unit' => 'Verifikasi Paspor', 'created_at' => now()],
                    ['id' => '13', 'unit' => 'Khazanah Akhir Paspor', 'created_at' => now()],
        ];

        foreach($unit as $unt){
            unit::create($unt);
        }
    }
}
