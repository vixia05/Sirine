<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\workstation;
use Illuminate\Support\Facades\DB;

class WorkstationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('workstation')->delete();

        $workstation = [
                    ['id' => ' 1', 'station' => 'Kepala Divisi SBU Produk Non Uang'             , 'id_unit' => '1' , 'id_seksi'=> '1' , 'created_at' => now(), 'updated_at' => now()],
                    ['id' => ' 2', 'station' => 'Kepala Departement Pita Cukai'                 , 'id_unit' => '1' , 'id_seksi'=> '1' , 'created_at' => now(), 'updated_at' => now()],
                    ['id' => ' 3', 'station' => 'Kepala Seksi Khazanah & Verifikasi Pita Cukai' , 'id_unit' => '1' , 'id_seksi'=> '2' , 'created_at' => now(), 'updated_at' => now()],
                    ['id' => ' 4', 'station' => 'Kepala Seksi Cetak Pita Cukai'                 , 'id_unit' => '1' , 'id_seksi'=> '3' , 'created_at' => now(), 'updated_at' => now()],
                    ['id' => ' 5', 'station' => 'Kepala Unit Khazanah Awal Pita Cukai'          , 'id_unit' => '2' , 'id_seksi'=> '2' , 'created_at' => now(), 'updated_at' => now()],
                    ['id' => ' 6', 'station' => 'Kepala Unit Cetak Pita Cukai'                  , 'id_unit' => '3' , 'id_seksi'=> '3' , 'created_at' => now(), 'updated_at' => now()],
                    ['id' => ' 7', 'station' => 'Kepala Unit Verifikasi Pita Cukai'             , 'id_unit' => '4' , 'id_seksi'=> '2' , 'created_at' => now(), 'updated_at' => now()],
                    ['id' => ' 8', 'station' => 'Kepala Unit Khazanah Akhir Pita Cukai'         , 'id_unit' => '5' , 'id_seksi'=> '2' , 'created_at' => now(), 'updated_at' => now()],
                    ['id' => ' 9', 'station' => 'Kepala Unit Pengiriman'                        , 'id_unit' => '6' , 'id_seksi'=> '4' , 'created_at' => now(), 'updated_at' => now()],
                    ['id' => '10', 'station' => 'Admin Seksi Khazanah & Verifikasi Pita Cukai'  , 'id_unit' => '1' , 'id_seksi'=> '2' , 'created_at' => now(), 'updated_at' => now()],
                    ['id' => '11', 'station' => 'Admin Unit Cetak Pita Cukai'                   , 'id_unit' => '3' , 'id_seksi'=> '3' , 'created_at' => now(), 'updated_at' => now()],
                    ['id' => '12', 'station' => 'Admin Unit Khazanah Awal Pita Cukai'           , 'id_unit' => '2' , 'id_seksi'=> '2' , 'created_at' => now(), 'updated_at' => now()],
                    ['id' => '13', 'station' => 'Admin Unit Verifikasi Pita Cukai'              , 'id_unit' => '4' , 'id_seksi'=> '2' , 'created_at' => now(), 'updated_at' => now()],
                    ['id' => '14', 'station' => 'Admin Unit Khazanah Akhir Pita Cukai'          , 'id_unit' => '5' , 'id_seksi'=> '2' , 'created_at' => now(), 'updated_at' => now()],
                    ['id' => '15', 'station' => 'Operator Mesin Inspeksi Pita Cukai'            , 'id_unit' => '4' , 'id_seksi'=> '2' , 'created_at' => now(), 'updated_at' => now()],
                    ['id' => '16', 'station' => 'Kepala Meja Pita Cukai Non-Perekat '           , 'id_unit' => '4' , 'id_seksi'=> '2' , 'created_at' => now(), 'updated_at' => now()],
                    ['id' => '17', 'station' => 'Assistant Kepla Meja PC Non-Perekat '          , 'id_unit' => '4' , 'id_seksi'=> '2' , 'created_at' => now(), 'updated_at' => now()],
                    ['id' => '18', 'station' => 'QC Pita Cukai Non-Perekat ( Team A )'          , 'id_unit' => '4' , 'id_seksi'=> '2' , 'created_at' => now(), 'updated_at' => now()],
                    ['id' => '19', 'station' => 'QC Pita Cukai Non-Perekat ( Team B )'          , 'id_unit' => '4' , 'id_seksi'=> '2' , 'created_at' => now(), 'updated_at' => now()],
                    ['id' => '20', 'station' => 'QC Pita Cukai Non-Perekat ( Team C )'          , 'id_unit' => '4' , 'id_seksi'=> '2' , 'created_at' => now(), 'updated_at' => now()],
                    ['id' => '21', 'station' => 'Kepala Meja Pita Cukai Ber-Perekat '           , 'id_unit' => '4' , 'id_seksi'=> '2' , 'created_at' => now(), 'updated_at' => now()],
                    ['id' => '22', 'station' => 'Assistant Kepla Pita Cukai Ber-Perekat '       , 'id_unit' => '4' , 'id_seksi'=> '2' , 'created_at' => now(), 'updated_at' => now()],
                    ['id' => '23', 'station' => 'QC Pita Cukai Ber-Perekat'                     , 'id_unit' => '4' , 'id_seksi'=> '2' , 'created_at' => now(), 'updated_at' => now()],
                    ['id' => '24', 'station' => 'PIC Pita Cukai Non-Perekat'                    , 'id_unit' => '4' , 'id_seksi'=> '2' , 'created_at' => now(), 'updated_at' => now()],
                    ['id' => '25', 'station' => 'PIC Pita Cukai Ber-Perekat'                    , 'id_unit' => '4' , 'id_seksi'=> '2' , 'created_at' => now(), 'updated_at' => now()],
        ];

        foreach($workstation as $station){
            workstation::create($station);
        }
    }
}
