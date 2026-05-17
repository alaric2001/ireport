<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OurteamSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('ourteam')->insert([
            [
                'id'    => 2,
                'foto'  => '1655787266.jpg',
                'nama'  => 'Kamilia',
                'quote' => 'Istiqomah itu berat, yang ringan mah istirahat',
            ],
            [
                'id'    => 3,
                'foto'  => '1655789569.png',
                'nama'  => 'Hanafi Muammar',
                'quote' => 'Jika memulai karena Allah, maka jangan menyerah karena manusia',
            ],
            [
                'id'    => 4,
                'foto'  => '1655808299.jpg',
                'nama'  => 'Alaric Rasendriya Aniko',
                'quote' => 'Sukses bukan dia yang tidak pernah gagal, Tetapi dia yang menggagalkan kegagalan',
            ],
            [
                'id'    => 5,
                'foto'  => '1655808632.jpg',
                'nama'  => 'Irfan Arifin',
                'quote' => 'Dunia tak lagi sama tak selamanya memihak kita, di saat kita mau berusaha di situlah kebahagiaan akan indah pada waktunya',
            ],
            [
                'id'    => 6,
                'foto'  => '1655808750.jpg',
                'nama'  => 'Raafi Asta',
                'quote' => 'ingat kata tukang parkir, stangnya jangan dikunci',
            ],
        ]);
    }
}
