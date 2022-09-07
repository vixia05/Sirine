<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\privilage;

class PrivilageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('privilage')->delete();

        $levels = [
            ['id' => ' 1', 'np' => '7197', 'level' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => ' 2', 'np' => '7198', 'level' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => ' 3', 'np' => '7199', 'level' => '0', 'created_at' => now(), 'updated_at' => now()],
            ['id' => ' 4', 'np' => '7202', 'level' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => ' 5', 'np' => '7205', 'level' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => ' 6', 'np' => '7206', 'level' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => ' 7', 'np' => '7418', 'level' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => ' 8', 'np' => '7423', 'level' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => ' 9', 'np' => '7426', 'level' => '0', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '10', 'np' => '7437', 'level' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '11', 'np' => '7442', 'level' => '0', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '12', 'np' => '7443', 'level' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '13', 'np' => 'admin','level' => '0', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '14', 'np' => 'ctk',  'level' => '0', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '15', 'np' => 'G715', 'level' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '16', 'np' => 'G719', 'level' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '17', 'np' => 'G752', 'level' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '18', 'np' => 'G763', 'level' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '19', 'np' => 'G834', 'level' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '20', 'np' => 'G840', 'level' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '21', 'np' => 'G841', 'level' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '22', 'np' => 'G849', 'level' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '23', 'np' => 'H006', 'level' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '24', 'np' => 'H028', 'level' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '25', 'np' => 'H066', 'level' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '26', 'np' => 'H071', 'level' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '27', 'np' => 'H109', 'level' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '28', 'np' => 'H114', 'level' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '29', 'np' => 'H119', 'level' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '30', 'np' => 'H120', 'level' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '31', 'np' => 'H123', 'level' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '32', 'np' => 'H130', 'level' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '33', 'np' => 'H186', 'level' => '2', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '34', 'np' => 'H190', 'level' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '35', 'np' => 'H191', 'level' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '36', 'np' => 'H192', 'level' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '37', 'np' => 'H193', 'level' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '38', 'np' => 'H194', 'level' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '39', 'np' => 'H195', 'level' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '40', 'np' => 'H196', 'level' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '41', 'np' => 'H198', 'level' => '2', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '42', 'np' => 'H199', 'level' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '43', 'np' => 'H200', 'level' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '44', 'np' => 'I402', 'level' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '45', 'np' => 'I403', 'level' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '46', 'np' => 'I404', 'level' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '47', 'np' => 'I405', 'level' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '48', 'np' => 'I406', 'level' => '2', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '49', 'np' => 'I407', 'level' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '50', 'np' => 'I409', 'level' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '51', 'np' => 'I411', 'level' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '52', 'np' => 'I412', 'level' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '53', 'np' => 'I417', 'level' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '54', 'np' => 'I419', 'level' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '55', 'np' => 'I420', 'level' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '56', 'np' => 'I421', 'level' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '57', 'np' => 'I423', 'level' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '58', 'np' => 'I424', 'level' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '59', 'np' => 'I425', 'level' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '60', 'np' => 'I426', 'level' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '61', 'np' => 'I427', 'level' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '62', 'np' => 'I428', 'level' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '63', 'np' => 'I429', 'level' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '64', 'np' => 'I430', 'level' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '65', 'np' => 'I431', 'level' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '66', 'np' => 'I432', 'level' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '67', 'np' => 'I433', 'level' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '68', 'np' => 'I434', 'level' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '69', 'np' => 'I435', 'level' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '70', 'np' => 'I437', 'level' => '2', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '71', 'np' => 'I439', 'level' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '72', 'np' => 'I440', 'level' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '73', 'np' => 'I441', 'level' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '74', 'np' => 'I442', 'level' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '75', 'np' => 'I444', 'level' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '76', 'np' => 'I704', 'level' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '77', 'np' => 'I724', 'level' => '1', 'created_at' => now(), 'updated_at' => now()],
        ];

        foreach($levels as $level){
            privilage::create($level);
        }
    }
}
