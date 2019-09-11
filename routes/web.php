<?php

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

Route::get('/home', 'HomeController@index')->name('home');

// Admin

Route::group(['prefix' => 'admin', 'namespace' => 'Web\Admin', 'middleware' => 'auth'], function () {

    Route::get('/dashboard', 'DashboardController@index')->name('admin.dashboard');

    Route::resource('/user', 'UserController', resourceNames('adminUser'));
    Route::resource('/product', 'ProductController', resourceNames('adminProduct'));

});


// Users

Route::group(['namespace' => 'Web\User', 'middleware' => 'auth'], function () {

    Route::get('/add-to-cart/{id}', 'ProductController@getAddToCart')->name('product.addToCart');

    Route::resource('/user', 'UserController', resourceNames('user'));
    Route::resource('/cart', 'CartController', resourceNames('cart'));
    Route::resource('/history', 'HistoryController', resourceNames('history'));
    Route::resource('/payment', 'PaymentController', resourceNames('payment'));
    Route::resource('/product', 'ProductController', resourceNames('product'));
    Route::resource('/checkout', 'CheckoutController', resourceNames('checkout'));

});
