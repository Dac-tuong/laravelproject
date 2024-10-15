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
        Schema::create('tbl_order', function (Blueprint $table) {
            $table->increments('id_order')->unsigned();
            $table->string('order_code')->unique();
            $table->string('order_email');
            $table->integer('id_customer')->unsigned();
            $table->integer('shipping_id')->unsigned();
            $table->integer('feeship');
            $table->integer('discount_coupon_id')->unsigned()->nullable();
            $table->integer('order_total');
            $table->integer('order_status');
            $table->string('order_cancellation_reason')->nullable();
            $table->text('order_note')->nullable();
            $table->timestamps();

            $table->foreign('shipping_id')
                ->references('id_shipping')->on('tbl_shipping_address')
                ->onDelete('cascade');
            $table->foreign('id_customer')
                ->references('id_user')->on('tbl_user')
                ->onDelete('cascade');
            $table->foreign('discount_coupon_id')
                ->references('id_coupon')->on('tbl_coupons')
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
        Schema::dropIfExists('tbl_order');
    }
};
