<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    // use HasFactory;
    public $timestamps = false;
    protected $fillable = ['order_code', 'order_phone_id', 'image', 'product_name_order', 'color', 'product_price', 'feeship', 'product_sale_quantity'];
    protected $primaryKey = 'id_order_detail';
    protected $table = 'tbl_order_detail';

    public function shippingAddress()
    {
        return $this->belongsTo(ShippingAddress::class, 'shipping_id', 'id_shipping');
    }
}
