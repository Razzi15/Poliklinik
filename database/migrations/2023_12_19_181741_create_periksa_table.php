<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeriksaTable extends Migration
{
    public function up()
    {
        Schema::create('periksas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_daftar_poli');
            $table->date('tgl_periksa');
            $table->text('catatan');
            $table->integer('biaya_periksa');
            $table->timestamps();

            // Definisi kunci asing
            $table->foreign('id_daftar_poli')->references('id')->on('daftar_polis')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('periksas');
    }
}
