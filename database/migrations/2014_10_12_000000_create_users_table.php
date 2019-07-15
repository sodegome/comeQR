<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('rol_id')->unsigned();
            $table->integer('casa_id')->unsigned();
            $table->enum('state', array('A','I','N'));
            $table->string('identification',20);
            $table->enum('type_id', array('CED','PAS','RUC'));
            $table->string('cell',20);
            $table->rememberToken();
            $table->timestamps();

            //relaciones 
            $table->foreign('rol_id')
                  ->references('id')->on('rols');

            $table->foreign('casa_id')
                  ->references('id')->on('casas')
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
        Schema::dropIfExists('users');
    }
}
