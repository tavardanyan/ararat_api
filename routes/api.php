<?php

use Illuminate\Http\Request;
use App\Category;

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

Route::get('/', function(){
  return response()->json(['status' => 200, 'message' => 'succcesful',]);
});  //generate token
Route::post('register', 'AuthController@register');  //generate token
Route::post('login', 'AuthController@login');  //generate token
Route::post('logout', 'AuthController@logout'); // logout will make the token to blacklisted you have to create token again from login route
Route::post('refresh', 'AuthController@refresh'); //can refresh token with existing token
Route::post('secret/test', 'AuthController@test');

//On Unauthorized Login
Route::get('error', function(){
  return response()->json(['error' => 'Invalid Token']);
})->name('login');


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



Route::get('image/{folder}/{name}', function(Request $request)
{
    //$path = storage_path('app/public/'.$folder.'/22qaVXkVOxCi8BGihEX9hck02vq0OYlWqpKjZUaX.png');
    $path = storage_path('app/public/'.$request->folder.'/'.$request->name);
    if (!File::exists($path)) {
      $path = storage_path('app/public/no-image.png');
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});

Route::get('product_image/{folder}/{name}', function(Request $request)
{
    //$path = storage_path('app/public/'.$folder.'/22qaVXkVOxCi8BGihEX9hck02vq0OYlWqpKjZUaX.png');
    $path = storage_path('app/public/product/'.$request->folder.'/'.$request->name);
    if (!File::exists($path)) {
      $path = storage_path('app/public/no-image.png');
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});

Route::get('image/null', function(Request $request) {
    $path = storage_path('app/public/no-image.png');
    
    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});


// Route::get('category', function(Request $request){
//   $title = trim($request->title);
//   $slug = trim($request->slug);
//   $parent = $request->parent == "" ? null : intval($request->parent);
//   $desc = $request->desc == "" ? null : trim($request->desc);

//   return Category::create([
//     'title' => $title,
//     'slug' => $slug,
//     'desc' => $desc,
//     'parent' => $parent,
//     'image' => $request->image
//   ]);
// });




