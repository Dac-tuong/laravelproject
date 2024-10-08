<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'type'];
    protected $primaryKey = 'matp';
    protected $table = 'devvn_tinhthanhpho'; // Adjust if your table name is different

    public function districts()
    {
        return $this->hasMany(District::class, 'matp', 'matp');
    }
}
