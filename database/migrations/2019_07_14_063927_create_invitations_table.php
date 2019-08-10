<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvitationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invitations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('serial', 20);
            $table->integer('invitado_id')->unsigned();
            $table->string('placa_vehiculo',10)->nullable();
            $table->dateTime('fecha_desde');
            $table->dateTime('fecha_hasta');
            $table->enum('state', array('A','I'));
            $table->integer('frecuencia_id')->unsigned()->unique()->nullable();
            $table->timestamps();

            //relaciones
            $table->foreign('frecuencia_id')
            ->references('id')->on('frecuencias')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            //relaciones
            $table->foreign('invitado_id')
            ->references('id')->on('invitados')
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
        Schema::dropIfExists('invitations');
    }
}
