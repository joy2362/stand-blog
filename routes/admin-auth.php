<?php

use App\Http\Controllers\Admin\AuthenticatedSessionController ;
use App\Http\Controllers\Admin\ConfirmablePasswordController;
use App\Http\Controllers\Admin\EmailVerificationNotificationController;
use App\Http\Controllers\admin\EmailVerificationPromptController;
use App\Http\Controllers\Admin\NewPasswordController;
use App\Http\Controllers\Admin\PasswordResetLinkController;
use App\Http\Controllers\Admin\RegisterUserController;
use App\Http\Controllers\Admin\VerifyEmailController;
use App\Http\Controllers\Admin\categoryController;
use App\Http\Controllers\Admin\adminController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {



    Route::get('/home', function () {
        return view('admin.panel.index');
    })->middleware(['auth:admin'])->name('admin.home');

    Route::get('/profile',function(){
       return view('admin.panel.profile');
    })->middleware(['auth:admin'])->name('admin.profile');




    //category
    Route::get('/category', [categoryController::class, 'index'])->name('admin.category');

    Route::get('/category/create', [categoryController::class, 'create']);
    Route::post('/category/add', [categoryController::class, 'store']);

    Route::get('/category/edit/{id}', [categoryController::class, 'edit']);
    Route::post('/category/update/{id}', [categoryController::class, 'update']);

    Route::get('/category/delete/{id}', [categoryController::class, 'destroy']);


    //Admins
    Route::get('/access/all', [adminController::class, 'index'])->name('admin.access')->middleware('password.confirm:admin.password.confirm');;

    Route::get('/access/create', [adminController::class, 'create'])    ;
    Route::post('/access/add', [adminController::class, 'store'])->name('admin.register');

    Route::get('/access/delete/{id}', [adminController::class, 'destroy']);

    //auth
//    Route::get('/register', [RegisterUserController::class, 'create'])
//        ->middleware('guest')
//        ->name('admin.register');

//    Route::post('/register', [RegisterUserController::class, 'store'])
//        ->middleware('guest');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->middleware('guest')
    ->name('admin.login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware('guest');
Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
    ->middleware('guest')
    ->name('admin.password.request');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
->middleware('guest')
->name('admin.password.email');

Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
    ->middleware('guest')
    ->name('admin.password.reset');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
    ->middleware('guest')
    ->name('admin.password.update');

Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])
    ->middleware('auth:admin')
    ->name('admin.verification.notice');
//done
Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
    ->middleware(['auth:admin', 'signed', 'throttle:6,1'])
    ->name('admin.verification.verify');

Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    ->middleware(['auth:admin', 'throttle:6,1'])
    ->name('admin.verification.send');

Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])
    ->middleware('auth:admin')
    ->name('admin.password.confirm');

Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store'])
    ->middleware('auth:admin');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware(['auth:admin'])
    ->name('admin.logout');
});
