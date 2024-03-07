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

Route::get('/auth', function (){
    Auth()->loginUsingId(1);
    return 1;
});

Route::group(['prefix' => ''],function (){
    Route::get('/', [\App\Http\Controllers\Lk\IndexController::class, 'index'])->name('lk.index');
    Route::get('/payments', [\App\Http\Controllers\Lk\PaymentsController::class, 'index'])->name('lk.payments');
    Route::get('/settings',  [\App\Http\Controllers\Lk\SettingsController::class, 'index'])->name('lk.settings');
    Route::post('/settings',  [\App\Http\Controllers\Lk\SettingsController::class, 'update'])->name('lk.settings.update');
});
