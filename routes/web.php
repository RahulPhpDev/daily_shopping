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
    return view('testing/test');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');





// use this instead of name method
Route::group([
    'as' => 'admin.',// name argument
    'prefix' => 'admin',//append this in url
    'namespace' => 'Admin',
], function () {
        Route::resource('brands', 'BrandController');
        Route::get('category', 'CategoryController')->name('category');

        Route::get('vehicle-type', 'VehicleTypeController')->name('vehicle-type');
        Route::get('vehicle', 'VehicleController')->name('vehicle');


});

