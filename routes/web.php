<?php

use App\Http\Items\ItemsController;
use App\Http\PurchaseOrder\PurchaseOrderController;
use App\Http\Supplier\SupplierController;
use Illuminate\Support\Facades\Route;

// Route::any('/', [SupplierController::class, 'index'])->name('supplier.index');

// supplier
Route::prefix('supplier')->group(function () {
    Route::get('/', [SupplierController::class, 'index'])->name('supplier.index');
    Route::any('/add', [SupplierController::class, 'addSupplier'])->name('supplier.add');
    Route::any('/edit', [SupplierController::class, 'getSupplierWithId'])->name('supplier.edit');
    Route::any('/update', [SupplierController::class, 'update'])->name('supplier.update');
    Route::any('/delete', [SupplierController::class, 'delete'])->name('supplier.delete');
});

// items
Route::prefix('/items')->group(function () {
    Route::get('/view', [ItemsController::class, 'index'])->name('items.index');
    Route::post('/add', [ItemsController::class, 'addItems'])->name('items.add');
    Route::any('/edit', [ItemsController::class, 'getItemsWithId'])->name('get.items.with.id');
    Route::any('/update', [ItemsController::class, 'update'])->name('items.update');
    Route::any('/delete', [ItemsController::class, 'delete'])->name('items.delete');
});

// purchase order
Route::prefix('purchase-order')->group(function () {
    Route::any('/view', [PurchaseOrderController::class, 'index'])->name('purchase.order.index');
    Route::any('/add', [PurchaseOrderController::class, 'addPurchaseOrder'])->name('purchase.order.add');
    // Route::any('/edit', [PurchaseOrderController::class, 'getSupplierWithId'])->name('purchase.order.edit');
    // Route::any('/update', [PurchaseOrderController::class, 'update'])->name('purchase.order.update');
    // Route::any('/delete', [PurchaseOrderController::class, 'delete'])->name('purchase.order.delete');
});