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
            $table->string('serialQR', 20);
            $table->string('link_imgQR',255);
            $table->integer('invitado_id')->unsigned();
            $table->string('placa_vehiculo',10)->nullable();
            $table->date('fecha_desde');
            $table->date('fecha_hasta');
            $table->time('hora_desde');
            $table->time('hora_hasta');
            $table->enum('state', array('AC','IC','IN','SA'));
            $table->date('fecha_ingreso')->nullable();
            $table->timestamps();

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
