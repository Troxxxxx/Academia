<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jugadores_extranjeros', function (Blueprint $table) {
            $table->id();
            $table->string('nuevo_destino');
            $table->string('nacionalidad');
            $table->string('posicion');
            $table->integer('estatura'); // En centímetros
            $table->integer('edad');
            $table->text('descripcion_carrera');
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
        Schema::dropIfExists('jugadores_extranjeros');
    }
};