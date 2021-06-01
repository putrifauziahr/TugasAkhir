<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetanisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('petanis', function (Blueprint $table) {
            $table->bigIncrements('id_petani');
            $table->string('nama');
            $table->string('email');
            $table->string('password');
            $table->string('alamat');
            $table->string('kontak');
            $table->integer('id_poktan')->references('id_poktan')->on('kelompok_tanis');
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
        Schema::dropIfExists('petanis');
    }
}
