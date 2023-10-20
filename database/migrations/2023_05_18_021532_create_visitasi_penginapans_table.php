<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitasiPenginapansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitasi_penginapans', function (Blueprint $table) {
            $table->id();
            $table->string('waktu_masuk');
            $table->string('waktu_keluar');
            $table->string('penginapan');
            $table->string('total_biaya');
            $table->string('username');
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
        Schema::dropIfExists('visitasi_penginapans');
    }
}
