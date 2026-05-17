<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('laporan', function (Blueprint $table) {
            $table->id();
            $table->string('provinsi')->nullable();
            $table->string('alamat');
            $table->string('foto')->nullable();
            $table->text('keterangan');
            $table->unsignedBigInteger('user_id');
            $table->integer('vote')->nullable();
            $table->string('status_pengiriman')->nullable();
            $table->string('kategori')->nullable();
            $table->foreignId('kategori_id')->nullable()->constrained('kategori')->nullOnDelete();
            $table->timestamps();
            $table->date('tanggal');

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('laporan');
    }
};
