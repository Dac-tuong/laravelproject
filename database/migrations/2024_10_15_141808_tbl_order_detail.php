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
        Schema::create('tbl_order_detail', function (Blueprint $table) {
            $table->increments('id_order_detail');
            $table->string('order_code');
            $table->integer('order_phone_id')->unsigned();
            $table->string('image');
            $table->string('product_name_order');
            $table->string('color', 100);
            $table->integer('product_price');
            $table->integer('product_sale_quantity');
            $table->timestamps();

            $table->foreign('order_phone_id')
                ->references('product_id')->on('tbl_phones')
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
        Schema::dropIfExists('tbl_order_detail');
    }
};
