<?php

use App\Http\Controllers\api\admin\ContactController;
use App\Http\Controllers\api\admin\DiscountController;
use App\Http\Controllers\api\admin\UserController as AdminUserController;

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

    // user
    Route::prefix('user')->group(function () {
        Route::get('/', [AdminUserController::class, 'index'])->name('user.list.api');
        Route::get('/show/{id}', [AdminUserController::class, 'show']);
        Route::post('/', [AdminUserController::class, 'store'])->name('user.add.api');
        Route::post('edit', [AdminUserController::class, 'update'])->name('user.update.api');
        Route::delete('{id}', [AdminUserController::class, 'destroy']);
    });


    // contact
    Route::prefix('contact')->group(function(){
        Route::get('/',[ContactController::class,'index'])->name('contact.list.api');
        Route::delete('{id}',[ContactController::class,'destroy']);
    });


    //discount
    Route::prefix('discount')->group(function(){
        Route::get('/',[DiscountController::class,'index'])->name('discount.list.api');
        Route::post('/', [DiscountController::class, 'store'])->name('discount.add.api');
        Route::delete('{id}',[DiscountController::class,'destroy']);
    });
 

    

});





// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
