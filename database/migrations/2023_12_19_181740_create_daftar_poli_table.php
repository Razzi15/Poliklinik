<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaftarPoliTable extends Migration
{
    public function up()
    {
        Schema::create('daftar_polis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pasien');
            $table->unsignedBigInteger('id_jadwal');
            $table->text('keluhan');
            $table->unsignedBigInteger('no_antrian');
            $table->timestamps();

            // Defixsnisi kunci asing
            $table->foreign('id_pasien')->references('id')->on('pasiens')->onDelete('cascade');
            $table->foreign('id_jadwal')->references('id')->on('jadwal_periksas')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('daftar_polis');
    }
}
