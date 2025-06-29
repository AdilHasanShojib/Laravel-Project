<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
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

Route::get('/',[HomeController::class,'home']);

Route::get('/dashboard',[HomeController::class, 'home'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// ✅ Admin-only routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
    Route::get('view_category', [AdminController::class, 'view_category']);
    Route::post('add_category', [AdminController::class, 'add_category']);
    Route::get('delete_category/{id}', [AdminController::class, 'delete_category']);
    Route::get('edit_category/{id}', [AdminController::class, 'edit_category']);
    Route::post('update_category/{id}', [AdminController::class, 'update_category']);
    Route::get('add_product', [AdminController::class, 'add_product']);
    Route::post('upload_product', [AdminController::class, 'upload_product']);
    Route::get('view_product', [AdminController::class, 'view_product']);
    Route::get('delete_product/{id}', [AdminController::class, 'delete_product']);
    Route::get('edit_product/{slug}', [AdminController::class, 'edit_product']);
    Route::post('update_product/{id}', [AdminController::class, 'update_product']);
    Route::get('search_product', [AdminController::class, 'search_product']);
    Route::get('view_orders', [AdminController::class, 'view_orders']);
    Route::get('on_way/{id}', [AdminController::class, 'on_way']);
    Route::get('delivered/{id}', [AdminController::class, 'delivered']);
    Route::get('print_pdf/{id}', [AdminController::class, 'print_pdf']);
    
   
    
    
});


Route::get('details_product/{id}',[HomeController::class,'details_product']);
Route::get('add_cart/{id}',[HomeController::class,'add_cart'])->middleware(['auth', 'verified']);
Route::get('mycart',[HomeController::class,'mycart'])->middleware(['auth', 'verified']);
Route::get('remove_cart/{id}',[HomeController::class,'remove_cart'])->middleware(['auth', 'verified']);
Route::post('order',[HomeController::class,'order'])->middleware(['auth', 'verified']);
Route::get('/myorders',[HomeController::class, 'myorders'])->middleware(['auth', 'verified']);

Route::controller(HomeController::class)->group(function(){
    Route::get('stripe', 'stripe');
    Route::post('stripe', 'stripePost')->name('stripe.post');
});

Route::get('shops',[HomeController::class,'shops']);
Route::get('why',[HomeController::class,'why']);
Route::get('testimonial',[HomeController::class,'testimonial']);
Route::get('contacts',[HomeController::class,'contacts']);