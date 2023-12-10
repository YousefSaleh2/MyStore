<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});
Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('users_index', [UserController::class, 'home'])->name('users_index');

    Route::get('orders_create', [OrderController::class, 'create'])->name('orders_create');

    Route::post('orders_store', [OrderController::class, 'store'])->name('orders_store');

    Route::get('user_orders', [OrderController::class, 'index'])->name('user_orders');

    Route::get('order_items/{order}', [OrderController::class, 'order_items'])->name('order_items');
});

Route::middleware(['isAdmin', 'auth'])->group(function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('admin');

    Route::resource('/categories', CategoryController::class);

    Route::get('/categories.show_deleted', [CategoryController::class, 'show_deleted'])->name('category_show_deleted');

    Route::get('/categories.force_deleted/{id}', [CategoryController::class, 'force_deleted'])->name('category_force_deleted');

    Route::get('/categories.restore/{id}', [CategoryController::class, 'restore'])->name('category_restore');

    Route::resource('/products', ProductController::class);

    Route::get('/products.show_deleted', [ProductController::class, 'show_deleted'])->name('product_show_deleted');

    Route::get('/products.force_deleted/{id}', [ProductController::class, 'force_deleted'])->name('product_force_deleted');

    Route::get('/products.restore/{id}', [ProductController::class, 'restore'])->name('product_restore');

    Route::get('users', [AdminController::class, 'user'])->name('show_users');

    Route::get('users_update/{user}', [AdminController::class, 'user_update'])->name('users_update');

    Route::get('/all_orders', [OrderController::class, 'all_orders'])->name('all_orders');

    Route::get('filter_orders/{user}', [OrderController::class, 'filter_orders'])->name('filter_orders');

    Route::get('orders_status/{status}', [OrderController::class, 'orders_status'])->name('orders_status');

    Route::put('orders_reject/{order}', [OrderController::class, 'reject_order'])->name('reject_order');

    Route::put('orders_accepte/{order}', [OrderController::class, 'accepte_order'])->name('accepte_order');

    Route::resource('/{page}', AdminController::class);
});
