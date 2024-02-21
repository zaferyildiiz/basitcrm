<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Front\HomeController;

use App\Http\Controllers\Panel\AuthController;




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
 


Route::get('/',[HomeController::class,'index'])->name('home');



Route::prefix('panel')->group(function () {
    Route::get('/login',[AuthController::class,'login'])->name('panel.login');
});
