<?php

namespace App\Http\PurchaseOrder;

use App\Exports\PurchaseOrderExport;
use App\Http\Controllers\Controller;
use App\Http\PurchaseOrder\PurchaseOrderRepository;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class PurchaseOrderService extends Controller{

    protected $repository;
    public function __construct(PurchaseOrderRepository $repository)
    {
        $this->repository = $repository;
    }
    public function addPurchaseOrders($request){
        // dd($request);
        $validator = Validator::make($request->all(),[
            'date' => 'required|date',
            'supplier_id' => 'required',
            'item_no' => 'required',
            'item_unitPrice'=> 'required',
            'packing_unit'=> 'required',
            'quantity' => 'required',
            'item_amount' => 'required',
            'discount' => 'nullable',
            'net_amount' => 'required',
            'item_total' => 'required',
            'discount_total' => 'nullable',
            'net_total' => 'required',
        ]);
        if($validator->fails()){
            return ['msg'=>$validator->messages()->first(),'status'=>403];
        }else{
            DB::beginTransaction()
;            $order = ['order_date' => $request['date'],
                        'supplier_id' => $request['supplier_id'],
                        'item_total' => $request['item_total'],
                        'discount' => $request['discount_total'],
                        'net_amt' => $request['net_total'],
                        ];
            $storeOrder = $this->repository->storeOrder($order);
            DB::commit();
            // dd($storeOrder);
            $orderItems = [
                'purchase_order_id' => $storeOrder->id,
                'item_id' => $request->item_no,
                'packing_unit' => $request->packing_unit,
                'unit_price' => $request->item_unitPrice,
                'order_qty' => $request->quantity,
                'item_amount' => $request->item_amount,
                'discount' => $request->discount,
                'net_amount' => $request->net_amount,
            ];

            $storeOrderItems = $this->repository->storeItems($orderItems);
            
            if($storeOrderItems){
                DB::commit();
                return ['msg'=>'Added Purchase Order!','status'=>200];
            }else{
                DB::rollBack();
                return ['msg'=>'Something went Wrong!','status'=>400];
            }
        }
    }
    public function getPurchaseOrder(){
        return $this->repository->getPurchaseOrder();
    }
    public function exportOrders(){
        $data = $this->getPurchaseOrder();
        foreach ($data as  $orders) {
            
            $orderExport[] = ['order_no'=>$orders['order_no'],
                            'order_date'=>$orders['order_date'],
                            'supplier'=>$orders->supplier['supplier_name'],
                            'item_total'=>$orders['item_total'],
                            'discount'=>$orders['discount'],
                            'net_amt'=>$orders['net_amt'],
                            ];
        }
        // dd($orderExport);
        return Excel::download(new PurchaseOrderExport($orderExport), 'orders.xlsx',\Maatwebsite\Excel\Excel::XLSX);
    }
}
