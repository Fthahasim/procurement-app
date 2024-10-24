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
        return $this->belongsTo(Supplier::class);
    }
    public function Item(){
        return $this->belongsTo(Item::class,'item_id','item_no');
    }
    public function order(){
        // return $this->belongsTo(PurchaseOrder::class);
        return $this->belongsTo(PurchaseOrder::class, 'purchase_order_id');
    }
}