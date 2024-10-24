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
        // dd($purchaseOrders);
        return view('home',['orders'=>$purchaseOrders]);
    }
    public function exportOrders(){
        $res = $this->PurchaseOrderService->exportOrders();
        return $res;
    }
}