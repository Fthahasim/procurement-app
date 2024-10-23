<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model{
    use SoftDeletes;
    protected $fillable = [
        'supplier_no',
        'supplier_name',
        'address',
        'tax_no',
        'country',
        'mobile_no',
        'email',
        'status',
    ];
    public function items(){
        return $this->hasMany(Item::class, 'supplier_id', 'supplier_no');
    }
    public function purchaseOrders(){
        return $this->hasMany(PurchaseOrder::class,'supplier_no','supplier_id');
    }
}