<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentModel extends Model
{
    // use HasFactory;
    public $timestamps = false;
    protected $fillable = ['comment_product_id', 'comment_text', 'id_rating'];
    protected $primaryKey = 'id_comment';
    protected $table = 'tbl_comment';
}
