<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->string('product_id', 8);
            $table->primary('product_id');

            $table->string('product_name', 50);
            $table->text('product_description');
            $table->text('product_article')->nullable();
            $table->integer('category_id')->unsigned();
            $table->integer('product_price');
            $table->integer('product_weight');
            $table->string('product_image', 50);
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
}
