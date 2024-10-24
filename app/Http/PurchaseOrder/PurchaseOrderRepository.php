<?php

namespace App\Http\PurchaseOrder;

use App\Http\Controllers\Controller;
use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderItem;

class PurchaseOrderRepository extends Controller{
    public function storeOrder($data){
        return PurchaseOrder::create($data);
    }
    public function storeItems($data){
        return PurchaseOrderItem::create($data);
    }
    public function getPurchaseOrder(){
        return PurchaseOrder::with('order_details','supplier')->get();
    }
}    