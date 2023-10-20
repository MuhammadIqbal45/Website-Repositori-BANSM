<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitasiDokumensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitasi_dokumens', function (Blueprint $table) {
            $table->id();
            $table->string('npsn');
            $table->string('surat_tugas');
            $table->string('berita_acara');
            $table->string('dokumen_individu');
            $table->string('dokumen_kelompok')->nullable();
            $table->string('foto');
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
        Schema::dropIfExists('visitasi_dokumens');
    }
}
