<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasilKuisionersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasil_kuisioners', function (Blueprint $table) {
            $table->bigIncrements('id_hasil');
            $table->bigInteger('id_petani')->length(20);
            $table->bigInteger('id_kuis')->length(20);
            $table->bigInteger('id_penyuluhan')->length(20);
            $table->string('jawabanhar', 2);
            $table->string('jawabanper', 2);
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
        Schema::dropIfExists('hasil_kuisioners');
    }
}
