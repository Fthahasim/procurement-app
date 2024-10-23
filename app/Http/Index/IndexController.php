<?php

namespace App\Http\Index;

use App\Http\Controllers\Controller;
use App\Http\PurchaseOrder\PurchaseOrderService;

class IndexController extends Controller{
    protected $PurchaseOrderService;
    public function __construct(PurchaseOrderService $PurchaseOrderService)
    {
        $this->PurchaseOrderService = $PurchaseOrderService;
    }
    public function homepage(){
        $purchaseOrders = $this->PurchaseOrderService->getPurchaseOrder();
        return view('home',['orders'=>$purchaseOrders]);
    }
}