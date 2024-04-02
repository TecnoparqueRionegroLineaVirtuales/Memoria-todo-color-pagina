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
        Schema::create('products', function (Blueprint $table) {
            $table->engine="InnoDB";
            
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->double('price');
            $table->integer('quantity');
            $table->integer('stock');
            $table->unsignedBigInteger('state_id');
            $table->unsignedBigInteger('file_id');
            $table->unsignedBigInteger('category_product_id');
            
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
            $table->foreign('file_id')->references('id')->on('files')->onDelete('cascade');
            $table->foreign('category_product_id')->references('id')->on('category_products')->onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
};
