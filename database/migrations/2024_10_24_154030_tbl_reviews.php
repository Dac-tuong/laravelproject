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
        Schema::create('tbl_reviews', function (Blueprint $table) {
            $table->increments('id_review')->unsigned();
            $table->integer('id_phone_review')->unsigned();
            $table->integer('id_user_review')->unsigned();
            $table->text('review_text')->nullable();
            $table->integer('rating');
            $table->timestamps();

            $table->foreign('id_phone_review')
                ->references('product_id')->on('tbl_phones')
                ->onDelete('cascade');
            $table->foreign('id_user_review')->references('id_user')->on('tbl_user')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_reviews');
    }
};
