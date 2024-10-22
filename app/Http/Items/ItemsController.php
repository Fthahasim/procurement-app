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
        // dd(10);
        $suppliers = $this->SupplierService->getActiveSuppliers();
        return view('items', ['suppliers' => $suppliers]);
    }
    public function addItems(Request $request){
        try {
            $res = $this->service->addItems($request);
            return response()->json($res);
        } catch (\Throwable $th) {  
            dd($th);
            return ['msg'=>'Something went Wrong!', 'status' => 500];
        }
    }
    // public function getSupplierWithId(Request $request){
    //     return $this->service->getSupplierWithId($request['id']);
    // }
    // public function update(Request $request){
    //     try {
    //         $res = $this->service->updateSuppliers($request);
    //         return response()->json($res);
    //     } catch (\Throwable $th) {      
    //         return ['msg'=>'Something went Wrong!', 'status' => 500];
    //     }
    // }
    // public function delete(Request $request){
    //     try {
    //         $res = $this->service->deleteSuppliers($request['id']);
    //         return response()->json($res);
    //     } catch (\Throwable $th) {
    //         dd($th);
    //         return ['msg'=>'Something went Wrong!', 'status' => 500];
    //     }
    // }
}