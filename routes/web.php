<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CostController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\SupplierController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/cart', [CartController::class,'cart'])->name('cart.index');


Route::post('/add/{product}',[CartController::class],'add')->name('cart.store');
Route::post('/update', [CartController::class,'update'])->name('cart.update');
Route::post('/remove', [CartController::class,'remove'])->name('cart.remove');
Route::post('/clear', [CartController::class,'clear'])->name('cart.clear');
Route::post('/checkout', [CartController::class,'checkout'])->name('cart.checkout');
Route::resource('products', ProductController::class);
Route::resource('/suppliers', SupplierController::class);
Route::resource('/categories', CategoryController::class);
Route::get('/employees', [HomeController::class,'employees'])->name('employees');
Route::get('/employees/create', [HomeController::class,'addEmployee'])->name("employee.create");
Route::post('employee/store', [HomeController::class,'addEmployeeStore'])->name('employee.store');
Route::post('/employees/{employee}', [HomeController::class,'deleteEmployee'])->name('employees.delete');
Route::get('/home', [HomeController::class,'index'])->name('home');

Route::get('/profile/{id}',[ProfileController::class,'show'])->name('profile') ;
Route::post('profile/{id}', [ProfileController::class,'update'])->name('profile.update');
Route::post('passwordUpdate',[ProfileController::class,'passwordUpdate'])->name('passwordUpdate');

Route::resource('cost', CostController::class);
Route::get('/stock', [StockController::class,'index'])->name('stock.index');
Route::post('/stock/delete', [StockController::class,'newAnalysis'])->name('stock.newAnalysis');

Auth::routes();

