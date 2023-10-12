<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquiposTable extends Migration
{
    public function up()
    {
        Schema::create('equipos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->unsignedBigInteger('sede_id');
            $table->string('entrenador')->nullable();
            $table->integer('cantidad_jugadores')->default(0);
            $table->timestamps();
            
            $table->foreign('sede_id')->references('id')->on('sedes');
        });
    }

    public function down()
    {
        Schema::dropIfExists('equipos');
    }
}