<?php

use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\FeedbackController;
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
Route::get('user/{id}',[UserController::class,'remove'])->name('user.remove');
Route::post('user',[UserController::class,'add'])->name('user.add');

//feedback thuan
Route::get('feedback',[FeedbackController::class,'index'])->name('feedback.list');
Route::get('feedback/{id}',[FeedbackController::class,'remove'])->name('feedback.remove');
Route::post('feedback',[FeedbackController::class,'add'])->name('feedback.add');
//feedback end thuan


Route::get('/error', function () {
    return view('admin.error.404-index');
});