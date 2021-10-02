<?php

use App\Http\Controllers\admin\ContactController;
use App\Http\Controllers\admin\DiscountController;
use App\Http\Controllers\admin\PermissionController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\FeedbackController;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\admin\BlogCategoryController;
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\TagController;
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

//login
Route::get('login',[LoginController::class,'index'])->name('login.list');
//user
Route::get('user',[UserController::class,'index'])->name('user.list');
//staff list
Route::get('staff',[UserController::class,'staff'])->name('staff.list');
//role list
Route::get('role',[RoleController::class,'index'])->name('role.list');
//permission list
Route::get('permission',[PermissionController::class,'index'])->name('permission.list');

//feedback thuan
Route::get('feedback',[FeedbackController::class,'index'])->name('feedback.list');
//feedback end thuan

//setting thuan
Route::get('setting',[SettingController::class,'index'])->name('setting.list');
//setting end thuan

//blog_category thuan
Route::get('blog-category',[BlogCategoryController::class,'index'])->name('blog.category.list');
//blog_category end thuan

//blog thuan
Route::get('blog',[BlogController::class,'index'])->name('blog.list');
//blog end thuan

//blog_category thuan
Route::get('tag',[TagController::class,'index'])->name('tag.list');
//blog_category end thuan

//contact page
Route::get('contact',[ContactController::class,'index'])->name('contact.list');

//discount_code page
Route::get('discount',[DiscountController::class,'index'])->name('discount.list');



Route::get('/error', function () {
    return view('admin.error.404-index');
});