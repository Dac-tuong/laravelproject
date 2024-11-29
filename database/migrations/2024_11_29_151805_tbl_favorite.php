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
        Schema::create('tbl_favorite', function (Blueprint $table) {
            $table->increments('id_favorite');
            $table->integer('favorite_phone_id')->unsigned();
            $table->integer('favorite_user_id')->unsigned();
            $table->timestamps();

            $table->foreign('favorite_phone_id')
                ->references('product_id')->on('tbl_phones')
                ->onDelete('cascade');
            $table->foreign('favorite_user_id')
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
        Schema::dropIfExists('tbl_favorite');
    }
};
