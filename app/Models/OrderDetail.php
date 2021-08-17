<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $table = "order_details";

    public function product()
    {
        return $this->belongsTo('App\Models\Product','product_id','product_id');
    }

    public function order()
    {
        return $this->belongsTo('App\Models\Order','order_id','order_id');
    }
}
