<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $table = "reviews";

    public function product()
    {
        return $this->belongsTo('App\Models\Product','product_id','product_id');
    }

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer','customer_id','customer_id');
    }
}
