<?php

namespace App\Http\Supplier;

use App\Http\Controllers\Controller;
use App\Models\Supplier;

class SupplierRepository extends Controller{

    public function storeSupplier($supplier){
        return Supplier::create($supplier);
    }
    public function getAllSuppliers(){
        return Supplier::all(); //paginate(10);
    }
    public function getSupplier($id){
        return Supplier::where('supplier_no',$id)->first();
    }
    public function updateSupplier($data){
        return Supplier::where('supplier_no',$data['supplier_no'])->update($data);
    }
    public function deleteSupplier($id,$status){
        Supplier::where('supplier_no', $id)->update(['status' => $status]);
        return Supplier::where('supplier_no', $id)->delete();
    }
    public function activeSuppliers(){
        return Supplier::where('status', 'Active')->get();
    }
}