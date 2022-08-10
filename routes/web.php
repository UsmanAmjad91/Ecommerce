<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\MyearController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin',[AdminController::class,'index'])->name('admin');

Route::post('/admin/auth',[AdminController::class,'auth'])->name('admin/auth');

Route::group(['middleware'=>'admin_auth'],function(){
    //Pswd//
    Route::get('/admin/updatepassword',[AdminController::class,'updatepassword'])->name('admin/updatepassword');
    /// Dashboard Route ///
    Route::get('/admin/dashboard',[AdminController::class,'dashboard'])->name('admin/dashboard');
     /// Category Routes ///
    Route::get('/admin/category',[CategoryController::class,'index'])->name('admin/category');

    Route::get('/admin/category/add_category',[CategoryController::class,'manage_category'])->name('admin/category/add_category');

    Route::get('/admin/category/cat_list',[CategoryController::class,'cat_name'])->name('admin/category/cat_list');

    Route::post('/admin/category/insert',[CategoryController::class,'insert_cat'])->name('admin/category/insert');

    Route::post('/admin/category/edit/{id}',[CategoryController::class,'edit_cat'])->name('admin/category/edit');

    Route::post('/admin/category/delete/{id}',[CategoryController::class,'delete_cat'])->name('admin/category/delete');

    Route::get('/admin/category/list',[CategoryController::class,'cat_list'])->name('category.list');

    Route::post('/admin/category/status_deactive/{id}',[CategoryController::class,'cat_status_de'])->name('admin/category/status_deactive');

    Route::post('/admin/category/status_active/{id}',[CategoryController::class,'cat_status_ac'])->name('admin/category/status_active');
 /// Coupons Routes ///
    Route::get('/admin/coupon',[CouponController::class,'index'])->name('admin/coupon');

    Route::get('/admin/coupon/add_coupon',[CouponController::class,'manage_coupon'])->name('admin/coupon/add_coupon');

    Route::get('/admin/coupon/list',[CouponController::class,'coupon_list'])->name('coupon.list');

    Route::post('/admin/coupon/insert',[CouponController::class,'insert_coupon'])->name('admin/coupon/insert');

    Route::post('/admin/coupon/edit/{id}',[CouponController::class,'edit_coupon'])->name('admin/coupon/edit');

    Route::post('/admin/coupon/delete/{id}',[CouponController::class,'destroy'])->name('admin/coupon/delete');

    Route::post('/admin/coupon/status_deactive/{id}',[CouponController::class,'coupon_status_de'])->name('admin/coupon/status_deactive');

    Route::post('/admin/coupon/status_active/{id}',[CouponController::class,'coupon_status_ac'])->name('admin/coupon/status_active');
/// Size Routes ///
    Route::get('/admin/size',[SizeController::class,'index'])->name('admin/size');

    Route::get('/admin/size/add_size',[SizeController::class,'manage_size'])->name('admin/size/add_size');

    Route::get('/admin/size/list',[SizeController::class,'size_list'])->name('size.list');

    Route::post('/admin/size/insert',[SizeController::class,'insert_size'])->name('admin/size/insert');

    Route::post('/admin/size/edit/{id}',[SizeController::class,'edit_size'])->name('admin/size/edit');

    Route::post('/admin/size/delete/{id}',[SizeController::class,'destroy_size'])->name('admin/size/delete');

    Route::post('/admin/size/status_deactive/{id}',[SizeController::class,'size_status_de'])->name('admin/size/status_deactive');

    Route::post('/admin/size/status_active/{id}',[SizeController::class,'size_status_ac'])->name('admin/size/status_active');
/// Colors Routes ///
    Route::get('/admin/color',[ColorController::class,'index'])->name('admin/color');

    Route::get('/admin/color/add_color',[ColorController::class,'manage_color'])->name('admin/color/add_color');

    Route::get('/admin/color/list',[ColorController::class,'color_list'])->name('color.list');

    Route::post('/admin/color/insert',[ColorController::class,'insert_color'])->name('admin/color/insert');

    Route::post('/admin/color/edit/{id}',[ColorController::class,'edit_color'])->name('admin/color/edit');

    Route::post('/admin/color/delete/{id}',[ColorController::class,'destroy_color'])->name('admin/color/delete');

    Route::post('/admin/color/status_deactive/{id}',[ColorController::class,'color_status_de'])->name('admin/color/status_deactive');

    Route::post('/admin/color/status_active/{id}',[ColorController::class,'color_status_ac'])->name('admin/color/status_active');
 /// Brand Routes ///
    Route::get('/admin/brand',[BrandController::class,'index'])->name('admin/brand');

    Route::get('/admin/brand/add_brand',[BrandController::class,'manage_brand'])->name('admin/brand/add_brand');

    Route::get('/admin/brand/list',[BrandController::class,'brand_list'])->name('brand.list');

    Route::post('/admin/brand/insert',[BrandController::class,'insert_brand'])->name('admin/brand/insert');

    Route::post('/admin/brand/edit/{id}',[BrandController::class,'edit_brand'])->name('admin/brand/edit');

    Route::post('/admin/brand/delete/{id}',[BrandController::class,'destroy_brand'])->name('admin/brand/delete');

    Route::post('/admin/brand/status_deactive/{id}',[BrandController::class,'brand_status_de'])->name('admin/brand/status_deactive');

    Route::post('/admin/brand/status_active/{id}',[BrandController::class,'brand_status_ac'])->name('admin/brand/status_active');

    /// Myear Routes ///
    Route::get('/admin/year',[MyearController::class,'index'])->name('admin/year');

    Route::get('/admin/year/add_year',[MyearController::class,'manage_year'])->name('admin/year/add_year');

    Route::get('/admin/year/list',[MyearController::class,'year_list'])->name('year.list');

    Route::post('/admin/year/insert',[MyearController::class,'insert_year'])->name('admin/year/insert');

    Route::post('/admin/year/edit/{id}',[MyearController::class,'edit_year'])->name('admin/year/edit');

    Route::post('/admin/year/delete/{id}',[MyearController::class,'destroy_year'])->name('admin/year/delete');

    Route::post('/admin/year/status_deactive/{id}',[MyearController::class,'year_status_de'])->name('admin/year/status_deactive');

    Route::post('/admin/year/status_active/{id}',[MyearController::class,'year_status_ac'])->name('admin/year/status_active');
    /// Products Routes ///
    Route::get('/admin/product',[ProductController::class,'index'])->name('admin/product');

    Route::get('/admin/product/add_product',[ProductController::class,'manage_product'])->name('admin/product/add_product');

    Route::get('/admin/product/list',[ProductController::class,'list_product'])->name('product.list');

    // Route::get('/admin/product/get',[ProductController::class,'getshow'])->name('product.get');

    Route::post('/admin/product/insert',[ProductController::class,'insert_product'])->name('admin/product/insert');

    Route::get('/admin/product/list',[ProductController::class,'product_list'])->name('product.list');

    Route::post('/admin/product/edit/{id}',[ProductController::class,'edit_product'])->name('admin/product/edit');

    Route::post('/admin/product/delete/{id}',[ProductController::class,'destroy_product'])->name('admin/product/delete');

    Route::post('/admin/product/status_deactive/{id}',[ProductController::class,'product_status_de'])->name('admin/product/status_deactive');

    Route::post('/admin/product/status_active/{id}',[ProductController::class,'product_status_ac'])->name('admin/product/status_active');

    Route::post('/admin/product/add',[ProductController::class,'insert_product'])->name('product.add');

    Route::get('/admin/product/getcoupon',[ProductController::class,'copon_get'])->name('admin/product/getcoupon');

    Route::get('/admin/product/getsize',[ProductController::class,'size_get'])->name('admin/product/getsize');

    Route::get('/admin/product/getcolor',[ProductController::class,'color_get'])->name('admin/product/getcolor');

    Route::get('/admin/product/getcat',[ProductController::class,'cat_get'])->name('admin/product/getcat');

    Route::get('/admin/product/getbrand',[ProductController::class,'brand_get'])->name('admin/product/getbrand');

    Route::get('/admin/product/getyear',[ProductController::class,'year_get'])->name('admin/product/getyear');

    Route::get('/admin/product/editproduct',[ProductController::class,'edit_pro'])->name('admin/product/editproduct');

    Route::post('/admin/product/edit2/{id}',[ProductController::class,'edit2_pro'])->name('admin/product/edit2');

    Route::get('/admin/product/search',[ProductController::class,'search'])->name('admin/product/search');

    Route::get('/admin/product/p_attr',[ProductController::class,'p_attr'])->name('admin/product/p_attr');

    Route::get('/admin/product/atrr_list',[ProductController::class,'productatrr_list'])->name('product.atrr_list');

    Route::post('/admin/product/editattr/{id}',[ProductController::class,'productatrr_edit'])->name('admin/product/editattr');

});

Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin/logout');

