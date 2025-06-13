<?php

use App\Models\Invent;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\ProductsList;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ProductListController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
     Route::get('/products/search', [ProductListController   ::class, 'search'])->name('products.search'); // Thêm dòng này
    Route::model('product', \App\Models\ProductsList::class);
    Route::resource('invent', InventController::class,['except' => ['show']]);
    Route::resource('products', ProductListController::class,['except' => ['show']]);
    Route::resource('suppliers', SupplierController::class,['except' => ['show']]);

    // Route Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // Home dashboard

    Route::get('/products/search', [ProductListController   ::class, 'search'])->name('products.search'); // Thêm dòng này
    Route::get('/suppliers/search', [SupplierController::class, 'search'])->name('suppliers.search');
    Route::get('/invent/search', [InventController::class, 'search'])->name('inventory.search');

    Route::get('/inventory', [App\Http\Controllers\InventController::class, 'report'])->name('invent.report');
    Route::get('/invent/import', [App\Http\Controllers\InventController::class, 'index'])->name('invent.import');
Route::match(['get', 'post'], '/invent/export', [InventController::class, 'export'])->name('invent.export');

    Route::get('/', function () {
    $productCount = ProductsList::count();
    $supplierCount = Supplier::count();
    $totalInventory = Invent::sum('quantity');

    return view('welcome', compact('productCount', 'supplierCount', 'totalInventory'));
    });
    Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('products', ProductListController::class)->only(['create', 'store', 'edit', 'update', 'destroy']);
    Route::resource('suppliers', SupplierController::class)->only(['create', 'store', 'edit', 'update', 'destroy']);
    });
    Route::middleware('is_admin')->group(function () {

});
    Route::get('/invent/export-report', [InventController::class, 'exportReport'])->name('invent.exportReport');



});
