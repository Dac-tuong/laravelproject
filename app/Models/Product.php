<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'brand',
        'model',
        'release_date',
        'operating_system',
        'screen_type',
        'screen_size',
        'resolution',
        'refresh_rate',
        'ram',
        'storage',
        'expandable_storage',
        'battery_capacity',
        'fast_charging',
        'wireless_charging',
        'camera_main',
        'camera_main_features',
        'camera_front',
        'camera_front_features',
        'cpu',
        'gpu',
        'water_resistance',
        'weight',
        'dimensions',
        'sim_type',
        'connectivity',
        'biometrics',
        'color_options',
        'stock_quantity',
        'warranty_period'
    ];

    protected $primaryKey = 'product_id';
    protected $table = 'tbl_phones';

    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_product_id', 'category_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_product_id', 'brand_id');
    }
    public function galleries()
    {
        return $this->hasMany(Gallery::class, 'id_sanpham_gallery', 'product_id');
    }
}
