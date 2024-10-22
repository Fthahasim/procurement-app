<?php

namespace App\Http\Supplier;

use App\Http\Controllers\Controller;
use App\Http\Supplier\SupplierService;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SupplierController extends Controller{
    protected $service;
    public function __construct(SupplierService $service)
    {
        $this->service = $service;
    }
    public function index(){
        $client = new Client();
        $response = $client->request('GET', 'https://countriesnow.space/api/v0.1/countries');
        $countries = json_decode($response->getBody()->getContents(), true);

        $suppliers = $this->service->getAllSuppliers();
        return view('supplier', [
            'countries' => $countries['data'],
            'suppliers' => $suppliers
        ]);
    }
    public function addSupplier(Request $request){
        try {
            $res = $this->service->addSuppliers($request);
            return response()->json($res);
        } catch (\Throwable $th) {  
            return ['msg'=>'Something went Wrong!', 'status' => 500];
        }
    }
    public function getSupplierWithId(Request $request){
        return $this->service->getSupplierWithId($request['id']);
    }
    public function update(Request $request){
        try {
            $res = $this->service->updateSuppliers($request);
            return response()->json($res);
        } catch (\Throwable $th) {  
            return ['msg'=>'Something went Wrong!', 'status' => 500];
        }
    }
    public function delete(Request $request){
        try {
            $res = $this->service->deleteSuppliers($request['id']);
            return response()->json($res);
        } catch (\Throwable $th) {
            return ['msg'=>'Something went Wrong!', 'status' => 500];
        }
    }
}