<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\admin\AdminCategoryController;
use App\Http\Controllers\admin\AdminBusinessController;
use App\Http\Controllers\admin\AdminBusinessReviewController;
use App\Http\Controllers\admin\AdminVideoController;
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
//After Login 
Route::middleware(['admin.logged.in'])->group(function () {
    Route::get('dashboard', [AdminController::class, 'index'])->name('adminDashboard');
    Route::get('admin/profile', [AdminController::class, 'showProfile'])->name('admin.showprofile');
    Route::match(['get', 'post'], 'admin/edit-profile/{id}', [AdminController::class, 'editProfile'])->name('admin.editprofile');
    Route::any('admin/update-profile/{id}', [AdminController::class, 'updateProfile'])->name('admin.updateprofile');
    Route::get('admin/showpassword', [AdminController::class, 'showPassword'])->name('admin.showpassword');
    Route::any('admin/changepassword', [AdminController::class, 'changePassword'])->name('admin.changepassword');
});
 //Before Login
Route::get('admin/login', [AdminLoginController::class, 'loginPage'])->name('admin.login');
Route::post('admin/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');
Route::get('admin/logout', [AdminLoginController::class, 'getLogout'])->name('logout');

//Category Module 
Route::get('admin/view-category',[AdminCategoryController::class,'index'])->name('admin.viewcate');
Route::get('admin/addcate',[AdminCategoryController::class,'create'])->name('admin.addcate');
Route::post('admin/add-cate',[AdminCategoryController::class,'store'])->name('admin.addcate-store');
Route::get('admin/edit-cate/{id}',[AdminCategoryController::class,'editCategory'])->name('admin.category-edit');
Route::put('admin/update-cate/{id}',[AdminCategoryController::class,'updateCategory'])->name('admin.category-update');
Route::get('admin/delete-cate/{id}',[AdminCategoryController::class,'deleteCategory'])->name('admin.category-delete');
Route::get('admin/datatable',[AdminCategoryController::class,'dataTable'])->name('admin.category-dataTable');

//Business Review Module
Route::get('admin/busi-review',[AdminBusinessReviewController::class,'create'])->name('admin.busi-review');
Route::post('admin/busi-store',[AdminBusinessReviewController::class,'store'])->name('admin.busi-review-store');

//Business Module
Route::get('admin/business-create', [AdminBusinessController::class, 'create'])->name('admin.business-create');
Route::post('admin/business-create',[AdminBusinessController::class,'store'])->name('admin.business-store');
Route::get('admin/business-show', [AdminBusinessController::class, 'show'])->name('admin.business-show');
Route::post('admin/business-dataTable',[AdminBusinessController::class, 'dataTable'])->name('admin.business-dataTable');
Route::get('admin/business-edit/{id}',[AdminBusinessController::class,'edit'])->name('admin.business-edit');
Route::put('admin/business-update/{id}',[AdminBusinessController::class,'update'])->name('admin.business-update');
Route::get('admin.business-delete/{id}',[AdminBusinessController::class,'delete'])->name('admin.business-delete');

//Video Module
Route::get('admin/video/add', [AdminVideoController::class, 'showAddView'])->name('admin.video.add');
Route::get('admin/video/create', [AdminVideoController::class, 'showCreateView'])->name('admin.video.create');
Route::any('/video/store', [AdminVideoController::class, 'store'])->name('video.store');
Route::get('admin/video/edit/{id}', [AdminVideoController::class, 'showEditView'])->name('admin.video.edit');
Route::put('/video/{id}/update', [AdminVideoController::class, 'update'])->name('admin.video.update');
Route::delete('/admin/video/{id}', [AdminVideoController::class, 'destroy'])->name('admin.video.destroy');

//Plan Module

