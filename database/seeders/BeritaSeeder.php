<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BeritaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('berita')->insert([
            [
                'id'           => 4,
                'judul_berita' => 'Harap Bersabar! Ruas Jl HR Rasuna Said Jaksel Ini Masih Rusak',
                'deskripsi'    => 'Jakarta - Badan jalan di Jl HR Rasuna Said ini masih rusak. Terlihat ada lubang di beberapa titik di kawasan dekat proyek LRT di Setiabudi, Kuningan, Jakarta Selatan, ini.',
                'foto'         => '1655817590.jpg',
                'sumber'       => 'https://news.detik.com/berita/d-6127074/harap-bersabar-ruas-jl-hr-rasuna-said-jaksel-ini-masih-rusak',
                'tgl'          => '2022-06-14',
                'user_id'      => null,
                'created_at'   => null,
                'updated_at'   => null,
            ],
            [
                'id'           => 5,
                'judul_berita' => 'Kacau! Baru 2 Jam Jalan Dicor Langsung Hancur Diterobos Warga',
                'deskripsi'    => 'Sebuah unggahan video di Instagram viral. Dalam video itu memperlihatkan sebuah jalan yang disebut baru saja dicor langsung hancur tak berbentuk akibat ulah warga yang nekat menerobos jalanan cor yang masih basah.',
                'foto'         => '1655817842.jpg',
                'sumber'       => 'https://www.suara.com/news/2022/06/14/085444/kacau-baru-2-jam-jalan-dicor-langsung-hancur-diterobos-warga',
                'tgl'          => '2022-06-14',
                'user_id'      => null,
                'created_at'   => null,
                'updated_at'   => null,
            ],
            [
                'id'           => 6,
                'judul_berita' => 'Jalan Semai Rusak Parah, Warga Desak Pemkot Singkawang Segera Lakukan Perbaikan',
                'deskripsi'    => 'Kondisi Jalan Semai yang sudah rusak sejak beberapa tahun lalu dan kini keadaannya semakin parah membuat Warga Kelurahan Sungai Garam Hilir, Kecamatan Singkawang Utara, Kota Singkawang, Kalimantan Barat, mendesak agar Pemkot setempat melakukan perbaikan.',
                'foto'         => '1655817929.jpg',
                'sumber'       => 'https://kalbar.suara.com/read/2022/06/13/231104/jalan-semai-rusak-parah-warga-desak-pemkot-singkawang-segera-lakukan-perbaikan',
                'tgl'          => '2022-06-13',
                'user_id'      => null,
                'created_at'   => null,
                'updated_at'   => null,
            ],
            [
                'id'           => 7,
                'judul_berita' => 'Protes Jalan Rusak, Warga Sumenep Pasang Kotak Amal',
                'deskripsi'    => 'Jalan yang menghubungkan Desa Duko dengan Desa Rubaru, Kecamatan Rubaru, Kabupaten Sumenep rusak parah. Kondisi itu telah lama berlangsung dan tak kunjung mendapat perbaikan dari pemerintah daerah setempat.',
                'foto'         => '1655855808.jpg',
                'sumber'       => 'https://jatim.suara.com/read/2022/06/08/225047/protes-jalan-rusak-warga-sumenep-pasang-kotak-amal',
                'tgl'          => '2022-06-08',
                'user_id'      => null,
                'created_at'   => null,
                'updated_at'   => null,
            ],
        ]);
    }
}
