<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Pelaporan::create(
            [
                "name" => 'Arif Permadi',
                "jenis_pengamatan" => "Keselamatan Kerja",
                "lokasi_keamanan" => "Aman",
                "lokasi_diminati" => "Gedung B",
                "detail_lokasi" => "testing",
                "kategori" => "Terjepit",
                "deskripsi_pengamatan" => "testing",
                "intervensi_dilakukan" => "testing",
                "tindak_lanjut_potensi_cedera" => "Efek sedang yang bersifat tetap",
                "kegentingan_potensi_cedera" => "Tidak Genting"
            ]
        );
    }
}
