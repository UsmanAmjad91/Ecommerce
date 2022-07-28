<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\ColorController;
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
    Route::get('/admin/dashboard',[AdminController::class,'dashboard'])->name('admin/dashboard');

    Route::get('/admin/category',[CategoryController::class,'index'])->name('admin/category');

    Route::get('/admin/category/add_category',[CategoryController::class,'manage_category'])->name('admin/category/add_category');

    Route::get('/admin/updatepassword',[AdminController::class,'updatepassword'])->name('admin/updatepassword');

    Route::post('/admin/category/insert',[CategoryController::class,'insert_cat'])->name('admin/category/insert');

    Route::post('/admin/category/edit/{id}',[CategoryController::class,'edit_cat'])->name('admin/category/edit');

    Route::post('/admin/category/delete/{id}',[CategoryController::class,'delete_cat'])->name('admin/category/delete');

    Route::get('/admin/category/list',[CategoryController::class,'cat_list'])->name('category.list');

    Route::post('/admin/category/status_deactive/{id}',[CategoryController::class,'cat_status_de'])->name('admin/category/status_deactive');

    Route::post('/admin/category/status_active/{id}',[CategoryController::class,'cat_status_ac'])->name('admin/category/status_active');

    Route::get('/admin/coupon',[CouponController::class,'index'])->name('admin/coupon');

    Route::get('/admin/coupon/add_coupon',[CouponController::class,'manage_coupon'])->name('admin/coupon/add_coupon');

    Route::get('/admin/coupon/list',[CouponController::class,'coupon_list'])->name('coupon.list');

    Route::post('/admin/coupon/insert',[CouponController::class,'insert_coupon'])->name('admin/coupon/insert');

    Route::post('/admin/coupon/edit/{id}',[CouponController::class,'edit_coupon'])->name('admin/coupon/edit');

    Route::post('/admin/coupon/delete/{id}',[CouponController::class,'destroy'])->name('admin/coupon/delete');

    Route::post('/admin/coupon/status_deactive/{id}',[CouponController::class,'coupon_status_de'])->name('admin/coupon/status_deactive');

    Route::post('/admin/coupon/status_active/{id}',[CouponController::class,'coupon_status_ac'])->name('admin/coupon/status_active');

    Route::get('/admin/size',[SizeController::class,'index'])->name('admin/size');

    Route::get('/admin/size/add_size',[SizeController::class,'manage_size'])->name('admin/size/add_size');

    Route::get('/admin/size/list',[SizeController::class,'size_list'])->name('size.list');

    Route::post('/admin/size/insert',[SizeController::class,'insert_size'])->name('admin/size/insert');

    Route::post('/admin/size/edit/{id}',[SizeController::class,'edit_size'])->name('admin/size/edit');

    Route::post('/admin/size/delete/{id}',[SizeController::class,'destroy_size'])->name('admin/size/delete');

    Route::post('/admin/size/status_deactive/{id}',[SizeController::class,'size_status_de'])->name('admin/size/status_deactive');

    Route::post('/admin/size/status_active/{id}',[SizeController::class,'size_status_ac'])->name('admin/size/status_active');

    Route::get('/admin/color',[ColorController::class,'index'])->name('admin/color');

    Route::get('/admin/color/add_color',[ColorController::class,'manage_color'])->name('admin/color/add_color');

    Route::get('/admin/color/list',[ColorController::class,'color_list'])->name('color.list');

    Route::post('/admin/color/insert',[ColorController::class,'insert_color'])->name('admin/color/insert');

    Route::post('/admin/color/edit/{id}',[ColorController::class,'edit_color'])->name('admin/color/edit');

    Route::post('/admin/color/delete/{id}',[ColorController::class,'destroy_color'])->name('admin/color/delete');

    Route::post('/admin/color/status_deactive/{id}',[ColorController::class,'color_status_de'])->name('admin/color/status_deactive');

    Route::post('/admin/color/status_active/{id}',[ColorController::class,'color_status_ac'])->name('admin/color/status_active');

});

Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin/logout');

