<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KomentarSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('komentar')->insert([
            [
                'id'         => 1,
                'profil_id'  => 6,
                'laporan_id' => 1,
                'nama'       => 'msu',
                'isi'        => 'First',
                'foto'       => '1656001616.jpg',
                'created_at' => '2022-06-26 00:29:34',
                'updated_at' => '2022-06-26 00:29:34',
            ],
            [
                'id'         => 2,
                'profil_id'  => 6,
                'laporan_id' => 1,
                'nama'       => 'msu',
                'isi'        => 's simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.',
                'foto'       => '1656001616.jpg',
                'created_at' => '2022-06-26 02:59:28',
                'updated_at' => '2022-06-26 02:59:28',
            ],
            [
                'id'         => 3,
                'profil_id'  => 7,
                'laporan_id' => 1,
                'nama'       => 'Hanafi',
                'isi'        => 'Gelap bgt ngeri dibegal klo lewat situ malem-malem',
                'foto'       => 'noPP.jpg',
                'created_at' => '2022-06-26 03:38:41',
                'updated_at' => '2022-06-26 03:38:41',
            ],
            [
                'id'         => 5,
                'profil_id'  => 7,
                'laporan_id' => 1,
                'nama'       => 'Hanafi',
                'isi'        => 'tes lagi',
                'foto'       => 'noPP.jpg',
                'created_at' => '2022-06-26 03:41:40',
                'updated_at' => '2022-06-26 07:02:38',
            ],
            [
                'id'         => 6,
                'profil_id'  => 14,
                'laporan_id' => 1,
                'nama'       => 'bro',
                'isi'        => 'Segala sesuatu memiliki kesudahan, yang sudah berakhir biarlah berlalu dan yakinlah semua akan baik-baik saja',
                'foto'       => '1656254730.jpg',
                'created_at' => '2022-06-26 07:46:31',
                'updated_at' => '2022-06-26 07:46:31',
            ],
        ]);
    }
}
