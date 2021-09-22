<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/auth/save',[AuthController::class,'store'])->name('auth.save');
Route::post('/auth/check',[AuthController::class,'check'])->name('auth.check');
Route::get('/admin/logout',[AuthController::class,'logout'])->name('auth.logout');

/*Auth Middleware*/
Route::group(['middleware'=>['AuthCheck']],function(){
    Route::get('/auth/login',[AuthController::class,'login'])->name('auth.login');
    Route::get('/auth/register',[AuthController::class,'register'])->name('auth.register');

    Route::get('admin/dashboard',[AuthController::class,'dashboard']);
});

