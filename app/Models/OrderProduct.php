<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    // use HasFactory;
    public $timestamps = false;
    protected $fillable = ['order_code', 'order_email',  'id_customer', 'shipping_id', 'feeship', 'discount_coupon_id', 'order_total', 'order_status'];
    protected $primaryKey = 'id_order';
    protected $table = 'tbl_order';

    public function shippingAddress()
    {
        return $this->belongsTo(ShippingAddress::class, 'shipping_id', 'id_shipping');
    }

    public function orderDetail()
    {
        return $this->hasMany(OrderDetail::class, 'order_code', 'order_code');
    }
}