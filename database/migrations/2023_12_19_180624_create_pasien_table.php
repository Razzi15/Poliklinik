<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasienTable extends Migration
{
    public function up()
    {
        Schema::create('pasiens', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('alamat');
            $table->string('no_ktp');
            $table->string('no_hp');
            $table->string('no_rm')->unique()->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::table('pasiens', function (Blueprint $table) {
            $table->dropColumn('no_rm');
        });
    }
}
