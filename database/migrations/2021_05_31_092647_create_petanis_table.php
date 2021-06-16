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
            $table->string('nama', 30);
            $table->string('username', 30);
            $table->string('password', 30);
            $table->text('alamat');
            $table->string('kontak', 15);
            $table->string('image');
            $table->bigInteger('id_poktan')->length(20);
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
