<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Panel\AuthController;
use App\Http\Controllers\Admin\AuthController as Aauth;
use App\Http\Controllers\Admin\CompanyController as ACompany;
use App\Http\Controllers\Admin\HomeController as Ahome;
use App\Http\Controllers\Admin\UserController as AUser;
use App\Http\Controllers\Admin\BlogController as ABlog;


use App\Http\Controllers\Front\BlogController;




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
Route::get('blog/{slug}',[BlogController::class,'blog_detail'])->name('front.blog_detail');



Route::prefix('panel')->group(function () {
    Route::get('/login',[AuthController::class,'login'])->name('panel.login');
});


Route::group(['prefix'=>'adminpanel','as'=>'admin.'], function(){
    Route::get('login',[Aauth::class,'login'])->name('login');
    Route::post('login_post',[Aauth::class,'login_post'])->name('login_post');
    Route::get('logout',[Aauth::class,'logout'])->name('logout');
});


Route::group(['prefix' => 'adminpanel', 'as' => 'admin.', 'middleware' => 'auth'], function () {
    Route::get('/',[Ahome::class,'index'])->name('home');



    //Firma Yönetimi
    Route::get('firmalari_listele',[ACompany::class,'index'])->name('list_company');
    Route::post('firma_ekle_post',[ACompany::class,'add_company_post'])->name('add_company_post');
    Route::put('firma_duzenle_post',[ACompany::class,'update_company_post'])->name('update_company_post');
    Route::get('firma_sil/{id}',[ACompany::class,'delete_company'])->name('delete_company');


    //Kullanıcı Yönetimi
    Route::get('kullanicilari_listele',[AUser::class,'index'])->name('list_user');
    Route::post('kullanici_ekle_post',[AUser::class,'add_user_post'])->name('add_user_post');
    Route::put('kullanici_duzenle_post',[AUser::class,'update_user_post'])->name('update_user_post');
    Route::get('kullanici_sil/{id}',[AUser::class,'delete_user'])->name('delete_user');

    //Blog Yönetimi
    Route::get('bloglari_listele',[ABlog::class,'index'])->name('list_blog');
    Route::post('blog_ekle_post',[ABlog::class,'add_blog_post'])->name('add_blog_post');
    Route::put('blog_duzenle_post',[ABlog::class,'update_blog_post'])->name('update_blog_post');
    Route::get('delete_blog/{id}',[ABlog::class,'delete_blog'])->name('delete_blog');
});
