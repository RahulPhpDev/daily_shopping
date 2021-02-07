<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group([
    'namespace' => 'Api',
    'middleware' => 'apiToken',
    'as' => 'api.'
    // api prefix is already in place

], function () {
    Route::post('login', 'LoginApiController')->withoutMiddleware('apiToken');
    Route::get('categories', 'CategoryApiController@index');
    Route::get('products','ProductApiController@index');
    Route::get('category/{category_id}/products', 'ProductApiController@categoryProduct');
    Route::put('update/profile', 'ProfileApiController@updateProfile');
    Route::get('my/orders/{user_id}', 'OrderApiController@myOrder');
});
