@extends('layout')
@section('content')

{{-- content --}}

<div class="container my-4 px-4">
    <div class="d-flex align-items-center">
        <!-- <i class="bi bi-1-circle-fill mx-2 fs-4"></i> -->
        <h5 class="mb-0">Add Purchase Order</h5>
    </div>
    <hr class="my-0 mb-2">

    <div class="purchase-order-data mt-4">
        <form action="{{Route('purchase.order.add')}}" id="addPurchaseOrderForm">
            @csrf
            <div class="form-group row"> 
                <label for="orderDate" class="col-md-2 col-form-label  required text-wrap-balance">Order Date</label>
                <div class="col-md-10">
                    <input type="date" class="form-control shadow-none" required id="orderDate" name="date">
                </div> 
            </div>

            <div class="form-group row mt-3"> 
                <label for="suppliername" class="col-md-2 col-form-label required text-wrap-balance">Select Supplier</label>
                <div class="col-md-10">
                    <select required class="form-select shadow-none" id="suppliername" name="supplier_id">
                        <option selected>Select supplier</option>
                        @foreach($suppliers as $supplier)
                            <option value="{{$supplier->supplier_no}}">{{$supplier->supplier_name}}</option>
                        @endforeach 
                    </select>
                </div> 
            </div>

            {{-- line items --}}

            <div class="mt-3">
                <button class="addOrderItems d-flex align-items-center border-1 bg-light rounded px-2 py-1">
                    <i class="bi bi-plus-circle-fill"></i>
                    <span class="ms-2">Add Items</span>
                </button>
            </div>

            <div id="itemsContainer">
                <div class="add-items-container bg-beige mt-3 py-3 px-4 rounded">
                    <div class="form-group row "> 
                        <label for="itemName" class="col-md-2 col-form-label required text-wrap-balance">Select Item</label>
                        <div class="col-md-10">
                            <select required class="form-select shadow-none" id="itemName" data-route="{{Route('get.items.with.id')}}" name="item_no">
                                <option selected>Select Item</option>
                                @foreach($items as $item)
                                    <option value="{{ $item->item_no }}">{{$item->item_name}}</option>
                                @endforeach 
                            </select>
                        </div> 
                    </div>

                    <div class="item-details mt-3">
                    </div>

                    <div class="items-content mb-3">
                        <div class="form-group row mt-3"> 
                            <label for="packing_unit" class="col-md-2 col-form-label required text-wrap-balance">Packing Unit</label>
                            <div class="col-md-10">
                                <select required class="form-select shadow-none" id="packing_unit" name="packing_unit">
                                    <option selected>Select Unit</option>
                                    <option value="Piece">Piece</option>
                                    <option value="Box">Box</option>
                                    <option value="KiloGram">KiloGram</option>
                                    <option value="Litres">Litres</option>
                                </select>
                            </div> 
                        </div>

                        <div class="d-flex">
                            <div class="form-group col row mt-3 pe-2"> 
                                <label for="itemQty" class="col-md-4 col-form-label required text-wrap-balance">Quantity</label>
                                <div class="col-md-8">
                                    <input required type="number" min="1" class="form-control shadow-none" placeholder="" required id="itemQty" name="quantity">
                                </div> 
                            </div>
                            <div class="form-group col row mt-3 ps-2"> 
                                <label for="discount" class="col-md-4 col-form-label required text-wrap-balance">Discount <small><em>(if any)</em></small></label>
                                <div class="col-md-8">
                                    <input required type="text" class="form-control shadow-none" placeholder="" required id="discount" name="discount">
                                </div> 
                            </div>
                        </div>
                        
                        <div class="d-flex">
                            <div class="form-group col row mt-3 pe-2"> 
                                <label for="itemAmt" class="col-md-4 col-form-label required text-wrap-balance text-secondary">Item Amount</label>
                                <div class="col-md-8">
                                    <input type="text" required readonly class="form-control shadow-none" placeholder="" required id="itemAmt" name="item_amount">
                                </div> 
                            </div>

                            <div class="form-group col row mt-3 ps-2"> 
                                <label for="netAmt" class="col-md-4 col-form-label required text-wrap-balance text-secondary">Net Amount</label>
                                <div class="col-md-8">
                                    <input type="text" required readonly class="form-control shadow-none" placeholder="" required id="netAmt" name="net_amount">
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row mt-3"> 
                <label for="itemTotal" class="col-md-2 col-form-label  required text-wrap-balance">Item Total</label>
                <div class="col-md-10">
                    <input type="text" readonly class="form-control shadow-none" required id="itemTotal" name="item_total">
                </div> 
            </div>

            <div class="form-group row mt-3"> 
                <label for="discounts" class="col-md-2 col-form-label  required text-wrap-balance">Total Discount</label>
                <div class="col-md-10">
                    <input type="text" readonly class="form-control shadow-none" required id="discounts" name="discount_total">
                </div> 
            </div>

            <div class="form-group row mt-3"> 
                <label for="netTotal" class="col-md-2 col-form-label  required text-wrap-balance">Net Total</label>
                <div class="col-md-10">
                    <input type="text" class="form-control shadow-none" required id="netTotal" name="net_total">
                </div> 
            </div>

            <div class="text-end p-3">
                <button type="submit" class="px-3 py-2 border-0 rounded bg-proc-primary text-light">Submit</button>
            </div>
    
        </form>
    </div>
</div>

@endsection