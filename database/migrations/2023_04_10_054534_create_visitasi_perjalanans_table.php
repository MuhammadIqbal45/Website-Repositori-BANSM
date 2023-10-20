<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitasiPerjalanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitasi_perjalanans', function (Blueprint $table) {
            $table->id();
            $table->string('waktu_berangkat');
            $table->string('waktu_tiba');
            $table->string('lokasi_asal');
            $table->string('lokasi_tujuan');
            $table->string('kendaraan');
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
        Schema::dropIfExists('visitasi_perjalanans');
    }
}
