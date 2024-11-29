<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriteModel extends Model
{
    public $timestamps = true;
    protected $fillable = ['favorite_phone_id', 'favorite_user_id'];
    protected $primaryKey = 'id_favorite';
    protected $table = 'tbl_favorite';
}
