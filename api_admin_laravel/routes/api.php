<?php

use App\Http\Controllers\api\admin\UserController as AdminUserController;
use App\Http\Controllers\api\admin\FeedbackController as AdminFeedbackController;

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

Route::prefix('admin')->group(function () {

    Route::prefix('user')->group(function () {
        Route::get('/', [AdminUserController::class, 'index'])->name('user.list.api');
        Route::get('/show/{id}', [AdminUserController::class, 'show']);
        Route::post('/', [AdminUserController::class, 'store'])->name('user.add.api');
        Route::patch('edit/{id}', [AdminUserController::class, 'update'])->name('user.update.api');
        Route::delete('{id}', [AdminUserController::class, 'destroy']);
    });
    
    //feedback thuan
    Route::prefix('feedback')->group(function () {
        Route::get('/', [AdminFeedbackController::class, 'index'])->name('feedback.list.api');
        Route::get('/show/{id}', [AdminFeedbackController::class, 'show']);
        Route::post('/', [AdminFeedbackController::class, 'store'])->name('feedback.add.api');
        Route::patch('edit/{id}', [AdminFeedbackController::class, 'update'])->name('feedback.update.api');
        Route::delete('{id}', [AdminFeedbackController::class, 'destroy']);
    });
    //feedback-end thuan

    

});





// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
