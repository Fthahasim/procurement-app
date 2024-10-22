<?php

namespace App\Http\Items;

use App\Http\Controllers\Controller;
use App\Models\Item;

class ItemsRepository extends Controller{

    public function storeItem($items){
        return Item::create($items);
    }
    // public function getAllSuppliers(){
    //     return Supplier::all(); //paginate(10);
    // }
    // public function getSupplier($id){
    //     return Supplier::where('supplier_no',$id)->first();
    // }
    // public function updateSupplier($data){
    //     return Supplier::where('supplier_no',$data['supplier_no'])->update($data);
    // }
    // public function deleteSupplier($id,$status){
    //     Supplier::where('supplier_no', $id)->update(['status' => $status]);
    //     return Supplier::where('supplier_no', $id)->delete();
    // }
}