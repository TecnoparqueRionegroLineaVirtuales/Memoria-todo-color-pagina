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
        Schema::create('files', function (Blueprint $table) {
            $table->engine="InnoDB";

            $table->id();
            $table->string('name');
            $table->string('route');
            $table->unsignedBigInteger('category_file_id');
            $table->unsignedBigInteger('state_id');
            $table->unsignedBigInteger('file_type_id');

            $table->foreign('category_file_id')->references('id')->on('category_files')->onDelete('cascade');
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
            $table->foreign('file_type_id')->references('id')->on('file_types')->onDelete('cascade');
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
        Schema::dropIfExists('files');
    }
};
