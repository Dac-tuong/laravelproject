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
        Schema::create('tbl_shopping_cart', function (Blueprint $table) {
            $table->increments('id_cart');
            $table->integer('id_user_cart')->unsigned();
            $table->integer('id_phone_cart')->unsigned();
            $table->integer('name_phone');
            $table->integer(column: 'quantity_add');
            $table->integer(column: 'price');
            $table->integer(column: 'total_price');
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
        Schema::dropIfExists('tbl_shopping_cart');
    }
};
