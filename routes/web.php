<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VendingController;
use App\Models\Product;
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

Route::get('/', [VendingController::class, 'view']);
Route::get('/login',[VendingController::class, 'login']);
Route::post('/login',[VendingController::class, 'logincheck']);
Route::post('/pay',[VendingController::class, 'select']);

