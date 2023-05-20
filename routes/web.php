<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\Notification;

use App\Models\Notifications;

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
    
    Route::controller(MainController::class)->middleware(['auth','CheckCompany', 'Notification'])->group(function(){
        Route::get('/', 'home');

        // HELPER URL
        Route::post('/notification/push', function(){
            $n = Notifications::create([
                'user' => Auth::user()->id,
                'message' => request()->message,
                'icon' => request()->icon,
                'redirect' =>  request()->redirect,
                'url' => request()->url,
                'status' => 1,
            ]);
            return $n->id;
        });
        Route::post('/notification/read', function(){
            $response = [];
            $n = Notifications::find(request()->id);
            $n->status = 0;
            $n->save();
        });
    });


    Route::controller(AuthController::class)->prefix('auth')->group(function(){
        Route::get('/login', 'login')->name('login');
        Route::get('/register', 'register');
        Route::get('/logout', 'logout');
        Route::post('/login', 'login_control');
        Route::post('/register', 'register_control');
    });

    Route::controller(CompanyController::class)->prefix('company')->middleware(['auth','CheckCompany'])->group(function(){
        Route::post('/check', 'check');
    });

    Route::controller(DataController::class)->prefix('data')->group(function(){
        Route::post('/plan-detail', 'plan_detail');
    });

    Route::get('/send-notification/{userId}/{message}', function ($userId, $message) {
        $notification = new Notification();
        return $notification->sendNotification($userId, $message);
    });
});
