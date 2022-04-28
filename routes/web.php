<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\SetPasswordController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>'auth'],function(){
    Route::resource("tenants",TenantController::class);
    Route::get("setpassword",[SetPasswordController::class,'index'])->name('setpassword');
    Route::post("setpassword",[SetPasswordController::class,'store'])->name('setpassword.store');
});

Route::get('invitation/{user}',[TenantController::class,'invitation'])->name('invitation');

