<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = [
        'brand_name', 'status',
    ];

    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
}
