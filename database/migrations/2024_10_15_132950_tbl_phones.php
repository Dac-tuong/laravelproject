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
        Schema::create('tbl_phones', function (Blueprint $table) {
            $table->increments('product_id')->unsigned();
            $table->string('product_code');
            $table->string('product_name');
            $table->string('name_product_slug');
            $table->string('product_image');
            $table->integer('purchase_price'); // Giá nhập hàng
            $table->integer('sale_price'); // Giá bán
            $table->integer('product_quantity');
            $table->integer('categories_product_id')->unsigned(); // Foreign key must be unsigned
            $table->integer('brand_product_id')->unsigned();
            $table->string('product_model', 50); // Mẫu điện thoại (model VARCHAR(50) NOT NULL)
            $table->date('release_date')->nullable(); // Ngày phát hành (release_date DATE)
            $table->string('operating_system', 50); // Hệ điều hành (operating_system VARCHAR(50) NOT NULL)
            $table->string('screen_type', 50)->nullable(); // Loại màn hình (screen_type VARCHAR(50))
            $table->decimal('screen_size', 4, 2)->nullable(); // Kích thước màn hình (screen_size DECIMAL(4,2))
            $table->string('resolution', 50)->nullable(); // Độ phân giải (resolution VARCHAR(50))
            $table->integer('refresh_rate')->nullable(); // Tần số quét màn hình (refresh_rate INT)
            $table->integer('ram')->nullable(); // RAM (ram INT)
            $table->integer('storage')->nullable(); // Bộ nhớ trong (storage INT)
            $table->boolean('expandable_storage')->default(false); // Hỗ trợ thẻ nhớ ngoài (expandable_storage BOOLEAN DEFAULT FALSE)
            $table->integer('battery_capacity')->nullable(); // Dung lượng pin (battery_capacity INT)
            $table->boolean('fast_charging')->default(true); // Hỗ trợ sạc nhanh (fast_charging BOOLEAN DEFAULT TRUE)
            $table->boolean('wireless_charging')->default(false); // Hỗ trợ sạc không dây (wireless_charging BOOLEAN DEFAULT FALSE)
            $table->string('camera_main', 100)->nullable(); // Camera chính (camera_main VARCHAR(100))
            $table->string('camera_main_features', 200)->nullable(); // Tính năng camera chính (camera_main_features VARCHAR(200))
            $table->string('camera_front', 100)->nullable(); // Camera trước (camera_front VARCHAR(100))
            $table->string('camera_front_features', 200)->nullable(); // Tính năng camera trước (camera_front_features VARCHAR(200))
            $table->string('cpu', 100)->nullable(); // Bộ xử lý (cpu VARCHAR(100))
            $table->string('gpu', 100)->nullable(); // Đồ họa (gpu VARCHAR(100))
            $table->string('water_resistance', 50)->nullable(); // Chống nước (water_resistance VARCHAR(50))
            $table->decimal('weight', 5, 2)->nullable(); // Trọng lượng (weight DECIMAL(5,2))
            $table->string('dimensions', 50)->nullable(); // Kích thước (dimensions VARCHAR(50))
            $table->string('sim_type', 20)->nullable(); // Loại SIM (sim_type VARCHAR(20))
            $table->string('connectivity', 200)->nullable(); // Kết nối (connectivity VARCHAR(200))
            $table->string('biometrics', 50)->nullable(); // Công nghệ bảo mật (biometrics VARCHAR(50))
            $table->string('color', 100)->nullable(); // Các tùy chọn màu sắc (color VARCHAR(100))
            $table->string('charging_port', 100)->nullable(); // Các tùy chọn màu sắc ( charging_port VARCHAR(100))
            $table->string('other_connections', 100)->nullable(); // Các công nghệ kết nối khác ( other_connections VARCHAR(100))
            $table->string('wifi_technology', 50)->nullable(); // Công nghệ wifi (wifi_technology INT DEFAULT 0)
            $table->integer('warranty_period')->default(12); // Thời gian bảo hành (warranty_period INT DEFAULT 12 tháng)
            $table->integer('product_status');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('categories_product_id')
                ->references('category_id')->on('tbl_categories')
                ->onDelete('cascade');

            $table->foreign('brand_product_id')
                ->references('brand_id')->on('tbl_phone_brands')
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
        Schema::dropIfExists('tbl_phones');
    }
};