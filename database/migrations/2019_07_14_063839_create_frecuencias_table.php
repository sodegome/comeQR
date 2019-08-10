<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFrecuenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frecuencias', function (Blueprint $table) {
            $table->increments('id');
            $table->time('hora_desde');
            $table->time('hora_hasta');
            $table->enum('lunes', array('S','N'));
            $table->enum('martes', array('S','N'));
            $table->enum('miercoles', array('S','N'));
            $table->enum('jueves', array('S','N'));
            $table->enum('viernes', array('S','N'));
            $table->enum('sabado', array('S','N'));
            $table->enum('domingo', array('S','N'));
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
        Schema::dropIfExists('frecuencias');
    }
}
