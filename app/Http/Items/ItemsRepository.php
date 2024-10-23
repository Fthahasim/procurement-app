<?php

namespace App\Http\Items;

use App\Http\Controllers\Controller;
use App\Models\Item;

class ItemsRepository extends Controller{

    public function storeItem($items){
        return Item::create($items);
    }
    public function getAllItems(){
        return Item::with('supplier')->get(); //paginate(10);
    }
    public function getItem($id){
        return Item::where('item_no',$id)->first();
    }
    public function getItemImages($id){
        return Item::where('item_no',$id)->first('item_images');
    }
    public function updateItem($data){
        return Item::where('item_no',$data['item_no'])->update($data);
    }
    public function deleteItems($id,$status){
        Item::where('item_no', $id)->update(['status' => $status]);
        return Item::where('item_no', $id)->delete();
    }
    public function getEnabledItems(){
        return Item::where('status',true)->get();
    }
}