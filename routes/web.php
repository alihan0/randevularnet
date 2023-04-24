<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;



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
Route::group([
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){
    
    Route::controller(MainController::class)->middleware('auth')->group(function(){
        Route::get('/', 'home');
    });


    Route::controller(AuthController::class)->prefix('auth')->group(function(){
        Route::get('/login', 'login')->name('login');
        Route::get('/register', 'register');
        Route::post('login', 'login_control');
        Route::post('register', 'register_control');
    });
});
