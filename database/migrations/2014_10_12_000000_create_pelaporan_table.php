<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelaporanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelaporan', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('jenis_pengamatan')->nullable();
            $table->string('lokasi_keamanan')->nullable();
            $table->string('lokasi_diminati')->nullable();
            $table->string('detail_lokasi')->nullable();
            $table->string('kategori')->nullable();
            $table->string('deskripsi_pengamatan')->nullable();
            $table->string('intervensi_dilakukan')->nullable();
            $table->string('tindak_lanjut_potensi_cedera')->nullable();
            $table->string('kegentingan_potensi_cedera')->nullable();

            $table->timestamps();
                        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pelaporan');
    }
}
