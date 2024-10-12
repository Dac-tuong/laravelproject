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
        Schema::create('tbl_comment', function (Blueprint $table) {
            $table->increments('id_comment')->unsigned();
            $table->integer('comment_product_id')->unsigned();
            $table->integer('comment_id_customer')->unsigned();
            $table->integer('comment_rating_id')->unsigned();
            $table->text('comment_text');
            $table->timestamps();

            $table->foreign('comment_product_id')
                ->references('product_id')->on('tbl_product')
                ->onDelete('cascade');
            $table->foreign('comment_id_customer')
                ->references('id_user')->on('tbl_user')
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
        Schema::dropIfExists('tbl_comment');
    }
};
