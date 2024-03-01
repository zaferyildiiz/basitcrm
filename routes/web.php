<?php

use Illuminate\Support\Facades\Route;


//Front Controller
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\ContactFormController;
use App\Http\Controllers\Front\BlogController;
use App\Http\Controllers\Front\ModuleController;
use App\Http\Controllers\Front\TeamController;



//Admin Controller
use App\Http\Controllers\Admin\AuthController as Aauth;
use App\Http\Controllers\Admin\CompanyController as ACompany;
use App\Http\Controllers\Admin\HomeController as Ahome;
use App\Http\Controllers\Admin\UserController as AUser;
use App\Http\Controllers\Admin\BlogController as ABlog;
use App\Http\Controllers\Admin\ContactFormController as AContact;
use App\Http\Controllers\Front\AboutController;

// Panel Controller
use App\Http\Controllers\Panel\AuthController;
use App\Http\Controllers\Panel\HomeController as HHomeController;
use App\Http\Controllers\Panel\CustomerController;
use App\Http\Controllers\Panel\ContactController;
use App\Http\Controllers\Panel\ProductCategoryController;
use App\Http\Controllers\Panel\ProductBrandController;
use App\Http\Controllers\Panel\ProductController;

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
Route::post('mesaj_gonder',[ContactFormController::class,'index'])->name('front.contact_form_post');
Route::get('iletisim',[ContactFormController::class,'iletisim'])->name('front.iletisim');
Route::get('hakkimizda',[AboutController::class,'index'])->name('front.about');
Route::get('modullerimiz',[ModuleController::class,'index'])->name('front.modules');
Route::get('tum_bloglar',[BlogController::class,'all_blog'])->name('front.all_blog');
Route::get('bizim_ekip',[TeamController::class,'index'])->name('front.team');






Route::group(['prefix'=>'panel','as'=>'panel.'],function () {
    Route::get('/login',[AuthController::class,'login'])->name('panel.login');
    Route::post('login_post',[AuthController::class,'login_post'])->name('login_post');
});


Route::group(['prefix'=>'panel','as'=>'panel.', 'middleware' => 'auth'],function () {

    Route::get('anasayfa',[HHomeController::class,'index'])->name('home');

    //Müşteri Yönetimi
    Route::get('musterileri_listele',[CustomerController::class,'index'])->name('list_customer');
    Route::post('musteri_ekle_post',[CustomerController::class,'add_customer_post'])->name('add_customer_post');
    Route::put('musteri_duzenle_post',[CustomerController::class,'update_customer_post'])->name('update_customer_post');

    //Kontak Yönetimi
    Route::get('kontaklari_listele',[ContactController::class,'index'])->name('list_contact');
    Route::post('kontak_ekle_post',[ContactController::class,'add_contact_post'])->name('add_contact_post');
    Route::put('kontak_duzenle_post',[ContactController::class,'update_contact_post'])->name('update_contact_post');
    Route::get('delete_contact/{id}',[ContactController::class,'delete_contact'])->name('delete_contact');


    //Ürün Kategori Yönetimi
    Route::get('urun_kategori_listele',[ProductCategoryController::class,'index'])->name('list_product_category');
    Route::post('urun_kategorisi_ekle_post',[ProductCategoryController::class,'add_product_category_post'])->name('add_product_category_post');
    Route::put('urun_kategori_duzenle_post',[ProductCategoryController::class,'update_product_category_post'])->name('update_product_category_post');
    Route::get('urun_kategorisi_sil/{id}',[ProductCategoryController::class,'delete_product_category'])->name('delete_product_category');


    //Ürün Marka Yönetimi
    Route::get('urun_markalari_listele',[ProductBrandController::class,'index'])->name('list_product_brand');
    Route::post('urun_marka_ekle',[ProductBrandController::class,'add_product_brand_post'])->name('add_product_brand_post');
    Route::put('urun_marka_duzenle_post',[ProductBrandController::class,'update_product_brand_post'])->name('update_product_brand_post');
    Route::get('urun_marka_sil/{id}',[ProductBrandController::class,'delete_product_brand'])->name('delete_product_brand');


    //Ürün Yönetimi
    Route::get('/urunleri_listele',[ProductController::class,'index'])->name('list_product');
    Route::post('urun_ekle_post',[ProductController::class,'add_product_post'])->name('add_product_post');
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

    //İletişim Formundan Gelen Data Yönetimi
    Route::get('/iletisimformu',[AContact::class,'index'])->name('list_contactform');

});
