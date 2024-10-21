<?php

use App\Http\Items\ItemsController;
use App\Http\Supplier\SupplierController;
use Illuminate\Support\Facades\Route;


// supplier
Route::prefix('supplier')->group(function () {
    Route::any('/', [SupplierController::class, 'index'])->name('supplier.index');
    Route::any('/add', [SupplierController::class, 'addSupplier'])->name('supplier.add');
    Route::any('/edit', [SupplierController::class, 'getSupplierWithId'])->name('supplier.edit');
    Route::any('/update', [SupplierController::class, 'update'])->name('supplier.update');
    Route::any('/delete', [SupplierController::class, 'delete'])->name('supplier.delete');
});

// items
Route::prefix('items')->group(function () {
    Route::any('/', [ItemsController::class, 'index'])->name('items.index');
    Route::any('/add', [ItemsController::class, 'addItems'])->name('items.add');
    // Route::any('/edit', [ItemsController::class, 'getSupplierWithId'])->name('supplier.edit');
    // Route::any('/update', [ItemsController::class, 'update'])->name('supplier.update');
    // Route::any('/delete', [ItemsController::class, 'delete'])->name('supplier.delete');
});

// purchase order
Route::prefix('purchase-order')->group(function () {
    Route::any('/', [SupplierController::class, 'index'])->name('purchase.order.index');
    Route::any('/add', [SupplierController::class, 'addSupplier'])->name('supplier.add');
    Route::any('/edit', [SupplierController::class, 'getSupplierWithId'])->name('supplier.edit');
    Route::any('/update', [SupplierController::class, 'update'])->name('supplier.update');
    Route::any('/delete', [SupplierController::class, 'delete'])->name('supplier.delete');
});