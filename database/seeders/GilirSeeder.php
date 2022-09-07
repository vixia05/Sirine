<?php

namespace Database\Seeders;

use App\Models\gilir;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GilirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gilir')->delete();

        $gilir = [
                    ['id' => '1', 'gilir' => 'Pagi', 'updated_at' => now(), 'created_at' => now()],
                    ['id' => '2', 'gilir' => 'Sore', 'updated_at' => now(), 'created_at' => now()],
                    ['id' => '3', 'gilir' => 'Malam', 'updated_at' => now(), 'created_at' => now()],
                    ['id' => '4', 'gilir' => 'Pagi - Sore', 'updated_at' => now(), 'created_at' => now()],
                    ['id' => '5', 'gilir' => 'Sore - Malam', 'updated_at' => now(), 'created_at' => now()],
                    ['id' => '6', 'gilir' => 'Malam - pagi', 'updated_at' => now(), 'created_at' => now()],
                 ];
        
        foreach ($gilirs as $gilir){
            gilir::create($gilir);
        }
    }
}
