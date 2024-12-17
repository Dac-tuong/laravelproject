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
        Schema::create('tbl_coupons', function (Blueprint $table) {
            $table->increments('id_coupon')->unsigned();
            $table->string('name_coupon');
            $table->string('coupon_code');
            $table->integer('coupon_qty');
            $table->string('coupon_type');
            $table->integer('discount');
            $table->text('customer_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('coupon_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_coupons');
    }
};