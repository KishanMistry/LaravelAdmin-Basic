<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;

/*
  |--------------------------------------------------------------------------
  | Admin Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */
Route::middleware(['admin'])->group(function () {
    #--- Dashboard Routes
    Route::get('admin/dashboard', [Admin\DashboardController::class, 'index'])->name('admin.dashboard');

    #--- Users Routes
    Route::get('admin/profile', [Admin\ProfileController::class, 'index'])->name('admin.profile');
    Route::post('admin/profile/update', [Admin\ProfileController::class, 'update_profile'])->name('admin.update.profile');
    Route::post('admin/profile/verify-email', [Admin\ProfileController::class, 'verify_email'])->name('admin.verify.email');
    Route::get('admin/profile/change-password', [Admin\ProfileController::class, 'change_password'])->name('admin.change.password');
    Route::post('admin/profile/update-password', [Admin\ProfileController::class, 'update_password'])->name('admin.update.password');

    #--- Logout Route    
    Route::get('admin/logout', [Admin\LoginController::class, 'logout'])->name('admin.logout');
});

Route::middleware(['guest'])->group(function () {
    Route::get('admin/login', [Admin\LoginController::class, 'index'])->name('admin.login');
    Route::post('admin/dologin', [Admin\LoginController::class, 'doLogin'])->name('admin.dologin');
    Route::get('admin/forgot-password', [Admin\LoginController::class, 'forgot_password'])->name('admin.forgot.password');
    Route::post('admin/forgot-password/send-mail', [Admin\LoginController::class, 'reset_password'])->name('admin.reserpassword.sendmail');
    Route::get('password/reset/{token}', [Admin\LoginController::class, 'validate_password_request'])->name('admin.password.request');
    Route::post('password/reset', [Admin\LoginController::class, 'save_reset_password'])->name('admin.password.reset');
});




/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

