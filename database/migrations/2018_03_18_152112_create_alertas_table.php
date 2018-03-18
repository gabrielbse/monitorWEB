<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alertas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('limite_maior_temperatura');
            $table->integer('limite_menor_temperatura');
            $table->integer('limite_maior_umidadea');
            $table->integer('limite_menor_umidade');
            $table->integer('limite_maior_pressao');
            $table->integer('limite_menor_pressao');
            $table->integer('limite_maior_altitude');
            $table->integer('limite_menor_altitude');
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
        Schema::drop('alertas');
    }
}
