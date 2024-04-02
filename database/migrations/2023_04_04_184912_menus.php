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
        Schema::create('menus', function (Blueprint $table) {
            $table->engine="InnoDB";

            $table->id();
            $table->string('title');
            $table->string('route');
            $table->unsignedBigInteger('state_id');
            $table->unsignedBigInteger('menu_type_id');
            
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
            $table->foreign('menu_type_id')->references('id')->on('menu_types')->onDelete('cascade');
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
        Schema::dropIfExists('menus');
    }
};
