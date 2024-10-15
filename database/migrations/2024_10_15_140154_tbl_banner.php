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
        Schema::create('tbl_banner', function (Blueprint $table) {
            $table->increments('id_banner')->unsigned();
            $table->integer(column: 'id_phones_banner')->unsigned();
            $table->string('name_banner');
            $table->string('banner_image');
            $table->integer('status_banner');
            $table->timestamps();

            $table->foreign('id_phones_banner')
                ->references('product_id')->on('tbl_phones')
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
        Schema::dropIfExists('tbl_banner');
    }
};
