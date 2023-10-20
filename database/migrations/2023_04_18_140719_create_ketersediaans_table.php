<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKetersediaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ketersediaans', function (Blueprint $table) {
            $table->id();
            $table->string('tahun');
            $table->string('periode');
            $table->string('file');
            $table->string('file2');
            $table->string('name');
            $table->string('email');
            $table->string('no_telfon');
            $table->string('alamat');
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
        Schema::dropIfExists('ketersediaans');
    }
}
