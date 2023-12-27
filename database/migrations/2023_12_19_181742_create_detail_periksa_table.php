<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPeriksaTable extends Migration
{
    public function up()
    {
        Schema::create('detail_periksas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_periksa');
            $table->unsignedBigInteger('id_obat');
            $table->timestamps();

            // Definisi kunci asing
            $table->foreign('id_periksa')->references('id')->on('periksas')->onDelete('cascade');
            $table->foreign('id_obat')->references('id')->on('obats')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('detail_periksas');
    }
}
