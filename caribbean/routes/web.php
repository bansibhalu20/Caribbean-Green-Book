<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\admin\AdminBusinessController;
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

//Admin Routes
Route::get('dashboard',[AdminController::class,'index'])->name('adminDashboard');
Route::get('admin/login',[AdminLoginController::class,'loginPage'])->name('admin.login');
Route::post('admin/login',[AdminLoginController::class,'login'])->name('admin.login.submit');
Route::get('admin/profile',[AdminLoginController::class,'showProfile'])->name('admin.showprofile');

//Business Module
Route::get('admin/business/create', [AdminBusinessController::class, 'create'])->name('admin.business.create');
Route::post('admin/business/create',[AdminBusinessController::class,'store'])->name('admin.business.store');
Route::get('admin/business/show', [AdminBusinessController::class, 'show'])->name('admin.business.show');