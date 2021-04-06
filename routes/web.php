<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});




Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

//USERS
Route::middleware(['auth','is_admin'])->group(function () {
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
    Route::get('/users/datatable', [App\Http\Controllers\UserController::class, 'datatable'])->name('users.datatable');
    Route::get('/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
    Route::put('/{user}/update', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
    Route::post('/user/store', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
    Route::delete('/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile');
    Route::put('/profile/update', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/updatePassword', [App\Http\Controllers\ProfileController::class, 'updatePassword'])->name('profile.updatePassword');
});

//Postiers
Route::middleware(['auth','is_admin'])->group(function () {
    Route::get('/postiers', [App\Http\Controllers\PostierController::class, 'index'])->name('postiers.index');
    Route::get('/postiers/datatable', [App\Http\Controllers\PostierController::class, 'datatable'])->name('postiers.datatable');
});

//BOOKS
Route::prefix('books')->group(function () {
    Route::get('/', [App\Http\Controllers\BookController::class, 'index'])->name('books.index');
    Route::get('/create', [App\Http\Controllers\BookController::class, 'create'])->name('books.create');
    Route::get('/{book}/show', [App\Http\Controllers\BookController::class, 'show'])->name('books.show');
    Route::get('/guest/{book}', [App\Http\Controllers\BookController::class, 'guest'])->name('books.guest');
    Route::get('/datatable', [App\Http\Controllers\BookController::class, 'datatable'])->name('books.datatable');
    Route::post('/store', [App\Http\Controllers\BookController::class, 'store'])->name('books.store');
    Route::get('/{book}/edit', [App\Http\Controllers\BookController::class, 'edit'])->name('books.edit');
    Route::put('/{book}/update', [App\Http\Controllers\BookController::class, 'update'])->name('books.update');
    Route::delete('/{book}', [App\Http\Controllers\BookController::class, 'destroy'])->name('books.destroy');
});

//CATEGORIES
Route::middleware(['auth','is_admin'])->group(function () {
    Route::get('/categories', [App\Http\Controllers\CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [App\Http\Controllers\CategoryController::class, 'create'])->name('categories.create');
    Route::get('/categories/datatable', [App\Http\Controllers\CategoryController::class, 'datatable'])->name('categories.datatable');
    Route::post('/categories/store', [App\Http\Controllers\CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{category}/edit', [App\Http\Controllers\CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{category}/update', [App\Http\Controllers\CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('categories.destroy');
});
//ORDERS
Route::middleware('auth')->group(function () {
    Route::get('/orders', [App\Http\Controllers\OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/create', [App\Http\Controllers\OrderController::class, 'create'])->name('orders.create');
    Route::get('/orders/{order}/show', [App\Http\Controllers\OrderController::class, 'show'])->name('orders.show');
    Route::get('/orders/datatable', [App\Http\Controllers\OrderController::class, 'datatable'])->name('orders.datatable');
    Route::get('/orders/pendingdatatable', [App\Http\Controllers\OrderController::class, 'pendingdatatable'])->name('orders.pendingdatatable');
    Route::get('/orders/pending', [App\Http\Controllers\OrderController::class, 'pending'])->name('orders.pending');
    Route::get('/orders/deliveringdatatable', [App\Http\Controllers\OrderController::class, 'deliveringdatatable'])->name('orders.deliveringdatatable');
    Route::get('/orders/delivering', [App\Http\Controllers\OrderController::class, 'delivering'])->name('orders.delivering');

    Route::get('/orders/delivereddatatable', [App\Http\Controllers\OrderController::class, 'delivereddatatable'])->name('orders.delivereddatatable');
    Route::get('/orders/deliveredorders', [App\Http\Controllers\OrderController::class, 'deliveredorders'])->name('orders.deliveredorders');

    Route::post('/orders/store', [App\Http\Controllers\OrderController::class, 'store'])->name('orders.store');
    Route::get('/orders/{order}/edit', [App\Http\Controllers\OrderController::class, 'edit'])->name('orders.edit');
    Route::put('/orders/{order}/update', [App\Http\Controllers\OrderController::class, 'update'])->name('orders.update');
    Route::delete('/orders/{order}', [App\Http\Controllers\OrderController::class, 'destroy'])->name('orders.destroy');
    Route::post('/orders/accept/{order}', [App\Http\Controllers\OrderController::class, 'accept'])->name('orders.accept');
    Route::post('/orders/delivered/{order}', [App\Http\Controllers\OrderController::class, 'delivered'])->name('orders.delivered');
});


Route::get('/', [App\Http\Controllers\BookController::class, 'welcome'])->name('welcome');
Route::get('categories/{id}', [App\Http\Controllers\BookController::class, 'getBooksByCategory'])->name('get.books.by.category');











