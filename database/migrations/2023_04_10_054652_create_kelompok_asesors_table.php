<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelompokAsesorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelompok_asesors', function (Blueprint $table) {
            $table->id();
            $table->string('periode');
            $table->string('nama_kelompok');
            $table->string('user_id_sekolah');
            $table->string('user_username_sekolah');
            $table->string('user_email_sekolah');
            $table->string('user_no_telfon_sekolah');
            $table->string('user1_id');
            $table->string('user1_username');
            $table->string('user1_email');
            $table->string('user1_no_telfon');
            $table->string('user2_id');
            $table->string('user2_username');
            $table->string('user2_email');
            $table->string('user2_no_telfon');
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
        Schema::dropIfExists('kelompok_asesors');
    }
}
