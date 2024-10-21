@extends('layout')
@section('content')

{{-- content --}}

<h1>items</h1>
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
                                    <label for="location" class="form-label">Inventory Location</label>
                                    <input type="text" class="form-control shadow-none" placeholder="Add location" id="location" name="location">
                                </div>
                                <div class="d-flex flex-wrap">
                                    <div class="mb-3 col px-1">
                                        <label for="brand" class="form-label">Brand</label>
                                        <input type="text" class="form-control shadow-none" placeholder="Add Tax no." id="brand" name="brand">
                                    </div>
                                    <div class="mb-3 col px-1">
                                        <label for="category" class="form-label">Category</label>
                                        <input type="text" class="form-control shadow-none" placeholder="@gmail.com" id="category" name="category">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="price" class="form-label">Unit Price</label>
                                    <input type="text" class="form-control shadow-none" placeholder="" id="price" name="price">
                                </div>
                                <div class="mb-3 w-50">
                                    <label for="country" class="form-label">Stock Unit</label>
                                    <select class="form-select shadow-none" id="country" name="country">
                                        <option selected>Select Type</option>
                                        <option value="Piece">Piece</option>
                                        <option value="Box">Box</option>
                                        <option value="kilogram">kilogram</option>
                                        <option value="Litre">Litre</option>
                                    </select>
                                </div>
                                <div class="mb-3 w-50">
                                    <label for="supplier" class="form-label">Select Supplier</label>
                                    <select class="form-select shadow-none" id="supplier" name="supplier">
                                        <option selected>Select Type</option>
                                        <!-- {{dd($suppliers);}}
                                        @foreach($suppliers as $supplier)
                                        <option value="{{supplier['supplier_name']}}">{{supplier['supplier_name']}}</option>
                                        @endforeach -->
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
                <!-- @if(count($suppliers) > 0)
                    @foreach ($suppliers as $supplier)
                        <tr>
                            <th scope="row" class="text-center">{{ $supplier->supplier_no }}</th>
                            <td>{{ $supplier->supplier_name }}</td>
                            <td>{{ $supplier->address }}</td>
                            <td>{{ $supplier->tax_no }}</td>
                            <td>{{ $supplier->country }}</td>
                            <td>{{ $supplier->mobile_no }}</td>
                            <td>{{ $supplier->email }}</td>
                            <td>{{ $supplier->status }}</td>
                            <td>
                                <button type="button" id="editSupplierBtn" class="btn border border-primary" data-supplier="{{Route('supplier.edit')}}" data-id="{{ $supplier->supplier_no }}" data-bs-toggle="modal" data-bs-target=".editSupplierModal">
                                    <i class="bi bi-pencil-square"></i>
                                </button>
                                <button type="button" id="deleteSupplierBtn" class="btn border border-danger" data-route="{{Route('supplier.delete')}}" data-id="{{ $supplier->supplier_no }}">
                                    <i class="bi bi-trash3-fill"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                @else
                <tr col-span="9">No Suppliers Found</tr>
                @endif -->
            </tbody>
        </table>
    </div>
</div>

<!-- modal edit supplier -->
<!-- <div class="modal fade editSupplierModal" id="editSupplierModalId" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-">
        <div class="modal-content">
            <form action="{{Route('supplier.update')}}" id="editSupplierModalForm">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel"><b>Add Supplier</b></h1>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="add-supplier-form">
                        <div class="mb-3">
                            <label for="supplierName" class="form-label">Supplier Name</label>
                            <input type="text" class="form-control shadow-none" placeholder="Enter Supplier name" id="supplierName" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control shadow-none" placeholder="Add Address" id="address" name="address">
                        </div>
                        <div class="mb-3">
                            <label for="tax_no" class="form-label">TAX No.</label>
                            <input type="text" class="form-control shadow-none" placeholder="Add Tax no." id="tax_no" name="tax_no">
                        </div>
                        <div class="d-flex flex-wrap">
                            <div class="mb-3 col px-1">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control shadow-none" placeholder="@gmail.com" id="email" name="email">
                            </div>
                            <div class="mb-3 col px-1">
                                <label for="mobile_no" class="form-label">Mobile No.</label>
                                <input type="text" class="form-control shadow-none" placeholder="" id="mobile_no" name="mobile_no">
                            </div>
                        </div>
                        <div class="mb-3 w-50">
                            <label for="country" class="form-label">Country</label>
                            
                            <select class="form-select shadow-none" id="country" name="country">
                                <option selected>Select Country</option>
                                @foreach($countries as $country)
                                    <option value="{{ $country['country'] }}">{{ $country['country'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 w-50">
                            <label for="country" class="form-label">Status</label>
                            <select class="form-select shadow-none" id="country" name="status">
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                                <option value="Blocked">Blocked</option>
                            </select>
                        </div>
                        <input type="text" name="supplier_no" class="d-none">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="px-3 py-1 border-0 rounded bg-proc-primary text-light">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div> -->
<!-- modal ends -->

@endsection