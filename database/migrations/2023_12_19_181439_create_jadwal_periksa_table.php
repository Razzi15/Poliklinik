<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalPeriksaTable extends Migration
{
    public function up()
    {
        Schema::create('jadwal_periksas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_dokter');
            $table->enum('hari', ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu']);
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->timestamps();

            // Definisi kunci asing
            $table->foreign('id_dokter')->references('id')->on('dokters')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('jadwal_periksas');
    }
}
