<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;
    protected $fillable = ['category_name', 'category_name_slug',  'category_status'];
    protected $primaryKey = 'category_id';
    protected $table = 'tbl_category';

    public function products()
    {
        return $this->belongsTo(Product::class, 'categories_product', 'category_id');
    }
}