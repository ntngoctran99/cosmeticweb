<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryReceivedNote extends Model
{
    use HasFactory;
    protected $table = "delivery_received_notes";

    public function detailDeliveryReceivedNote()
    {
        return $this->hasMany('App\Models\DetailDeliveryReceivedNote','detail_note_id','id');
    }

    public function supplier()
    {
        return $this->belongsTo('App\Models\Supplier','supp_id','id');
    }

    public function staff()
    {
        return $this->belongsTo('App\Models\Staff','staff_id','id');
    }
}
