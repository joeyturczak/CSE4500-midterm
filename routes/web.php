<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\DeviceuserController;
use App\Http\Controllers\UserdeviceController;

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
    return view('welcome');
});

Route::get('/home', function () {
    return view('welcome');
});

Route::resource('/manufacturers', ManufacturerController::class);

Route::resource('/categories', CategoryController::class);

Route::resource('/devices', DeviceController::class);

Route::resource('/deviceusers', DeviceuserController::class);

Route::resource('/userdevices', UserdeviceController::class);


Route::get('/userlist', function($deviceusers) {
    return view('userlist', compact('deviceusers'));
});

Route::fallback(function() {
    return view('notfound');
});

Route::get('/db-test', function () {
    try {         
         echo \DB::connection()->getDatabaseName();     
    } catch (\Exception $e) {
          echo 'None';
    }
});

Route::get('/db-migrate', function() {
    Artisan::call('migrate');
    echo Artisan::output();
});