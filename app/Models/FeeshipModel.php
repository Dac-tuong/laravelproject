<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeshipModel extends Model
{
    public $timestamps = false;
    protected $fillable = ['matp_feeship', 'maqh_feeship', 'xaid_feeship', 'feeship'];
    protected $primaryKey = 'id_feeship';
    protected $table = 'tbl_feeship';
}
