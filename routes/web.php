<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Admin\LoginController As AdminLoginController;
use App\Http\Controllers\Admin\DashboardController As AdminDashboardController;
use App\Http\Controllers\Admin\EditController As AdminEditController;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('account/login',[Controller::class,'index'])->name('account.login');
Route::get('account/register',[Controller::class,'index1'])->name('account.register');
Route::get('admin/login',[Controller::class,'index2'])->name('admin.login');
// Route::get('merchant/create',[DashboardController::class,'createMerchant'])->name('merchant.create');
// Route::get('admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/dashboard/search', [DashboardController::class, 'search'])->name('dashboard.search');


Route::group(['prefix' => 'account'],function(){
    Route::group(['middleware'=> 'guest'],function(){
        Route::get('login',[LoginController::class,'index'])->name('account.login');
        Route::get('register',[LoginController::class,'register'])->name('account.register');
        Route::post('process-register',[LoginController::class,'processRegister'])->name('account.processRegister');
        Route::post('authenticate',[LoginController::class,'authenticate'])->name('account.authenticate');


    });
    Route::group(['middleware'=> 'auth'],function(){
        Route::get('logout',[LoginController::class,'logout'])->name('account.logout');
        Route::get('dashboard',[DashboardController::class,'index'])->name('account.dashboard');
        Route::get('merchant/create',[DashboardController::class,'createMerchant'])->name('account.merchant.create');
        Route::get('dashboard/export', [AdminDashboardController::class, 'export'])->name('account.dashboard.export');


    });
});

// Move the admin login route above the admin dashboard routes
Route::group(['prefix' => 'admin'], function () {
    Route::group(['middleware'=> 'admin.guest'], function () {
        Route::get('login', [AdminLoginController::class,'index'])->name('admin.login');
        Route::post('authenticate', [AdminLoginController::class,'authenticate'])->name('admin.authenticate');
        Route::post('merchant/store', [AdminDashboardController::class, 'storeMerchant'])->name('admin.merchant.store');

    });

    Route::group(['middleware'=> 'admin.auth'], function () {
        Route::get('logout', [AdminLoginController::class,'logout'])->name('admin.logout');
        Route::get('dashboard', [AdminDashboardController::class,'index'])->name('admin.dashboard');
        Route::get('dashboard/search', [AdminDashboardController::class, 'search1'])->name('admin.dashboard.search');
        Route::get('dashboard/edit/{transaction_id}', [AdminDashboardController::class, 'edit'])->name('admin.dashboard.edit');
        Route::get('merchant/create',[AdminDashboardController::class,'createMerchant'])->name('admin.merchant.create');
        Route::get('dashboard/export', [AdminDashboardController::class, 'export'])->name('admin.dashboard.export');
        Route::put('dashboard/update/{transaction_id}', [AdminEditController::class, 'update'])->name('admin.dashboard.update');
        Route::delete('dashboard/delete/{transaction_id}', [AdminEditController::class, 'delete'])->name('admin.dashboard.delete');



    });
});

