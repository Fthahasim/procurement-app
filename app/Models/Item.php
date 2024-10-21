<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model{
    use SoftDeletes;
    protected $casts = [
        'item_images' => 'array'
    ];
    protected $fillable = [
        'item_no',
        'item_name',
        'inventory_location',
        'brand',
        'category',
        'supplier_id',
        'stock_unit',
        'unit_price',
        'item_images',
        'status',
    ];
    public function supplier(){
        return $this->belongsTo(Item::class);
    }
}