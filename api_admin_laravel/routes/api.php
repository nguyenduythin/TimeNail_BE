<?php

use App\Http\Controllers\api\admin\CategoryServiceController;
use App\Http\Controllers\api\admin\ComboController;
use App\Http\Controllers\api\admin\ContactController;
use App\Http\Controllers\api\admin\DiscountController;
use App\Http\Controllers\api\admin\ServiceController;
use App\Http\Controllers\api\admin\UserController as AdminUserController;
use App\Http\Controllers\api\admin\FeedbackController as AdminFeedbackController;
use App\Http\Controllers\api\admin\PermissionController;
use App\Http\Controllers\api\admin\RoleController;
use App\Http\Controllers\api\admin\SettingController as AdminSettingController;
use App\Http\Controllers\api\admin\BlogCategoryController as AdminBlogCategoryController;
use App\Http\Controllers\api\admin\BlogController as AdminBlogController;
use App\Http\Controllers\api\admin\LoginController;
use App\Http\Controllers\api\admin\TagController as AdminTagController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/login', [LoginController::class, 'login'])->name('login.admin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout.admin');



Route::prefix('admin')->middleware('auth:sanctum')->group(function () {
    // user
    Route::prefix('user')->group(function () {
        Route::get('/', [AdminUserController::class, 'index'])->name('user.list.api');
        Route::get('/show/{id}', [AdminUserController::class, 'show']);
        Route::post('/', [AdminUserController::class, 'store'])->name('user.add.api');
        Route::post('edit', [AdminUserController::class, 'update'])->name('user.update.api');
        Route::delete('{id}', [AdminUserController::class, 'destroy']);
    });

    // permission
    Route::prefix('permission')->group(function () {
        Route::get('/', [PermissionController::class, 'index'])->name('permission.list.api');
        Route::get('/show/{id}', [PermissionController::class, 'show']);
        Route::post('/', [PermissionController::class, 'store'])->name('permission.add.api');
        Route::post('edit', [PermissionController::class, 'update'])->name('permission.update.api');
        Route::delete('{id}', [PermissionController::class, 'destroy']);
    });
      // role
      Route::prefix('role')->group(function () {
        Route::get('/', [RoleController::class, 'index'])->name('role.list.api');
        Route::get('/show/{id}', [RoleController::class, 'show']);
        Route::post('/', [RoleController::class, 'store'])->name('role.add.api');
        Route::post('edit', [RoleController::class, 'update'])->name('role.update.api');
        Route::delete('{id}', [RoleController::class, 'destroy']);
    });

    //feedback thuan
    Route::prefix('feedback')->group(function () {
        Route::get('/', [AdminFeedbackController::class, 'index'])->name('feedback.list.api');
        Route::get('/show/{id}', [AdminFeedbackController::class, 'show']);
        Route::post('/', [AdminFeedbackController::class, 'store'])->name('feedback.add.api');
        Route::post('edit', [AdminFeedbackController::class, 'update'])->name('feedback.update.api');
        Route::delete('{id}', [AdminFeedbackController::class, 'destroy']);
    });
    //feedback-end thuan

    //setting thuan
    Route::prefix('setting')->group(function () {
        Route::get('/', [AdminSettingController::class, 'index'])->name('setting.list.api');
        Route::get('/show/{id}', [AdminSettingController::class, 'show']);
        Route::post('/', [AdminSettingController::class, 'store'])->name('setting.add.api');
        Route::post('edit', [AdminSettingController::class, 'update'])->name('setting.update.api');
        Route::delete('{id}', [AdminSettingController::class, 'destroy']);
    });
    //setting-end thuan

    //setting thuan
    Route::prefix('blog-category')->group(function () {
        Route::get('/', [AdminBlogCategoryController::class, 'index'])->name('blog.category.list.api');
        Route::get('/show/{id}', [AdminBlogCategoryController::class, 'show']);
        Route::post('/', [AdminBlogCategoryController::class, 'store'])->name('blog.category.add.api');
        Route::post('edit', [AdminBlogCategoryController::class, 'update'])->name('blog.category.update.api');
        Route::delete('{id}', [AdminBlogCategoryController::class, 'destroy']);
    });
    //setting-end thuan

    //setting thuan
    Route::prefix('blog')->group(function () {
        Route::get('/', [AdminBlogController::class, 'index'])->name('blog.list.api');
        Route::get('/show/{id}', [AdminBlogController::class, 'show']);
        Route::post('/', [AdminBlogController::class, 'store'])->name('blog.add.api');
        Route::post('edit', [AdminBlogController::class, 'update'])->name('blog.update.api');
        Route::delete('{id}', [AdminBlogController::class, 'destroy']);
    });
    //setting-end thuan

    //setting thuan
    Route::prefix('tag')->group(function () {
        Route::get('/', [AdminTagController::class, 'index'])->name('tag.list.api');
        Route::get('/show/{id}', [AdminTagController::class, 'show']);
        Route::post('/', [AdminTagController::class, 'store'])->name('tag.add.api');
        Route::post('edit', [AdminTagController::class, 'update'])->name('tag.update.api');
        Route::delete('{id}', [AdminTagController::class, 'destroy']);
    });
    //setting-end thuan

    // contact
    Route::prefix('contact')->group(function () {
        Route::get('/', [ContactController::class, 'index'])->name('contact.list.api');
        Route::delete('{id}', [ContactController::class, 'destroy']);
    });


    //discount
    Route::prefix('discount')->group(function () {
        Route::get('/', [DiscountController::class, 'index'])->name('discount.list.api');
        Route::post('/', [DiscountController::class, 'store'])->name('discount.add.api');
        Route::delete('{id}', [DiscountController::class, 'destroy']);
    });


    //category service
    Route::prefix('cate-service')->group(function(){
        Route::get('/',[CategoryServiceController::class,'index'])->name('cate-service.list.api');
        Route::get('/show/{id}', [CategoryServiceController::class, 'show']);
        Route::post('/', [CategoryServiceController::class, 'store'])->name('cate-service.add.api');
        Route::post('edit', [CategoryServiceController::class, 'update'])->name('cate-service.update.api');
        Route::delete('{id}',[CategoryServiceController::class,'destroy']);
    });

    //service
    Route::prefix('service')->group(function(){
        Route::get('/',[ServiceController::class,'index'])->name('service.list.api');
        Route::get('/show/{id}', [ServiceController::class, 'show']);
        Route::post('/', [ServiceController::class, 'store'])->name('service.add.api');
        Route::post('edit', [ServiceController::class, 'update'])->name('service.update.api');
        Route::delete('{id}',[ServiceController::class,'destroy']);
    });


    //combo
    Route::prefix('combo')->group(function(){
        Route::get('/',[ComboController::class,'index'])->name('combo.list.api');
        Route::post('/', [ComboController::class, 'store'])->name('combo.add.api');
    });
 

    

});





// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
