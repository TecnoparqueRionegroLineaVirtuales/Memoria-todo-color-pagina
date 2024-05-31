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
            $table->unsignedBigInteger('customizable_product_id');
            $table->unsignedBigInteger('artista_id');
            $table->unsignedBigInteger('mural_id')->nullable();
            $table->text('descripcion')->nullable();
            $table->text('datos_contacto');
            $table->timestamps();

            $table->foreign('customizable_product_id')->references('id')->on('customizable_products')->onDelete('cascade');
            $table->foreign('artista_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('mural_id')->references('id')->on('files')->onDelete('set null');
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
