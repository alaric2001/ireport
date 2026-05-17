<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LaporanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('laporan')->insert([
            [
                'id'                => 1,
                'provinsi'          => 'JAWA TIMUR',
                'alamat'            => 'Mojokerto Kabupaten',
                'foto'              => '1653806527.jpg',
                'keterangan'        => 'Parahhh beut nihh genangan airnya, keknya gorong"nya harus dibersihin',
                'user_id'           => 17,
                'vote'              => 2,
                'status_pengiriman' => null,
                'kategori'          => 'Penerangan jalan',
                'kategori_id'       => null,
                'created_at'        => null,
                'updated_at'        => '2022-06-25 23:04:43',
                'tanggal'           => '2022-03-19',
            ],
            [
                'id'                => 5,
                'provinsi'          => 'JAWA TIMUR',
                'alamat'            => 'Mojokerto Barat',
                'foto'              => '1655475659.jpg',
                'keterangan'        => 'Bolongannya dalem bgt nihh, bisa" bikin kecelakaan yg parah',
                'user_id'           => 19,
                'vote'              => 1,
                'status_pengiriman' => null,
                'kategori'          => 'Penerangan jalan',
                'kategori_id'       => null,
                'created_at'        => null,
                'updated_at'        => '2022-06-25 23:05:30',
                'tanggal'           => '2022-03-31',
            ],
            [
                'id'                => 7,
                'provinsi'          => 'JAWA TIMUR',
                'alamat'            => 'Mojokerto Kota',
                'foto'              => '1649220024.jpg',
                'keterangan'        => 'Segera perbaiki dong pak hehe',
                'user_id'           => 20,
                'vote'              => 3,
                'status_pengiriman' => null,
                'kategori'          => 'Jalan Raya',
                'kategori_id'       => null,
                'created_at'        => null,
                'updated_at'        => '2022-06-25 23:05:40',
                'tanggal'           => '2022-04-03',
            ],
            [
                'id'                => 10,
                'provinsi'          => 'JAWA TIMUR',
                'alamat'            => 'pusat mojokerto',
                'foto'              => '1650255347.jpg',
                'keterangan'        => 'lampu jalannya mo roboh',
                'user_id'           => 24,
                'vote'              => 1,
                'status_pengiriman' => null,
                'kategori'          => 'Penerangan jalan',
                'kategori_id'       => null,
                'created_at'        => '2022-04-05 03:27:55',
                'updated_at'        => '2022-06-25 23:05:33',
                'tanggal'           => '2022-04-05',
            ],
            [
                'id'                => 11,
                'provinsi'          => 'JAWA TIMUR',
                'alamat'            => 'Kab. Mojokerto',
                'foto'              => '1650244880.jpg',
                'keterangan'        => 'Banyak bolongan jalannya',
                'user_id'           => 17,
                'vote'              => 1,
                'status_pengiriman' => null,
                'kategori'          => 'Jalan Raya',
                'kategori_id'       => null,
                'created_at'        => '2022-04-17 18:21:20',
                'updated_at'        => '2022-06-25 23:05:43',
                'tanggal'           => '2022-04-18',
            ],
            [
                'id'                => 13,
                'provinsi'          => 'JAWA BARAT',
                'alamat'            => 'Bogor kota',
                'foto'              => '1653805052.jpg',
                'keterangan'        => 'Bolong trotoarnya',
                'user_id'           => 19,
                'vote'              => 1,
                'status_pengiriman' => null,
                'kategori'          => 'Trotoar',
                'kategori_id'       => null,
                'created_at'        => '2022-05-28 23:17:32',
                'updated_at'        => '2022-06-25 23:05:47',
                'tanggal'           => '2022-05-02',
            ],
        ]);
    }
}
