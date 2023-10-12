<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTable extends Migration
{
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->unsignedBigInteger('equipo_id');
            $table->string('cargo')->nullable();
            $table->string('telefono')->nullable();
            $table->timestamps();
            
            $table->foreign('equipo_id')->references('id')->on('equipos');
        });
    }

    public function down()
    {
        Schema::dropIfExists('staff');
    }
}