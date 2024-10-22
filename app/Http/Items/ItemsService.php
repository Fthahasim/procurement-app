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
                $data['item_images'] = json_encode($images,true); 
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
    // public function getAllSuppliers(){
    //     return $this->repository->getAllSuppliers();
    // }
    // public function getSupplierWithId($id){
    //     return $this->repository->getSupplier($id);
    // }
    // public function updateSuppliers($request){
    //     // dd($request);
    //     $validator = Validator::make($request->all(),[
    //         'supplier_no' => 'required',
    //         'name' => 'required|string',
    //         'address' => 'required|string',
    //         'tax_no' => 'required|string',
    //         'country'=> 'required|string',
    //         'mobile_no' => 'required|numeric',
    //         'email' => 'required|email',
    //         'status'=>'required'
    //     ]);

    //     if($validator->fails()){
    //         return ['msg'=>$validator->messages()->first(),'status'=>403];
    //     }else{
    //         $data = ['supplier_no'=>$request['supplier_no'],
    //                     'supplier_name'=>$request['name'],
    //                     'address'=>$request['name'],
    //                     'tax_no'=>$request['tax_no'],
    //                     'country'=>$request['country'],
    //                     'mobile_no'=>$request['mobile_no'],
    //                     'email'=>$request['email'],
    //                     'status'=>$request['status'],
    //                 ];
    //         $update = $this->repository->updateSupplier($data);
    //         if($update){
    //             return ['msg'=>'Supplier Updated Successfully!','status'=>200];
    //         }else{
    //             return ['msg'=>'Something Went wrong!','status'=>400];
    //         }
    //     }
    // }
    // public function deleteSuppliers($id){
    //     $status = 'Inactive';
    //     $delete = $this->repository->deleteSupplier($id,$status);
    //     if($delete){
    //         return['msg'=>'Supplier Deleted!','status'=>200];
    //     }else{
    //         return ['msg'=>'Something Went wrong!','status'=>400];
    //     }
    // }
}