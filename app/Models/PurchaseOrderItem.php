<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrderItem extends Model{
    protected $fillable = [
        'purchase_order_id',
        'item_id',
        'packing_unit',
        'unit_price',
        'order_qty',
        'item_amount',
        'discount',
        'net_amount',
    ];
    public function supplier(){
        return $this->belongsTo(Item::class);
    }
}