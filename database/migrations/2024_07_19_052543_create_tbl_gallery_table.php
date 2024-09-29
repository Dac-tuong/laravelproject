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
        Schema::create('tbl_gallery', function (Blueprint $table) {
            $table->increments('id_gallery');
            $table->integer('id_sanpham_gallery')->unsigned();
            $table->string('gallery_path');
            $table->timestamps();

            $table->foreign('id_sanpham_gallery')
                ->references('product_id')->on('tbl_product')
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
        Schema::dropIfExists('tbl_gallery');
    }
};
