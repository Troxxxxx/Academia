<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJugadoresTable extends Migration
{
    public function up()
    {
        Schema::create('jugadores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->unsignedBigInteger('equipo_id');
            $table->integer('edad')->nullable();
            $table->string('posicion')->nullable();
            $table->string('email')->nullable();
            $table->timestamps();
            
            $table->foreign('equipo_id')->references('id')->on('equipos');
        });
    }

    public function down()
    {
        Schema::dropIfExists('jugadores');
    }
}