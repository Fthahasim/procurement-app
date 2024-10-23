<?php

namespace App\Http\PurchaseOrder;

use App\Http\Controllers\Controller;
use App\Http\PurchaseOrder\PurchaseOrderService;
use App\Http\Supplier\SupplierService;
use App\Http\Items\ItemsService;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PurchaseOrderController extends Controller{
    protected $service,$SupplierService,$ItemsService;
    public function __construct(PurchaseOrderService $service,SupplierService $SupplierService,ItemsService $ItemsService)
    {
        $this->service = $service;
        $this->SupplierService = $SupplierService;
        $this->ItemsService = $ItemsService;
    }
    public function index(){
        $suppliers = $this->SupplierService->getActiveSuppliers();
        $items = $this->ItemsService->getEnabledItems();
        return view('purchaseOrder', [
            'items' => $items,
            'suppliers' => $suppliers
        ]);
    }
    public function addPurchaseOrder(Request $request){
        try {
            DB::beginTransaction();
            $res = $this->service->addPurchaseOrders($request);
            DB::commit();
            return response()->json($res);
        } catch (\Throwable $th) {  
            DB::rollBack();
            return ['msg'=>'Something went Wrong!', 'status' => 500];
        }
    }
}