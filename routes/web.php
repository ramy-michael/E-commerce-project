<?php

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
///frontend
Route::get('/','IndexController@index');
Route::get('/list-products','IndexController@shop');
Route::get('/cat/{id}','IndexController@listByCat')->name('cats');
Route::get('/product-detail/{id}','IndexController@detialpro');

///get attribute
Route::get('/get-product-attr','IndexController@getAttrs');

///cart
Route::get('/viewcart','CartController@index');
Route::get('/cart/deleteItem/{id}','CartController@deleteItem');
Route::get('/cart/update-quantity/{id}/{quantity}','CartController@updateQuantity');
Route::get('/history','CartController@historyPage');

///login
Route::get('/login_page','UsersController@index');
Route::post('/register_user','UsersController@register');
Route::post('/user_login','UsersController@login');
Route::get('/logout','UsersController@logout');

///identify user
Route::get('/myaccount','UsersController@account');
Route::get('/check-out','CheckOutController@index');
Route::get('/order-review','OrdersController@index');
Route::get('/cod','OrdersController@cod');
Route::get('/paypal','OrdersController@paypal');

///admin
//dashboard
Route::get('/best_seller','AdminController@bestseller');
Route::get('/finished_products','AdminController@finishedproducts');

//Auth::routes(['register'=>false]);
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix'=>'admin'],function (){
    Route::get('/', 'AdminController@index')->name('admin_home');

    /// setting for admin
    Route::get('/settings', 'AdminController@settings');
    Route::get('/check-pwd','AdminController@chkPassword');
    /// category
    Route::resource('/category','CategoryController');
    Route::get('/check_category_name','CategoryController@checkCateName');
    /// products
    Route::resource('/product','ProductsController');
    /// product attribute
    Route::resource('/product_attr','ProductAtrrController');
    /// product images gallery
    Route::resource('/image-gallery','ImagesController');
    /// coupons
    Route::resource('/coupon','CouponController');
});

