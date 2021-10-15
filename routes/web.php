<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\frontendController;

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
Route::get('/',[frontendController::class,'index'])->name('index');

Route::get('/about',function (){
    return view ('frontend.about');
});

Route::get('/blog',function (){
    return view ('frontend.blog');
});
Route::get('/contact',function (){
    return view ('frontend.contact');
});
Route::get('/post/{id}', [frontendController::class,'details']);
Route::get('/post', [frontendController::class,'allPost']);
Route::post('/comment/create/{id}', [frontendController::class,'commentCreate']);

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('/admin/home', function () {
//    return view('admin.home');
//})->middleware(['auth:admin'])->name('admin.home')->middleware('verified:admin.verification.notice');

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth:web'])->name('dashboard')->middleware('verified');

//require __DIR__.'/auth.php';
require __DIR__.'/admin-auth.php';
