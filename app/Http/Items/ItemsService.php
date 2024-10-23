<?php

namespace App\Http\Items;

use App\Http\Controllers\Controller;
use App\Http\Items\ItemsRepository;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class ItemsService extends Controller{
    protected $repository;
    public function __construct(ItemsRepository $repository)
    {
        $this->repository = $repository;
    }
    public function addItems(Request $request){
        // dd($request);
        $validator = Validator::make($request->all(),[
            'name' => 'required|string',
            'location' => 'required|string',
            'brand' => 'required|string',
            'category'=> 'required|string',
            'stock_unit'=> 'required|string',
            'price' => 'required|numeric',
            'supplier_id' => 'required',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        if($validator->fails()){
            return ['msg'=>$validator->messages()->first(),'status'=>403];
        }else{
            // dd($request);
            $data = ['item_name'=>$request['name'],
                        'inventory_location'=>$request['location'],
                        'brand'=>$request['brand'],
                        'category'=>$request['category'],
                        'supplier_id'=>$request['supplier_id'],
                        'stock_unit'=>$request['stock_unit'],
                        'unit_price'=>$request['price'],
                    ];

            if($request->hasFile('images'))
            {
                foreach ($request->file('images') as $key => $photo) {
                    $image = $this->handleImageUpload($photo,$key);
                    $images[] = $image;
                }
                $data['item_images'] = $images; 
            }
            $store = $this->repository->storeItem($data);
            if($store){
                return ['msg'=>'Item added Successfully!','status'=>200];
            }else{
                return ['msg'=>'Something Went wrong!','status'=>400];
            }
        }
    }
    private function handleImageUpload($image,$key)
    {
        // image intervention v3
        $path = public_path('items/');
        $thumbPath = public_path('items/thumbnails/');
        $manager = new ImageManager(new Driver());
        $filename = time() . $key . '.' . $image->extension();
        $image->move($path, $filename);
        $thumbImg = $manager->read('items/'.$filename);
        $thumbImg->resize(400, 400);
        $thumbImg->save($thumbPath.$filename);
        return $filename;
    }
    public function getAllItems(){
        return $this->repository->getAllItems();
    }
    public function getItemsWithId($id){
        return $this->repository->getItem($id);
    }
    public function updateItems($request){
        
        $validator = Validator::make($request->all(),[
            'item_no' =>'required',
            'name' => 'required|string',
            'location' => 'required|string',
            'brand' => 'required|string',
            'category'=> 'required|string',
            'stock_unit'=> 'required|string',
            'price' => 'required|numeric',
            'supplier_id' => 'required',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required'
        ]);

        if($validator->fails()){
            return ['msg'=>$validator->messages()->first(),'status'=>403];
        }else{
            // dd($request);
            $data = ['item_no'=>$request['item_no'],
                    'item_name'=>$request['name'],
                    'inventory_location'=>$request['location'],
                    'brand'=>$request['brand'],
                    'category'=>$request['category'],
                    'supplier_id'=>$request['supplier_id'],
                    'stock_unit'=>$request['stock_unit'],
                    'unit_price'=>$request['price'],
                    'status'=>$request['status'],
                ];

            if($request->hasFile('images'))
            {
                $db = $this->repository->getItemImages($data['item_no']);
                // dd($db);
                if (!empty($db->item_images)) {
                    foreach ($db->item_images as $dbImage) {
                        $imagePath = public_path('items/' . $dbImage);
                        $thumbPath = public_path('items/thumbnails/' . $dbImage);
                        if (file_exists($imagePath)) {
                            unlink($imagePath); 
                        }
                        if (file_exists($thumbPath)) {
                            unlink($thumbPath); 
                        }
                    }
                }
                foreach ($request->file('images') as $key => $photo) {
                    $image = $this->handleImageUpload($photo,$key);
                    $images[] = $image;
                }
                $data['item_images'] = $images; 
            }
            $update = $this->repository->updateItem($data);
            if($update){
                return ['msg'=>'Item Updated Successfully!','status'=>200];
            }else{
                return ['msg'=>'Something Went wrong!','status'=>400];
            }
        }
    }
    public function deleteItems($id){
        $status = 0;
        $delete = $this->repository->deleteItems($id,$status);
        if($delete){
            return['msg'=>'Supplier Deleted!','status'=>200];
        }else{
            return ['msg'=>'Something Went wrong!','status'=>400];
        }
    }
    public function getEnabledItems(){
        return $this->repository->getEnabledItems();
    }
}