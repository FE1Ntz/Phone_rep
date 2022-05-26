<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\DeviceManufacturerController;
use App\Http\Controllers\DeviceModelController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PartController;
use App\Http\Controllers\PartManufacturerController;

use App\Http\Controllers\PartModelController;
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
    return view('welcome');
});

Route::resource('/client', ClientController::class);
Route::resource('/order', OrderController::class);
Route::resource('/device', DeviceController::class);
Route::resource('/device-manufacturer', DeviceManufacturerController::class);
Route::resource('/device-model', DeviceModelController::class);
Route::resource('/part', PartController::class);
Route::resource('/part-manufacturer', PartManufacturerController::class);
Route::resource('/part-model', PartModelController::class);
Route::resource('/about', AboutController::class);
//Route::get('/client', [ClientController::class, 'index'])->name('client.index');
//Route::post('/client', [ClientController::class, 'store'])->name('client.store');
