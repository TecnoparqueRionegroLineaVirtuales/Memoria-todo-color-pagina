<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalizacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personalizacions', function (Blueprint $table) {
            $table->engine = "InnoDB";

            $table->id();
            $table->unsignedBigInteger('artista_id');
            $table->unsignedBigInteger('mural_id');
            $table->unsignedBigInteger('producto_id');
            $table->text('descripcion')->nullable();
            $table->text('datos_contacto');
            $table->timestamps();

            $table->foreign('artista_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('mural_id')->references('id')->on('files')->onDelete('cascade');
            $table->foreign('producto_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personalizaciones');
    }
}
