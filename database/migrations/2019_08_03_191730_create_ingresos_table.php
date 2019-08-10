<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngresosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingresos', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('fecha_ingreso');
            $table->integer('invitacion_id')->unsigned();
            $table->timestamps();



            //relaciones
            $table->foreign('invitacion_id')
                  ->references('id')->on('invitations')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');




        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingresos');
    }
}
