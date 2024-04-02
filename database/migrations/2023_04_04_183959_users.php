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
        Schema::create('users', function (Blueprint $table) {
            $table->engine="InnoDB";

            $table->id();
            $table->string('email')->unique();
            $table->string('password');
            $table->unsignedBigInteger('state_id');
            $table->unsignedBigInteger('user_type_id');

            $table->foreign('state_id')->references('id')->on('states');
            $table->foreign('user_type_id')->references('id')->on('user_types');
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
        Schema::dropIfExists('users');
    }
};
