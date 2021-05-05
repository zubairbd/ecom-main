<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
   protected $guarded = [];

    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
}
