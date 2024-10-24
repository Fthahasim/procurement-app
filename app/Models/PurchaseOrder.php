<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model{
    protected $fillable = [
        'order_no',
        'order_date',
        'supplier_id',
        'item_total',
        'discount',
        'net_amt',
    ];
    public function supplier(){
        return $this->belongsTo(Supplier::class,'supplier_id','supplier_no');
    }
    public function order_details(){
        return $this->hasMany(PurchaseOrderItem::class, 'purchase_order_id', 'order_no');
        // return $this->hasMany(PurchaseOrderItem::class,'order_no','purchase_order_id');
    }
}