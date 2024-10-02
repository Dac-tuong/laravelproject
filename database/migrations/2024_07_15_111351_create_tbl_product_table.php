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
        Schema::create('tbl_product', function (Blueprint $table) {
            $table->increments('product_id')->unsigned();
            $table->string('product_code');
            $table->string('product_name');
            $table->string('name_product_slug');
            $table->string('product_image');
            $table->integer('product_price');
            $table->integer('product_quantity');
            $table->integer('categories_product_id')->unsigned(); // Foreign key must be unsigned
            $table->integer('brand_product_id')->unsigned();      // Foreign key must be unsigned
            $table->integer('product_status');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('categories_product_id')
                ->references('category_id')->on('tbl_category')
                ->onDelete('cascade');

            $table->foreign('brand_product_id')
                ->references('brand_id')->on('tbl_brand')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_product');
    }
};