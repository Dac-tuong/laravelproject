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
        Schema::create('tbl_comments', function (Blueprint $table) {
            $table->increments('id_comment')->unsigned();
            $table->integer('id_phone_comment')->unsigned();
            $table->integer('id_user_comment')->unsigned();
            $table->text('comment_text');
            $table->text('rep_comment');
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
        Schema::dropIfExists('tbl_comments');
    }
};