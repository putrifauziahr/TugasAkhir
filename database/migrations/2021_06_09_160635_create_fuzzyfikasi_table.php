<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuzzyfikasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fuzzyfikasi', function (Blueprint $table) {
            $table->bigIncrements('id_fuzzy');
            $table->bigInteger('id_hasil', 20);
            $table->string('batasBawahHarapan', 12);
            $table->string('batasTengahHarapan', 12);
            $table->string('batasAtasHarapan', 12);
            $table->string('batasBawahPersepsi', 12);
            $table->string('batasTengahPersepsi', 12);
            $table->string('batasAtasPersepsi', 12);
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
        Schema::dropIfExists('fuzzyfikasi');
    }
}
