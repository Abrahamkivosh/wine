<?php


Route::get('/', function () {
    return view('auth.login');
});

Route::get('/cart', 'CartController@cart')->name('cart.index');

Route::post('/add/{product}', 'CartController@add')->name('cart.store');
Route::post('/update', 'CartController@update')->name('cart.update');
Route::post('/remove', 'CartController@remove')->name('cart.remove');
Route::post('/clear', 'CartController@clear')->name('cart.clear');
Route::post('/checkout', 'CartController@checkout')->name('cart.checkout');
Route::resource('products', 'ProductController');
Route::resource('/suppliers', 'SupplierController');
Route::resource('/categories', 'CategoryController');
Route::get('/employees', 'HomeController@employees')->name('employees');
Route::get('/employees/create', 'HomeController@addEmployee')->name("employee.create");
Route::post('employee/store', 'HomeController@addEmployeeStore')->name('employee.store');
Route::post('/employees/{employee}', 'HomeController@deleteEmployee')->name('employees.delete');
Route::get('/profile/{id}','ProfileController@show')->name('profile') ;
Route::post('profile/{id}', 'ProfileController@update')->name('profile.update');
Route::post('passwordUpdate','ProfileController@passwordUpdate')->name('passwordUpdate');
Route::resource('cost', 'CostController');
Route::get('/stock', 'StockController@index')->name('stock.index');
Route::post('/stock/delete', 'StockController@newAnalysis')->name('stock.newAnalysis');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
