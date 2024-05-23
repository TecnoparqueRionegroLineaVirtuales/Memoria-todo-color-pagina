<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AdjustPersonalizacionsForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('personalizacions', function (Blueprint $table) {
            // Elimina la clave foránea existente
            $table->dropForeign(['producto_id']);
            $table->dropColumn('producto_id');

            // Añade la nueva columna y clave foránea
            $table->unsignedBigInteger('customizable_product_id');
            $table->foreign('customizable_product_id')->references('id')->on('customizable_products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('personalizacions', function (Blueprint $table) {
            // Elimina la nueva clave foránea y columna
            $table->dropForeign(['customizable_product_id']);
            $table->dropColumn('customizable_product_id');

            // Restaura la clave foránea original
            $table->unsignedBigInteger('producto_id');
            $table->foreign('producto_id')->references('id')->on('products')->onDelete('cascade');
        });
    }
}