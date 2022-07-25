<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
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

    Route::get('/admin/category/manage_category',[CategoryController::class,'manage_category'])->name('admin/category/manage_category');

    Route::get('/admin/updatepassword',[AdminController::class,'updatepassword'])->name('admin/updatepassword');

    Route::post('/admin/category/insert',[CategoryController::class,'insert_cat'])->name('admin/category/insert');

    Route::post('/admin/category/edit/{id}',[CategoryController::class,'edit_cat'])->name('admin/category/edit');

    Route::post('/admin/category/delete/{id}',[CategoryController::class,'delete_cat'])->name('admin/category/delete');

    Route::get('/admin/category/list',[CategoryController::class,'cat_list'])->name('category.list');
});

Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin/logout');

