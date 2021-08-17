<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $fillable=[
        'name',
        'description',
        'unit_price',
        'promotion_price',
        'image',
        'unit',
        'views',
        'type_id',
    ];
    public function typeProduct()
    {
        return $this->belongsTo('App\Models\TypeProduct','type_id','id');
    }

    public function orderDetail()
    {
        return $this->hasMany('App\Models\OrderDetail','product_id','id');
    }

    public function review()
    {
        return $this->hasMany('App\Models\Review','product_id','id');
    }

    public function cart()
    {
        return $this->hasMany('App\Models\Cart','product_id','id');
    }

    public function detailDeliveryReceivedNote()
    {
        return $this->hasMany('App\Models\DetailDeliveryReceivedNote.php','product_id','id');
    }
}
