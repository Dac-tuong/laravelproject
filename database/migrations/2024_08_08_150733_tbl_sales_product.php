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
        Schema::create('tbl_SalesProduct', function (Blueprint $table) {
            $table->increments('id_sale');
            $table->integer('id_product');
            $table->string('name_product');
            $table->string('quantity_saled');
            $table->integer('price_product');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_SalesProduct');
    }
};
