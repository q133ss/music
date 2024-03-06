<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['prefix' => ''],function (){
    Route::get('/', [\App\Http\Controllers\Lk\IndexController::class, 'index']);
    Route::get('/auth', function (){
       Auth()->loginUsingId(1);
       return 1;
    });
});
