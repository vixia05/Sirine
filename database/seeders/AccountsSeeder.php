<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\accounts;


class AccountsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('accounts')->delete();

        $users = [

            ['np' =>'admin', 'password' => hash::make('admin'), 'nama'=> 'Administrator', 'remember_token' => str::random(15), 'created_at' => now(), 'updated_at' => now()],
            ['np' => '7197', 'password' => hash::make('7197'), 'nama'=> 'Herman Maulana Yusup', 'remember_token' => str::random(15), 'created_at' => now(), 'updated_at' => now()],
            ['np' => '7198', 'password' => hash::make('7198'), 'nama'=> 'Nunung Nurasiah', 'remember_token' => str::random(15), 'created_at' => now(), 'updated_at' => now()],
            ['np' => '7199', 'password' => hash::make('7199'), 'nama'=> 'Riska Kartika Sari', 'remember_token' => str::random(15), 'created_at' => now(), 'updated_at' => now()],
            ['np' => '7202', 'password' => hash::make('7202'), 'nama'=> 'Kartika meta', 'remember_token' => str::random(15), 'created_at' => now(), 'updated_at' => now()],
            ['np' => '7205', 'password' => hash::make('7205'), 'nama'=> 'Wawan Kurnawan', 'remember_token' => str::random(15), 'created_at' => now(), 'updated_at' => now()],
            ['np' => '7206', 'password' => hash::make('7206'), 'nama'=> 'Eddy rismanto', 'remember_token' => str::random(15), 'created_at' => now(), 'updated_at' => now()],
            ['np' => '7418', 'password' => hash::make('7418'), 'nama'=> 'Muridin Akbar', 'remember_token' => str::random(15), 'created_at' => now(), 'updated_at' => now()],
            ['np' => '7423', 'password' => hash::make('7423'), 'nama'=> 'Heni Suhaeni', 'remember_token' => str::random(15), 'created_at' => now(), 'updated_at' => now()],
            ['np' => '7426', 'password' => hash::make('7426'), 'nama'=> 'Aris Hudin', 'remember_token' => str::random(15), 'created_at' => now(), 'updated_at' => now()],
            ['np' => '7437', 'password' => hash::make('7437'), 'nama'=> 'Sandi Pratama ', 'remember_token' => str::random(15), 'created_at' => now(), 'updated_at' => now()],
            ['np' => '7442', 'password' => hash::make('7442'), 'nama'=> 'Fabby Frazasti Fridyan', 'remember_token' => str::random(15), 'created_at' => now(), 'updated_at' => now()],
            ['np' => '7443', 'password' => hash::make('7443'), 'nama'=> 'Agus Nurkomara', 'remember_token' => str::random(15), 'created_at' => now(), 'updated_at' => now()],
            ['np' => 'G715', 'password' => hash::make('G715'), 'nama'=> 'Abudzar Al Ghifari', 'remember_token' => str::random(15), 'created_at' => now(), 'updated_at' => now()],
            ['np' => 'G752', 'password' => hash::make('G752'), 'nama'=> 'Cindy Kania Aprillia', 'remember_token' => str::random(15), 'created_at' => now(), 'updated_at' => now()],
            ['np' => 'G763', 'password' => hash::make('G763'), 'nama'=> 'Sri Rahayu', 'remember_token' => str::random(15), 'created_at' => now(), 'updated_at' => now()],
            ['np' => 'G834', 'password' => hash::make('G834'), 'nama'=> 'Winda Ristika Ratu', 'remember_token' => str::random(15), 'created_at' => now(), 'updated_at' => now()],
            ['np' => 'G840', 'password' => hash::make('G840'), 'nama'=> 'Siti Masitoh', 'remember_token' => str::random(15), 'created_at' => now(), 'updated_at' => now()],
            ['np' => 'G841', 'password' => hash::make('G841'), 'nama'=> 'Desi Nurfitria H.', 'remember_token' => str::random(15), 'created_at' => now(), 'updated_at' => now()],
            ['np' => 'G849', 'password' => hash::make('G849'), 'nama'=> 'Siti Masitoh', 'remember_token' => str::random(15), 'created_at' => now(), 'updated_at' => now()],
            ['np' => 'H006', 'password' => hash::make('H006'), 'nama'=> 'Siti Imaroh Nurfirdha Vamela', 'remember_token' => str::random(15), 'created_at' => now(), 'updated_at' => now()],
            ['np' => 'H028', 'password' => hash::make('H028'), 'nama'=> 'Khanza Sukma S.', 'remember_token' => str::random(15), 'created_at' => now(), 'updated_at' => now()],
            ['np' => 'H066', 'password' => hash::make('H066'), 'nama'=> 'Syaiful Harisudin', 'remember_token' => str::random(15), 'created_at' => now(), 'updated_at' => now()],
            ['np' => 'H071', 'password' => hash::make('H071'), 'nama'=> 'Adithya Indra ', 'remember_token' => str::random(15), 'created_at' => now(), 'updated_at' => now()],
            ['np' => 'H109', 'password' => hash::make('H109'), 'nama'=> 'Wilda Nulaini Salsabila', 'remember_token' => str::random(15), 'created_at' => now(), 'updated_at' => now()],
            ['np' => 'H114', 'password' => hash::make('H114'), 'nama'=> 'Dinda Anandita Faustina', 'remember_token' => str::random(15), 'created_at' => now(), 'updated_at' => now()],
            ['np' => 'H119', 'password' => hash::make('H119'), 'nama'=> 'Yessi Dewi Nastiti', 'remember_token' => str::random(15), 'created_at' => now(), 'updated_at' => now()],
            ['np' => 'H123', 'password' => hash::make('H123'), 'nama'=> 'Ade Muhammad Irfan Zidny', 'remember_token' => str::random(15), 'created_at' => now(), 'updated_at' => now()],
            ['np' => 'H130', 'password' => hash::make('H130'), 'nama'=> 'Nur Aprilianingsih', 'remember_token' => str::random(15), 'created_at' => now(), 'updated_at' => now()],
            ['np' => 'H186', 'password' => hash::make('H186'), 'nama'=> 'Indah Oktora Paramita', 'remember_token' => str::random(15), 'created_at' => now(), 'updated_at' => now()],
            ['np' => 'H190', 'password' => hash::make('H190'), 'nama'=> 'Fifin Fitria Anggraeni', 'remember_token' => str::random(15), 'created_at' => now(), 'updated_at' => now()],
            ['np' => 'H191', 'password' => hash::make('H191'), 'nama'=> 'Dewi Nurhikmawati', 'remember_token' => str::random(15), 'created_at' => now(), 'updated_at' => now()],
            ['np' => 'H192', 'password' => hash::make('H192'), 'nama'=> 'Lisa Herlina', 'remember_token' => str::random(15), 'created_at' => now(), 'updated_at' => now()],
            ['np' => 'H193', 'password' => hash::make('H193'), 'nama'=> 'Dinda Amelia', 'remember_token' => str::random(15), 'created_at' => now(), 'updated_at' => now()],
            ['np' => 'H194', 'password' => hash::make('H194'), 'nama'=> 'Lustanti Yuli Asih', 'remember_token' => str::random(15), 'created_at' => now(), 'updated_at' => now()],
            ['np' => 'H195', 'password' => hash::make('H195'), 'nama'=> 'Lulu Dwi Fauziyyah', 'remember_token' => str::random(15), 'created_at' => now(), 'updated_at' => now()],
            ['np' => 'H196', 'password' => hash::make('H196'), 'nama'=> 'Ine Febrianti', 'remember_token' => str::random(15), 'created_at' => now(), 'updated_at' => now()],
            ['np' => 'H198', 'password' => hash::make('H198'), 'nama'=> 'Nisa Madani', 'remember_token' => str::random(15), 'created_at' => now(), 'updated_at' => now()],
            ['np' => 'H199', 'password' => hash::make('H199'), 'nama'=> 'Delia Octriane', 'remember_token' => str::random(15), 'created_at' => now(), 'updated_at' => now()],
            ['np' => 'H200', 'password' => hash::make('H200'), 'nama'=> 'Putri Elmia Devi', 'remember_token' => str::random(15), 'created_at' => now(), 'updated_at' => now()],
            ['np' => 'I402', 'password' => hash::make('I402'), 'nama'=> 'Delia Harun', 'remember_token' => str::random(15), 'created_at' => now(), 'updated_at' => now()],
            ['np' => 'I403', 'password' => hash::make('I403'), 'nama'=> 'Dian Oktaviani', 'remember_token' => str::random(15), 'created_at' => now(), 'updated_at' => now()],
            ['np' => 'I404', 'password' => hash::make('I404'), 'nama'=> 'Dina Aprilianti', 'remember_token' => str::random(15), 'created_at' => now(), 'updated_at' => now()],
            ['np' => 'I405', 'password' => hash::make('I405'), 'nama'=> 'Fitri Setyorini', 'remember_token' => str::random(15), 'created_at' => now(), 'updated_at' => now()],
            ['np' => 'I406', 'password' => hash::make('I406'), 'nama'=> 'Karlina Ibrahim', 'remember_token' => str::random(15), 'created_at' => now(), 'updated_at' => now()],
            ['np' => 'I407', 'password' => hash::make('I407'), 'nama'=> 'Khairunnisa Hikmayati', 'remember_token' => str::random(15), 'created_at' => now(), 'updated_at' => now()],
            ['np' => 'I409', 'password' => hash::make('I409'), 'nama'=> 'Mia Listiana', 'remember_token' => str::random(15), 'created_at' => now(), 'updated_at' => now()],
            ['np' => 'I411', 'password' => hash::make('I411'), 'nama'=> 'Nafisah Ulfi Fauziyah', 'remember_token' => str::random(15), 'created_at' => now(), 'updated_at' => now()],
            ['np' => 'I412', 'password' => hash::make('I412'), 'nama'=> 'Nur Rahma Alifah', 'remember_token' => str::random(15), 'created_at' => now(), 'updated_at' => now()],
            ['np' => 'I417', 'password' => hash::make('I417'), 'nama'=> 'Devi Mardiana', 'remember_token' => str::random(15), 'created_at' => now(), 'updated_at' => now()],
            ['np' => 'I419', 'password' => hash::make('I419'), 'nama'=> 'Adinda Putri Sabila', 'remember_token' => str::random(15), 'created_at' => now(), 'updated_at' => now()],
            ['np' => 'I420', 'password' => hash::make('I420'), 'nama'=> 'Agus Aziz', 'remember_token' => str::random(15), 'created_at' => now(), 'updated_at' => now()],
            ['np' => 'I421', 'password' => hash::make('I421'), 'nama'=> 'Avrila Wiranti', 'remember_token' => str::random(15), 'created_at' => now(), 'updated_at' => now()],
            ['np' => 'I423', 'password' => hash::make('I423'), 'nama'=> 'Citra afrida sari', 'remember_token' => str::random(15), 'created_at' => now(), 'updated_at' => now()],
            ['np' => 'I424', 'password' => hash::make('I424'), 'nama'=> 'Daffa Pratama Putra', 'remember_token' => str::random(15), 'created_at' => now(), 'updated_at' => now()],
            ['np' => 'I425', 'password' => hash::make('I425'), 'nama'=> 'Dewi Pertiwi', 'remember_token' => str::random(15), 'created_at' => now(), 'updated_at' => now()],
            ['np' => 'I426', 'password' => hash::make('I426'), 'nama'=> 'Dini Andini', 'remember_token' => str::random(15), 'created_at' => now(), 'updated_at' => now()],
            ['np' => 'I427', 'password' => hash::make('I427'), 'nama'=> 'Fauzan Egi Pratomo', 'remember_token' => str::random(15), 'created_at' => now(), 'updated_at' => now()],
            ['np' => 'I428', 'password' => hash::make('I428'), 'nama'=> 'Gusti Arifiyanto', 'remember_token' => str::random(15), 'created_at' => now(), 'updated_at' => now()],
            ['np' => 'I429', 'password' => hash::make('I429'), 'nama'=> 'Haina Apriliani', 'remember_token' => str::random(15), 'created_at' => now(), 'updated_at' => now()],
            ['np' => 'I430', 'password' => hash::make('I430'), 'nama'=> 'Hermansyah', 'remember_token' => str::random(15), 'created_at' => now(), 'updated_at' => now()],
            ['np' => 'I431', 'password' => hash::make('I431'), 'nama'=> 'Iis Kurnia', 'remember_token' => str::random(15), 'created_at' => now(), 'updated_at' => now()],
            ['np' => 'I432', 'password' => hash::make('I432'), 'nama'=> 'Julpi Abdul  Muti', 'remember_token' => str::random(15), 'created_at' => now(), 'updated_at' => now()],
            ['np' => 'I433', 'password' => hash::make('I433'), 'nama'=> 'Marfiana Defi Sari', 'remember_token' => str::random(15), 'created_at' => now(), 'updated_at' => now()],
            ['np' => 'I434', 'password' => hash::make('I434'), 'nama'=> 'Muhamad Rifki', 'remember_token' => str::random(15), 'created_at' => now(), 'updated_at' => now()],
            ['np' => 'I435', 'password' => hash::make('I435'), 'nama'=> 'Nova Rahmatyastuti', 'remember_token' => str::random(15), 'created_at' => now(), 'updated_at' => now()],
            ['np' => 'I437', 'password' => hash::make('I437'), 'nama'=> 'Nuraida Diah W', 'remember_token' => str::random(15), 'created_at' => now(), 'updated_at' => now()],
            ['np' => 'I439', 'password' => hash::make('I439'), 'nama'=> 'Rizky Alfani', 'remember_token' => str::random(15), 'created_at' => now(), 'updated_at' => now()],
            ['np' => 'I440', 'password' => hash::make('I440'), 'nama'=> 'Siska Kusuma Wardani', 'remember_token' => str::random(15), 'created_at' => now(), 'updated_at' => now()],
            ['np' => 'I441', 'password' => hash::make('I441'), 'nama'=> 'Sofia Nurrahayu', 'remember_token' => str::random(15), 'created_at' => now(), 'updated_at' => now()],
            ['np' => 'I442', 'password' => hash::make('I442'), 'nama'=> 'Tri Banda Rahayu', 'remember_token' => str::random(15), 'created_at' => now(), 'updated_at' => now()],
            ['np' => 'I444', 'password' => hash::make('I444'), 'nama'=> 'Zulfikar Hidayatullah', 'remember_token' => str::random(15), 'created_at' => now(), 'updated_at' => now()],
            ['np' => 'I704', 'password' => hash::make('I704'), 'nama'=> 'Roy kenae Junianta', 'remember_token' => str::random(15), 'created_at' => now(), 'updated_at' => now()],
            ['np' => 'I724', 'password' => hash::make('I724'), 'nama'=> 'Indra Putra Riyanto', 'remember_token' => str::random(15), 'created_at' => now(), 'updated_at' => now()],
        ];
        foreach($users as $user){
            accounts::create($user);
        }
    }

  
}
