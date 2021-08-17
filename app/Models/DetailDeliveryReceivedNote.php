<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailDeliveryReceivedNote extends Model
{
    use HasFactory;
    protected $table = "detail_delivery_received_notes";

    public function product()
    {
        return $this->belongsTo('App\Models\Product','product_id','product_id');
    }

    public function deliveryReceivedNote()
    {
        return $this->belongsTo('App\Models\DeliveryReceivedNote','detail_note_id','detail_note_id');
    }
}
