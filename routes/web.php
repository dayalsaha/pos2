<?php

use App\Http\Controllers\backend\VendorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\WarehouseController;
use App\Models\Warehouse;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('/backend/pos_dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::controller(DashboardController::class)->group(function(){

    Route::get('/admin/dashboard', 'pos_dashboard')->name('pos_dashboard');
    Route::get('/user/logout', 'user_logout')->name('user_logout');

 });

Route::controller(VendorController::class)->group(function(){

    Route::get('/add/vendor', 'add_vendor')->name('add_vendor');
    Route::post('/vendor/store', 'vendor_store')->name('vendor_store');
    Route::get('/view/vendor', 'view_vendor')->name('view_vendor');
    Route::get('/edit/vendor/{vendor_id}', 'edit_vendor')->name('edit_vendor');
    Route::get('/delete/vendor/{vendor_id}', 'delete_vendor')->name('delete_vendor');
    Route::post('/update/vendor', 'update_vendor')->name('update_vendor');

 });

 Route::controller(UnitController::class)->group(function(){

    Route::get('/add/unit', 'add_unit')->name('add_unit');
    Route::post('/store/unit', 'store_unit')->name('store_unit');
    Route::get('/view/unit', 'view_unit')->name('view_unit');
    Route::get('/edit/unit/{unit_id}', 'edit_unit')->name('edit_unit');
    Route::post('/update/unit', 'update_unit')->name('update_unit');
    Route::get('/update/unit/{unit_id}', 'del_unit')->name('del_unit');


 });

 Route::controller(CategoryController::class)->group(function(){

    Route::get('/add/category', 'add_category')->name('add_category');
    Route::post('/store/category', 'store_category')->name('store_category');
    Route::get('/view/category', 'view_category')->name('view_category');
    Route::get('/edit/category/{cat_id}', 'edit_category')->name('edit_category');
    Route::get('/del/category/{cat_id}', 'del_category')->name('del_category');
    Route::post('/update/category', 'update_category')->name('update_category');

 });


 Route::controller(ProductController::class)->group(function(){

    Route::get('/add/product', 'add_product')->name('add_product');
    Route::post('/product/store', 'store_product')->name('store_product');
    Route::get('/view/product', 'view_product')->name('view_product');
    Route::get('/edit/product/{product_id}', 'edit_product')->name('edit_product');
    Route::post('/update/product', 'update_product')->name('update_product');
    Route::get('/delete/product/{product_id}', 'del_product')->name('del_product');

 });


 Route::controller(PurchaseController::class)->group(function(){

    Route::get('/add/purchase', 'add_purchase')->name('add_purchase');
    Route::post('/store/purchase', 'store_purchase')->name('store_purchase');
    Route::get('/list/purchase', 'list_purchase')->name('list_purchase');
    Route::get('/del/purchase/{purchase_id}', 'del_purchase')->name('del_purchase');
    Route::get('/status/purchase/{purchase_id}', 'status_purchase')->name('status_purchase');
    Route::get('/edit/purchase/{purchase_id}', 'edit_purchase')->name('edit_purchase');

 });


 Route::controller(WarehouseController::class)->group(function(){

    Route::get('/add/warehouse', 'add_warehouse')->name('add_warehouse');
    Route::post('/store/warehouse', 'store_warehouse')->name('store_warehouse');
    Route::get('/view/warehouse', 'view_warehouse')->name('view_warehouse');
    Route::get('/view/warehouse/{war_id}', 'del_warehouse')->name('del_warehouse');


 });





