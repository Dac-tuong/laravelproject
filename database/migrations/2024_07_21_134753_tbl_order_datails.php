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
        Schema::create('tbl_order_details', function (Blueprint $table) {
            $table->increments('id_order_detail');
            $table->string('order_code');
            $table->integer('product_id_order')->unsigned();
            $table->string('product_name_order');
            $table->integer('product_price');
            $table->integer('product_sale_quantity');
            $table->timestamps();

            $table->foreign('product_id_order')
                ->references('product_id')->on('tbl_product')
                ->onDelete('cascade');
            $table->foreign('order_code')->references('order_code')->on('tbl_order')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_order_details');
    }
};