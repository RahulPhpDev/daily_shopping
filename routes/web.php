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

Route::get('/', function () {
    return redirect('/login');
//    return view('testing/test');
});

Auth::routes(
    [
        'register' => false, // Registration Routes...
        'reset' => false, // Password Reset Routes...
        'verify' => false, // Email Verification Routes...
    ]
);

Route::get('/home', 'HomeController@index')->name('home');





// use this instead of name method
Route::group([
    'as' => 'admin.',// name argument
    'prefix' => 'admin',//append this in url
    'namespace' => 'Admin',
    'middleware' => 'admin'
], function () {
        Route::get('user', 'UserController')->name('user');
        Route::resource('brands', 'BrandController');
        Route::get('category', 'CategoryController')->name('category');

        Route::get('vehicle-type', 'VehicleTypeController')->name('vehicle-type');
        Route::get('vehicle', 'VehicleController')->name('vehicle');
        Route::get('location', 'LocationController')->name('location');
        Route::get('unit', 'UnitController')->name('unit');
        Route::get('product/add-more-attribute/{num}', 'ProductController@addMoreAttribute')->name('addMoreAttribute');
        Route::resource('product', 'ProductController');
        Route::get('inventory', 'InventoryController')->name('inventory');


});

