<?php

namespace App\Http\Items;

use App\Http\Controllers\Controller;
use App\Http\Items\ItemsService;
use App\Http\Supplier\SupplierService;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ItemsController extends Controller{
    protected $service,$SupplierService;
    public function __construct(ItemsService $service,SupplierService $SupplierService)
    {
        $this->service = $service;
        $this->SupplierService = $SupplierService;
    }
    public function index(){
        $suppliers = $this->SupplierService->getActiveSuppliers();
        $items = $this->service->getAllItems();
        return view('items', ['suppliers' => $suppliers, 'items'=>$items]);
    }
    public function addItems(Request $request){
        try {
            $res = $this->service->addItems($request);
            return response()->json($res);
        } catch (\Throwable $th) {  
            return ['msg'=>'Something went Wrong!', 'status' => 500];
        }
    }
    public function getItemsWithId(Request $request){
        return $this->service->getItemsWithId($request['id']);
    }
    public function update(Request $request){
        try {
            $res = $this->service->updateItems($request);
            return response()->json($res);
        } catch (\Throwable $th) {  
            dd($th);    
            return ['msg'=>'Something went Wrong!', 'status' => 500];
        }
    }
    public function delete(Request $request){
        try {
            $res = $this->service->deleteItems($request['id']);
            return response()->json($res);
        } catch (\Throwable $th) {
            dd($th);
            return ['msg'=>'Something went Wrong!', 'status' => 500];
        }
    }
}