@extends('layout')
@section('content')

{{-- content --}}


<div class="container mt-4">
    <div class="items">
        <button type="button" class="btn border" data-bs-toggle="modal" data-bs-target=".addItemsModal">
            Add Items
        </button>
            <!-- modal add supplier -->
        <div class="modal fade addItemsModal" id="addItemsModalId" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-">
                <div class="modal-content">
                    <form action="{{Route('items.add')}}" id="addItemsModalForm">
                        @csrf
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel"><b>Add Items</b></h1>
                            <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="add-items-form">
                                <div class="mb-3">
                                    <label for="itemName" class="form-label">Item Name</label>
                                    <input type="text" class="form-control shadow-none" placeholder="Enter Item name" id="itemName" name="name">
                                </div>
                                <div class="mb-3">
                                    <label for="itemName" class="form-label">Item Images</label>
                                    <input type="file" multiple accept="image.png/image.jpg/image.jpeg" class="form-control shadow-none" id="itemName" name="images[]">
                                </div>
                                <div class="mb-3">
                                    <label for="location" class="form-label">Inventory Location</label>
                                    <input type="text" class="form-control shadow-none" placeholder="Add location" id="location" name="location">
                                </div>
                                <div class="d-flex flex-wrap">
                                    <div class="mb-3 col px-1">
                                        <label for="brand" class="form-label">Brand</label>
                                        <input type="text" class="form-control shadow-none" placeholder="Brand" id="brand" name="brand">
                                    </div>
                                    <div class="mb-3 col px-1">
                                        <label for="category" class="form-label">Category</label>
                                        <input type="text" class="form-control shadow-none" placeholder="Category" id="category" name="category">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="price" class="form-label">Unit Price</label>
                                    <input type="text" class="form-control shadow-none" placeholder="Enter price" id="price" name="price">
                                </div>
                                <div class="mb-3 w-50">
                                    <label for="country" class="form-label">Stock Unit</label>
                                    <select class="form-select shadow-none" id="country" name="stock_unit">
                                        <option selected>Select Type</option>
                                        <option value="Piece">Piece</option>
                                        <option value="Box">Box</option>
                                        <option value="kilogram">kilogram</option>
                                        <option value="Litre">Litre</option>
                                    </select>
                                </div>
                                
                                <div class="mb-3 w-50">
                                    <label for="supplier" class="form-label">Select Supplier</label>
                                    <select class="form-select shadow-none" id="supplier" name="supplier_id">
                                        <option selected>Select supplier</option>
                                        @foreach($suppliers as $supplier)
                                            <option value="{{$supplier->supplier_no}}">{{$supplier->supplier_name}}</option>
                                        @endforeach 
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="px-3 py-1 border-0 rounded bg-proc-primary text-light">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- modal ends -->
    </div>
    <div class="proc-items-table table-responsive mt-3">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col" class="text-center">ITEM NO</th>
                    <th scope="col" class="text-center">IMAGE</th>
                    <th scope="col" class="text-center">ITEM NAME</th>
                    <th scope="col" class="text-center">INV.LOCATION</th>
                    <th scope="col" class="text-center">BRAND</th>
                    <th scope="col" class="text-center">CATEGORY</th>
                    <th scope="col" class="text-center">SUPPLIER</th>
                    <th scope="col" class="text-center">STOCK UNIT</th>
                    <th scope="col" class="text-center">UNIT PRICE</th>
                    <th scope="col" class="text-center">STATUS</th>
                    <th scope="col" class="text-center">ACTION</th>
                </tr>
            </thead>
            <tbody>
                 
            </tbody>
        </table>
    </div>
</div>


@endsection