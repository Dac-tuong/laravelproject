<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentModel extends Model
{
    // use HasFactory;
    public $timestamps = false;
    protected $fillable = ['id_phone_comment', 'id_user_comment', 'comment_text', 'rep_comment'];
    protected $primaryKey = 'id_comment';
    protected $table = 'tbl_comments';
}