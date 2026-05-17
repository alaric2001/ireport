<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('komentar', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('profil_id');
            $table->unsignedBigInteger('laporan_id');
            $table->string('nama');
            $table->text('isi');
            $table->string('foto');
            $table->timestamps();

            $table->foreign('profil_id')->references('id')->on('profile');
            $table->foreign('laporan_id')->references('id')->on('laporan');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('komentar');
    }
};
