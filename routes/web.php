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

Route::get('/', function () {
    return view('auth');
})->name('login');
Route::post('/', [\App\Http\Controllers\AuthController::class, 'login_process'])->name('login.process');

Route::middleware(['auth'])->group(function(){
    Route::prefix('admin')->name('admin.')->group(function(){
        Route::controller(\App\Http\Controllers\DashboardController::class)->group(function(){
            Route::get('/', 'beranda')->name('beranda');
        });
        Route::prefix('web-setting')->name('web.')->group(function(){
            Route::resource('portofolio', \App\Http\Controllers\Admin\PortfolioController::class);
            Route::resource('kotak-masuk', \App\Http\Controllers\Admin\MessageController::class);
        });
    });
});
