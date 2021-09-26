<?php

use App\Http\Controllers\admin\ContactController;
use App\Http\Controllers\admin\DiscountController;
use App\Http\Controllers\admin\PermissionController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\FeedbackController;
use App\Http\Controllers\admin\SettingController;
use Illuminate\Support\Facades\Route;

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
    return view('admin.page.dashboard.index');
})->name('dashboard');




Route::get('user',[UserController::class,'index'])->name('user.list');

//staff list
Route::get('staff',[UserController::class,'staff'])->name('staff.list');
//role list
Route::get('role',[RoleController::class,'index'])->name('role.list');
//permission list
Route::get('permission',[PermissionController::class,'index'])->name('permission.list');

//feedback thuan
Route::get('feedback',[FeedbackController::class,'index'])->name('feedback.list');
Route::get('feedback/{id}',[FeedbackController::class,'remove'])->name('feedback.remove');
Route::post('feedback',[FeedbackController::class,'add'])->name('feedback.add');
//feedback end thuan

//setting thuan
Route::get('setting',[SettingController::class,'index'])->name('setting.list');
Route::get('setting/{id}',[SettingController::class,'remove'])->name('setting.remove');
Route::post('setting',[SettingController::class,'add'])->name('setting.add');
//setting end thuan

//contact page
Route::get('contact',[ContactController::class,'index'])->name('contact.list');

//discount_code page
Route::get('discount',[DiscountController::class,'index'])->name('discount.list');



Route::get('/error', function () {
    return view('admin.error.404-index');
});