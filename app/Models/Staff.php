<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    protected $table='staffs';
    protected $fillable=[
        'fullname',
        'phone_number',
        'gender',
        'birthday',
        'address',
        'email',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id','id');
    }

    public function order()
    {
        return $this->hasMany('App\Models\Order','staff_id','id');
    }

    public function deliveryReceivedNote()
    {
        return $this->hasMany('App\Models\DeliveryReceivedNote','staff_id','id');
    }
}
