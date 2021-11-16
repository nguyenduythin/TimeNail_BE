<?php

use App\Http\Controllers\admin\BillController;
use App\Http\Controllers\admin\CategoryServiceController;
use App\Http\Controllers\admin\ComboController;
use App\Http\Controllers\admin\ContactController;
use App\Http\Controllers\admin\DiscountController;
use App\Http\Controllers\admin\PermissionController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\FeedbackController;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\admin\BlogCategoryController;
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\TagController;
use App\Http\Controllers\admin\GalleryCategoryController;
use App\Http\Controllers\admin\GalleryController;
use App\Http\Controllers\admin\SliderShowController;
use App\Http\Controllers\api\client\LoginWithGoogleController;
use Illuminate\Support\Facades\Artisan;
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

//login
Route::get('admin-login', [LoginController::class, 'index'])->name('login.index');

//fix error login 
Route::get('/clear-cache', function () {
    //php artisan config:clear
    //php artisan cache:clear
    //php artisan route:clear
    //php artisan optimize:clear
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

Route::middleware('auth','role:Admin')->group(function () {
    Route::get('/',  [DashboardController::class, 'index'])->name('dashboard');

    //user
    Route::get('user', [UserController::class, 'index'])->name('user.list');
    //staff list
    Route::get('staff', [UserController::class, 'staff'])->name('staff.list');
    //role list
    Route::get('role', [RoleController::class, 'index'])->name('role.list');
    //permission list
    Route::get('permission', [PermissionController::class, 'index'])->name('permission.list');

    //blog_category thuan
    Route::get('category-blog', [BlogCategoryController::class, 'index'])->name('category-blog.list');
    //blog_category end thuan
    //feedback thuan
    Route::get('feedback', [FeedbackController::class, 'index'])->name('feedback.list');
    //feedback end thuan

    //setting thuan
    Route::get('setting', [SettingController::class, 'index'])->name('setting.list');
    //setting end thuan

    //blog_category thuan
    Route::get('blog-category', [BlogCategoryController::class, 'index'])->name('blog.category.list');
    //blog_category end thuan

    //gallery_category thuan
    Route::get('category-gallery', [GalleryCategoryController::class, 'index'])->name('category-gallery.list');
    //gallery_category end thuan

    //gallery thuan
    Route::get('gallery', [GalleryController::class, 'index'])->name('gallery.list');
    //gallery end thuan

    //slider thuan
    Route::get('slider', [SliderShowController::class, 'index'])->name('slider.list');
    //slider end thuan


    //contact page
    Route::get('contact', [ContactController::class, 'index'])->name('contact.list');
    //blog thuan
    Route::get('blog', [BlogController::class, 'index'])->name('blog.list');
    //blog end thuan

    //blog_category thuan
    Route::get('tag', [TagController::class, 'index'])->name('tag.list');
    //blog_category end thuan

    //bill
    Route::get('bill', [BillController::class, 'index'])->name('bill.list');

    //service
    //contact page
    Route::get('contact', [ContactController::class, 'index'])->name('contact.list');

    //discount_code page
    Route::get('discount', [DiscountController::class, 'index'])->name('discount.list');

    //categories service
    Route::get('cate-service', [CategoryServiceController::class, 'index'])->name('cate-service.list');

    //service

    Route::get('service', [ServiceController::class, 'index'])->name('service.list');

    //combo
    Route::get('combo', [ComboController::class, 'index'])->name('combo.list');
});
Route::get('/error', function () {
    return view('admin.error.404-index');
});
