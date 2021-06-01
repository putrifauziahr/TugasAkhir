<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenyuluhansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penyuluhans', function (Blueprint $table) {
            $table->bigIncrements('id_penyuluhan');
            $table->string('kegiatan');
            $table->string('tempat');
            $table->string('hari');
            $table->string('tanggal');
            $table->string('jam');
            $table->string('pemateri');
            $table->string('peserta');
            $table->text('deskripsi');
            $table->string('image');
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
        Schema::dropIfExists('penyuluhans');
    }
}
