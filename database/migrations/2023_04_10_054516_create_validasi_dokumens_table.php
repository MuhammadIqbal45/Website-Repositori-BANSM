<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateValidasiDokumensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('validasi_dokumens', function (Blueprint $table) {
            $table->id();
            $table->string('npsn');
            $table->string('dokumen_pakta');
            $table->string('dokumen_berita_acara');
            $table->string('status_rekomendasi');
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
        Schema::dropIfExists('validasi_dokumens');
    }
}
