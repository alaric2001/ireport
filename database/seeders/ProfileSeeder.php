<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfileSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('profile')->insert([
            [
                'id'           => 4,
                'nama'         => 'Testing',
                'alamat'       => 'Bogor',
                'tempatLahir'  => 'Jogja',
                'tanggalLahir' => '2021-12-31',
                'foto'         => '1650266591.jpg',
                'pengajuan'    => '-',
                'point'        => 0,
                'user_id'      => 17,
                'created_at'   => '2022-04-17 16:42:51',
                'updated_at'   => '2022-04-17 16:42:51',
            ],
            [
                'id'           => 6,
                'nama'         => 'msu',
                'alamat'       => 'p',
                'tempatLahir'  => 'qwerty',
                'tanggalLahir' => '2022-06-23',
                'foto'         => '1656001616.jpg',
                'pengajuan'    => '',
                'point'        => 0,
                'user_id'      => 19,
                'created_at'   => '2022-04-17 17:19:30',
                'updated_at'   => '2022-04-18 00:23:11',
            ],
            [
                'id'           => 7,
                'nama'         => 'Hanafi',
                'alamat'       => 'Palem resident',
                'tempatLahir'  => 'Batam',
                'tanggalLahir' => '2022-04-01',
                'foto'         => 'noPP.jpg',
                'pengajuan'    => '-',
                'point'        => 0,
                'user_id'      => 20,
                'created_at'   => '2022-04-18 00:26:03',
                'updated_at'   => '2022-04-18 00:26:03',
            ],
            [
                'id'           => 11,
                'nama'         => 'tio',
                'alamat'       => 'Bandung',
                'tempatLahir'  => 'Garut',
                'tanggalLahir' => '2003-01-30',
                'foto'         => 'noPP.jpg',
                'pengajuan'    => '-',
                'point'        => 0,
                'user_id'      => 24,
                'created_at'   => null,
                'updated_at'   => null,
            ],
            [
                'id'           => 14,
                'nama'         => 'bro',
                'alamat'       => 'bogor',
                'tempatLahir'  => 'bojong',
                'tanggalLahir' => '2022-06-26',
                'foto'         => '1656254730.jpg',
                'pengajuan'    => '-',
                'point'        => 0,
                'user_id'      => 27,
                'created_at'   => null,
                'updated_at'   => null,
            ],
        ]);
    }
}
