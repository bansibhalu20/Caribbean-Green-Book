<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\VideoController;
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

Route::get('dashboard',[AdminController::class,'index'])->name('adminDashboard');
Route::get('admin/login',[AdminLoginController::class,'loginPage'])->name('admin.login');
Route::post('admin/login',[AdminLoginController::class,'login'])->name('admin.login.submit');
Route::get('admin/profile',[AdminLoginController::class,'showProfile'])->name('admin.showprofile');

Route::get('admin/video/add', [VideoController::class, 'showAddView'])->name('admin.video.add');
Route::get('admin/video/create', [VideoController::class, 'showCreateView'])->name('admin.video.create');
Route::any('/video/store', [VideoController::class, 'store'])->name('video.store');
Route::get('admin/video/edit/{id}', [VideoController::class, 'showEditView'])->name('admin.video.edit');
Route::put('/video/{id}/update', [VideoController::class, 'update'])->name('admin.video.update');
Route::delete('/admin/video/{id}', [VideoController::class, 'destroy'])->name('admin.video.destroy');


