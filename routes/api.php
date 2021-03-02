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
//Route::group([
//    'name'
//], function() {
//
//});
Route::get('advertisement', 'Api\AdvertisementApiController@index');

Route::group([
    'namespace' => 'Api',
    'middleware' => 'apiToken',
    'as' => 'api.'
    // api prefix is already in place

], function () {

    Route::post('login', 'LoginApiController')->withoutMiddleware('apiToken');
    Route::get('categories', 'CategoryApiController@index');
    Route::get('products','ProductApiController@index');
    Route::get('popular/products','ProductApiController@popularProduct');
    Route::get('category/{category_id}/products', 'ProductApiController@categoryProduct');
    Route::put('update/profile', 'ProfileApiController@updateProfile');
    Route::get('order/{user_id}', 'OrderApiController@index');
    Route::post('order', 'OrderApiController@create');
    Route::get('/order/{id}/details', 'OrderApiController@details');
    Route::get('/driver/{driverId?}/order', 'DriverOrderController@orders')->name('driver.order');
    Route::post('driver/deliver-order','DriverOrderController@deliverOrder');
    Route::post('driver/complete-order','DriverOrderController@completeOrder');
    Route::post('driver/start-deliver','DriverOrderController@startDelivery');

    //subscription
    Route::post('subscription/store', 'SubscriptionApiController@store')->name('subscription.store');
    Route::get('my/subscription/{user_id?}', 'SubscriptionApiController@mySubscription')->name('subscription.mySubscription');
});
