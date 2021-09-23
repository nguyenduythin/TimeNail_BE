<?php

use App\Http\Controllers\admin\ContactController;
use App\Http\Controllers\admin\DiscountController;
use App\Http\Controllers\admin\UserController;
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

//contact page
Route::get('contact',[ContactController::class,'index'])->name('contact.list');

//discount_code page
Route::get('discount',[DiscountController::class,'index'])->name('discount.list');



Route::get('/error', function () {
    return view('admin.error.404-index');
});