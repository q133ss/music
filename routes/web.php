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

Route::middleware('guest')->group(function (){
    Route::get('/login', [\App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login');
    Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'login']);
    Route::get('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'index'])->name('register');
    Route::post('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'register']);
    Route::get('/forgot', [\App\Http\Controllers\Auth\ForgotController::class, 'index'])->name('forgot.password');
    Route::post('/forgot', [\App\Http\Controllers\Auth\ForgotController::class, 'forgot']);
    Route::get('/password/reset/{token}', [\App\Http\Controllers\Auth\ResetController::class, 'index'])->name('reset.password');
    Route::post('/password/reset/{token}', [\App\Http\Controllers\Auth\ResetController::class, 'reset']);
});

Route::get('/logout', [\App\Http\Controllers\Auth\LogoutController::class, 'logout'])->name('logout');

Route::view('/policy', 'policy')->name('policy');

Route::group(['prefix' => '', 'middleware' => 'auth'],function (){
    Route::get('/', [\App\Http\Controllers\Lk\IndexController::class, 'index'])->name('lk.index');
    Route::get('/payments', [\App\Http\Controllers\Lk\PaymentsController::class, 'index'])->name('lk.payments');
    Route::get('/settings',  [\App\Http\Controllers\Lk\SettingsController::class, 'index'])->name('lk.settings');
    Route::post('/settings',  [\App\Http\Controllers\Lk\SettingsController::class, 'update'])->name('lk.settings.update');
    Route::get('/feedback', [\App\Http\Controllers\Lk\FeedbackController::class, 'index'])->name('lk.feedback');
    Route::post('/feedback', [\App\Http\Controllers\Lk\FeedbackController::class, 'store'])->name('lk.feedback.store');
});
