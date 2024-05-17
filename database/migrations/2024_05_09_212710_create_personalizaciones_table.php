<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalizacionesTable extends Migration
{
    public function up()
    {
        Schema::create('personalizaciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('artista_id');
            $table->unsignedBigInteger('mural_id');
            $table->unsignedBigInteger('producto_id');
            $table->text('descripcion')->nullable();
            $table->text('datos_contacto');
            $table->timestamps();

            $table->foreign('artista_id')->references('id')->on('artistas');
            $table->foreign('mural_id')->references('id')->on('murales');
            $table->foreign('producto_id')->references('id')->on('productos');
        });
    }

    public function down()
    {
        Schema::dropIfExists('personalizaciones');
    }
}
