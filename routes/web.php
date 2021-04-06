<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PostierController;
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
Route::prefix('users')->middleware(['auth','is_admin'])->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('users.index');
    Route::get('/create', [UserController::class, 'create'])->name('users.create');
    Route::get('/datatable', [UserController::class, 'datatable'])->name('users.datatable');
    Route::get('/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/{user}/update', [UserController::class, 'update'])->name('users.update');
    Route::post('/user/store', [UserController::class, 'store'])->name('users.store');
    Route::delete('/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});

Route::prefix('profile')->middleware('auth')->group(function () {
    Route::get('/', [ProfileController::class, 'edit'])->name('profile');
    Route::put('/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/updatePassword', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');
});

//Postiers
Route::prefix('postiers')->middleware(['auth','is_admin'])->group(function () {
    Route::get('/', [PostierController::class, 'index'])->name('postiers.index');
    Route::get('/datatable', [PostierController::class, 'datatable'])->name('postiers.datatable');
});

//BOOKS
Route::prefix('books')->prefix('books')->group(function () {
    Route::get('/', [BookController::class, 'index'])->name('books.index');
    Route::get('/create', [BookController::class, 'create'])->name('books.create');
    Route::get('/{book}/show', [BookController::class, 'show'])->name('books.show');
    Route::get('/guest/{book}', [BookController::class, 'guest'])->name('books.guest');
    Route::get('/datatable', [BookController::class, 'datatable'])->name('books.datatable');
    Route::post('/store', [BookController::class, 'store'])->name('books.store');
    Route::get('/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
    Route::put('/{book}/update', [BookController::class, 'update'])->name('books.update');
    Route::delete('/{book}', [BookController::class, 'destroy'])->name('books.destroy');
});

//CATEGORIES
Route::prefix('categories')->middleware(['auth','is_admin'])->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::get('/datatable', [CategoryController::class, 'datatable'])->name('categories.datatable');
    Route::post('/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/{category}/update', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
});
//ORDERS
Route::prefix('orders')->middleware('auth')->group(function () {
    Route::get('/', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/create', [OrderController::class, 'create'])->name('orders.create');
    Route::get('/{order}/show', [OrderController::class, 'show'])->name('orders.show');
    Route::get('/datatable', [OrderController::class, 'datatable'])->name('orders.datatable');
    Route::get('/pendingdatatable', [OrderController::class, 'pendingdatatable'])->name('orders.pendingdatatable');
    Route::get('/pending', [OrderController::class, 'pending'])->name('orders.pending');
    Route::get('/deliveringdatatable', [OrderController::class, 'deliveringdatatable'])->name('orders.deliveringdatatable');
    Route::get('/delivering', [OrderController::class, 'delivering'])->name('orders.delivering');

    Route::get('/delivereddatatable', [OrderController::class, 'delivereddatatable'])->name('orders.delivereddatatable');
    Route::get('/deliveredorders', [OrderController::class, 'deliveredorders'])->name('orders.deliveredorders');

    Route::post('/store', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/{order}/edit', [OrderController::class, 'edit'])->name('orders.edit');
    Route::put('/{order}/update', [OrderController::class, 'update'])->name('orders.update');
    Route::delete('/{order}', [OrderController::class, 'destroy'])->name('orders.destroy');
    Route::post('/accept/{order}', [OrderController::class, 'accept'])->name('orders.accept');
    Route::post('/delivered/{order}', [OrderController::class, 'delivered'])->name('orders.delivered');
});


Route::get('/', [BookController::class, 'welcome'])->name('welcome');
Route::get('categories/{id}', [BookController::class, 'getBooksByCategory'])->name('get.books.by.category');











