<?php

namespace App\Http\Supplier;

use App\Http\Controllers\Controller;
use App\Http\Supplier\SupplierRepository;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SupplierService extends Controller{
    protected $repository;
    public function __construct(SupplierRepository $repository)
    {
        $this->repository = $repository;
    }
    public function addSuppliers(Request $request){
        // dd($request);
        $validator = Validator::make($request->all(),[
            'name' => 'required|string',
            'address' => 'required|string',
            'tax_no' => 'required|string',
            'country'=> 'required|string',
            'mobile_no' => 'required|numeric|unique:suppliers',
            'email' => 'required|email|unique:suppliers'
        ]);

        if($validator->fails()){
            return ['msg'=>$validator->messages()->first(),'status'=>403];
        }else{
            // dd($request);
            $data = ['supplier_name'=>$request['name'],
                        'address'=>$request['name'],
                        'tax_no'=>$request['tax_no'],
                        'country'=>$request['country'],
                        'mobile_no'=>$request['mobile_no'],
                        'email'=>$request['email'],
                    ];
            $store = $this->repository->storeSupplier($data);
            if($store){
                return ['msg'=>'Supplier added Successfully!','status'=>200];
            }else{
                return ['msg'=>'Something Went wrong!','status'=>400];
            }
        }
    }
    public function getAllSuppliers(){
        return $this->repository->getAllSuppliers();
    }
    public function getSupplierWithId($id){
        return $this->repository->getSupplier($id);
    }
    public function updateSuppliers($request){
        // dd($request);
        $validator = Validator::make($request->all(),[
            'supplier_no' => 'required',
            'name' => 'required|string',
            'address' => 'required|string',
            'tax_no' => 'required|string',
            'country'=> 'required|string',
            'mobile_no' => 'required|numeric',
            'email' => 'required|email',
            'status'=>'required'
        ]);

        if($validator->fails()){
            return ['msg'=>$validator->messages()->first(),'status'=>403];
        }else{
            $data = ['supplier_no'=>$request['supplier_no'],
                        'supplier_name'=>$request['name'],
                        'address'=>$request['name'],
                        'tax_no'=>$request['tax_no'],
                        'country'=>$request['country'],
                        'mobile_no'=>$request['mobile_no'],
                        'email'=>$request['email'],
                        'status'=>$request['status'],
                    ];
            $update = $this->repository->updateSupplier($data);
            if($update){
                return ['msg'=>'Supplier Updated Successfully!','status'=>200];
            }else{
                return ['msg'=>'Something Went wrong!','status'=>400];
            }
        }
    }
    public function deleteSuppliers($id){
        $status = 'Inactive';
        $delete = $this->repository->deleteSupplier($id,$status);
        if($delete){
            return['msg'=>'Supplier Deleted!','status'=>200];
        }else{
            return ['msg'=>'Something Went wrong!','status'=>400];
        }
    }
    public function getActiveSuppliers(){
        return $this->repository->activeSuppliers();
    }
}