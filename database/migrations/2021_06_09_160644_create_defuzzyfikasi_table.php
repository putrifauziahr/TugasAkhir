<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDefuzzyfikasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('defuzzyfikasi', function (Blueprint $table) {
            $table->bigIncrements('id_defuzzy');
            $table->bigInteger('id_fuzzy', 20);
            $table->string('harapan', 12);
            $table->string('persepsi', 12);
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
        Schema::dropIfExists('defuzzyfikasi');
    }
}
