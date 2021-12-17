<?php

use App\Http\Controllers\api\admin\BillController;
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
use App\Http\Controllers\api\client\CategoryServiceController as ClientCategoryServiceController;
use App\Http\Controllers\api\client\ComboController as ClientComboController;
use App\Http\Controllers\api\client\ServiceController as ClientServiceController;
use App\Models\CategoryService;
use App\Http\Controllers\api\admin\BlogCategoryController as AdminBlogCategoryController;
use App\Http\Controllers\api\admin\BlogController as AdminBlogController;
use App\Http\Controllers\api\admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\api\admin\LoginController;
use App\Http\Controllers\api\admin\StaffController as AdminStaffController;
use App\Http\Controllers\api\admin\TagController as AdminTagController;
use App\Http\Controllers\api\admin\GalleryCategoryController as AdminGalleryCategoryController;
use App\Http\Controllers\api\admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\api\admin\NotificationController;
use App\Http\Controllers\api\admin\SliderShowController as AdminSliderShowController;
use App\Http\Controllers\api\client\BillController as ClientBillController;
use App\Http\Controllers\api\client\BlogController as ClientBlogController;
use App\Http\Controllers\api\client\ContactController as ClientContactController;
use App\Http\Controllers\api\client\DiscountController as ClientDiscountController;
use App\Http\Controllers\api\client\FeedbackController as ClientFeedbackController;
use App\Http\Controllers\api\client\GalleryCategoryController as ClientGalleryCategoryController;
use App\Http\Controllers\api\client\SettingController as ClientSettingController;
use App\Http\Controllers\api\client\loginController as ClientLoginController;
use App\Http\Controllers\api\client\LoginWithGoogleController;
use App\Http\Controllers\api\client\NewPasswordController;
use App\Http\Controllers\api\client\SlideController;
use App\Http\Controllers\api\client\StaffController as ClientStaffController;
use App\Http\Controllers\api\client\UserController as ClientUserController;
use App\Models\BillMember;
use App\Models\Combo;
use App\Models\Service;
use App\Models\User;
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
//login & resigter
Route::prefix('login')->group(function () {
    Route::get('/google/redirect', [LoginWithGoogleController::class, 'loginWithGoogle'])->name('google.login.api');
    Route::get('/google/callback/', [LoginWithGoogleController::class, 'callbackFromGoogle']);
});

// password reset
Route::post('forgot-password', [NewPasswordController::class, 'forgotPassword']);
Route::post('reset-password', [NewPasswordController::class, 'reset']);
//client
Route::prefix('client')->group(function () {
    Route::post('/login', [ClientLoginController::class, 'login']);
    Route::get('/logout', [ClientLoginController::class, 'logout']);
    Route::post('/login-google', [ClientUserController::class, 'postUserGG']);
    Route::post('/register', [ClientLoginController::class, 'register']);

    //info
    Route::prefix('user-info')->group(function () {
        Route::get('/', [ClientUserController::class, 'index']);
        Route::post('/info', [ClientUserController::class, 'info']);
        Route::post('/password', [ClientUserController::class, 'password']);
    });

    Route::get('/list-staff', [ClientStaffController::class, 'getAll']);
    Route::post('/unavailable', [ClientStaffController::class, 'un_available_staff']);
    Route::prefix('staff-info')->group(function () {
        Route::get('/', [ClientStaffController::class, 'index']);
        Route::post('/info', [ClientStaffController::class, 'info']);
        Route::post('/password', [ClientStaffController::class, 'password']);
    });

    //notification
    Route::get('all-notification/{id}', [NotificationController::class, 'show']);

    //combo
    Route::prefix('combo')->group(function () {
        Route::get('/', [ClientComboController::class, 'index'])->name('combo.list');
        Route::get('/show/{id}', [ClientComboController::class, 'show']);
    });
    //cate service
    Route::prefix('cate-service')->group(function () {
        Route::get('/', [ClientCategoryServiceController::class, 'index'])->name('cate-service.list');
        Route::get('/show/{id}', [ClientCategoryServiceController::class, 'show']);
    });
    //service
    Route::prefix('service')->group(function () {
        Route::get('/', [ClientServiceController::class, 'index'])->name('service.list');
        Route::get('/show/{id}', [ClientServiceController::class, 'show']);
    });
    //blog
    Route::prefix('blog')->group(function () {
        Route::get('/', [ClientBlogController::class, 'index'])->name('blog.list');
        Route::get('/show/{id}', [ClientBlogController::class, 'show']);
    });
    //gallery
    Route::prefix('gallery-category')->group(function () {
        Route::get('/', [ClientGalleryCategoryController::class, 'index']);
        Route::get('/show/{id}', [ClientGalleryCategoryController::class, 'show']);
    });
    //discount
    Route::prefix('discount')->group(function () {
        Route::post('/', [ClientDiscountController::class, 'show']);
    });
    //bill
    Route::prefix('bill')->group(function () {
        Route::get('/{id}', [ClientBillController::class, 'index']);
        Route::get('/show/{id}', [ClientBillController::class, 'show']);
        Route::post('/', [ClientBillController::class, 'store']);
        Route::get('/cancel/{id}', [ClientBillController::class, 'cancel']);
    });
    //contact
    Route::prefix('contact')->group(function () {
        Route::post('/', [ClientContactController::class, 'store']);
    });
    //feedback
    Route::prefix('feedback')->group(function () {
        Route::get('/',[ClientFeedbackController::class,'index']);
        Route::get('/show/{id}',[ClientFeedbackController::class,'show']);
        Route::post('/', [ClientFeedbackController::class, 'store']);
    });
    //setting
    Route::prefix('setting')->group(function () {
        Route::get('/', [ClientSettingController::class, 'index']);
        Route::get('/show/{id}', [ClientSettingController::class, 'show']);
    });
    //slide
    Route::prefix('slide')->group(function () {
        Route::get('/', [SlideController::class, 'index']);
    });
});


Route::post('/login', [LoginController::class, 'login'])->name('login.admin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout.admin');

//read notification 
Route::get('read-all-notifi', [NotificationController::class, 'readAll'])->name('read-all');
Route::get('read-all-notifi/{id}', [NotificationController::class, 'read'])->name('read');
Route::get('read-client-notifi/{user}/{id}', [NotificationController::class, 'readClient']);
Route::get('read-client-all-notifi/{id}', [NotificationController::class, 'readAllClient']);



Route::prefix('admin')->middleware('auth:sanctum')->group(function () {
    Route::get('/dashboard/{start}/{end}', [AdminDashboardController::class, 'index'])->name('dashboard.api');
    Route::get('/dashboard/first-date', [AdminDashboardController::class, 'getOnlyDateWorkFist'])->name('getDateWorkFirst.api');

    // user
    Route::prefix('user')->group(function () {
        Route::get('/', [AdminUserController::class, 'index'])->name('user.list.api');
        Route::get('/show/{id}', [AdminUserController::class, 'show']);
        Route::post('/', [AdminUserController::class, 'store'])->name('user.add.api');
        Route::post('edit', [AdminUserController::class, 'update'])->name('user.update.api');
        Route::delete('{id}', [AdminUserController::class, 'destroy']);
    });
    //staff
    Route::prefix('staff')->group(function () {
        Route::get('/', [AdminStaffController::class, 'index'])->name('staff.list.api');
        Route::get('/show/{id}', [AdminStaffController::class, 'show']);
        Route::post('/', [AdminStaffController::class, 'store'])->name('staff.add.api');
        Route::post('edit', [AdminStaffController::class, 'update'])->name('staff.update.api');
        Route::delete('{id}', [AdminStaffController::class, 'destroy']);
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

    //tag thuan
    Route::prefix('tag')->group(function () {
        Route::get('/', [AdminTagController::class, 'index'])->name('tag.list.api');
        Route::get('/show/{id}', [AdminTagController::class, 'show']);
        Route::post('/', [AdminTagController::class, 'store'])->name('tag.add.api');
        Route::post('edit', [AdminTagController::class, 'update'])->name('tag.update.api');
        Route::delete('{id}', [AdminTagController::class, 'destroy']);
    });
    //tag-end thuan

    //gallery-category thuan
    Route::prefix('gallery-category')->group(function () {
        Route::get('/', [AdminGalleryCategoryController::class, 'index'])->name('gallery.category.list.api');
        Route::get('/show/{id}', [AdminGalleryCategoryController::class, 'show']);
        Route::post('/', [AdminGalleryCategoryController::class, 'store'])->name('gallery.category.add.api');
        Route::post('edit', [AdminGalleryCategoryController::class, 'update'])->name('gallery.category.update.api');
        Route::delete('{id}', [AdminGalleryCategoryController::class, 'destroy']);
    });
    //gallery-category-end thuan

    //gallery thuan
    Route::prefix('gallery')->group(function () {
        Route::get('/', [AdminGalleryController::class, 'index'])->name('gallery.list.api');
        Route::get('/show/{id}', [AdminGalleryController::class, 'show']);
        Route::post('/', [AdminGalleryController::class, 'store'])->name('gallery.add.api');
        Route::post('edit', [AdminGalleryController::class, 'update'])->name('gallery.update.api');
        Route::delete('{id}', [AdminGalleryController::class, 'destroy']);
    });
    //gallery-end thuan

    //slider thuan
    Route::prefix('slider')->group(function () {
        Route::get('/', [AdminSliderShowController::class, 'index'])->name('slider.list.api');
        Route::get('/show/{id}', [AdminSliderShowController::class, 'show']);
        Route::post('/', [AdminSliderShowController::class, 'store'])->name('slider.add.api');
        Route::post('edit', [AdminSliderShowController::class, 'update'])->name('slider.update.api');
        Route::delete('{id}', [AdminSliderShowController::class, 'destroy']);
    });
    //slider-end thuan

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
    Route::prefix('cate-service')->group(function () {
        Route::get('/', [CategoryServiceController::class, 'index'])->name('cate-service.list.api');
        Route::get('/show/{id}', [CategoryServiceController::class, 'show']);
        Route::post('/', [CategoryServiceController::class, 'store'])->name('cate-service.add.api');
        Route::post('edit', [CategoryServiceController::class, 'update'])->name('cate-service.update.api');
        Route::delete('{id}', [CategoryServiceController::class, 'destroy']);
    });

    //service
    Route::prefix('service')->group(function () {
        Route::get('/', [ServiceController::class, 'index'])->name('service.list.api');
        Route::get('/show/{id}', [ServiceController::class, 'show']);
        Route::post('/', [ServiceController::class, 'store'])->name('service.add.api');
        Route::post('edit', [ServiceController::class, 'update'])->name('service.update.api');
        Route::delete('{id}', [ServiceController::class, 'destroy']);
    });

    //combo
    Route::prefix('combo')->group(function () {
        Route::get('/', [ComboController::class, 'index'])->name('combo.list.api');
        Route::get('/show/{id}', [ComboController::class, 'show']);
        Route::post('/', [ComboController::class, 'store'])->name('combo.add.api');
        Route::post('edit', [ComboController::class, 'update'])->name('combo.update.api');
        Route::delete('{id}', [ComboController::class, 'destroy']);
    });

    //bill
    Route::prefix('bill')->group(function () {
        Route::get('/', [BillController::class, 'index'])->name('bill.list.api');
        Route::get('/show/{id}', [BillController::class, 'show']);
        // Route::post('/', [BillController::class, 'store'])->name('bill.add.api');
        Route::post('edit', [BillController::class, 'update'])->name('bill.update.api');
        Route::delete('{id}', [BillController::class, 'destroy']);
        Route::get('/staff', [BillController::class, 'staff'])->name('bill-staff.list.api');
    });
});





// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
