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
            $table->text('kegiatan');
            $table->text('tempat');
            $table->string('hari', 10);
            $table->date('tanggal');
            $table->string('jam', 30);
            $table->string('pemateri', 50);
            $table->string('peserta', 50);
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
