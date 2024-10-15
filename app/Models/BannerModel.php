<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerModel extends Model
{
    // use HasFactory;

    public $timestamps = false;
    protected $fillable = ['name_banner', 'banner_image', 'status_user'];
    protected $primaryKey = 'id_banner';
    protected $table = 'tbl_banner';
}