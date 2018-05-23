<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/', 'AppController@indexPage');  //generate token

Route::post('register', 'AuthController@register');  //generate token
Route::post('login', 'AuthController@login');  //generate token
Route::post('logout', 'AuthController@logout'); // logout will make the token to blacklisted you have to create token again from login route
Route::post('refresh', 'AuthController@refresh'); //can refresh token with existing token
Route::post('secret/test', 'AuthController@test');

//On Unauthorized Login
Route::get('error', 'AppController@errorPage')->name('login');

Route::post('options', 'OptionController@updateOption');
Route::get('options', 'OptionController@getOptions');

Route::post('category/upload/img', 'CategoryController@addCategoryImage');
Route::post('category', 'CategoryController@addCategory');
Route::get('category', 'CategoryController@getCategory');
Route::get('category/{id}', 'CategoryController@getCategory');
Route::delete('category/{id}', 'CategoryController@deleteCategory');
Route::put('category/{id}', 'CategoryController@updateCategory');
Route::get('category_p/{size}', 'CategoryController@getCategoryPaginate');

Route::post('product', 'ProductController@addProduct');
Route::get('product/get/{by}/{value}', 'ProductController@getProduct');
Route::post('product/image/{id}', 'ProductController@addProductImage');
Route::get('product/SKU/{sku}', 'ProductController@checkSKU');

Route::get('image/{folder}/{name}', 'ImageController@showImageByFolder');
Route::get('product_image/{folder}/{name}', 'ImageController@showProductImage');
Route::get('image/null', 'ImageController@showNullImage');
