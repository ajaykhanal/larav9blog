<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomauthController;
use App\Http\Controllers\PostController;

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

// Route::get('/', function () {
//     return view('index');
// });

// // Route::get('/dashboard', function () {
// //     return view('dashboard');
// // })->middleware(['auth'])->name('dashboard');

// require __DIR__.'/auth.php';

Route::get('/',[CustomauthController::class,'index'])->name('index');
Route::get('detail/{id}',[CustomauthController::class,'detail'])->name('detail');
Route::get('home',[CustomauthController::class,'home'])->name('home')->middleware('auth');
Route::get('register',[CustomauthController::class,'register'])->name('register');
Route::post('register',[CustomauthController::class,'register_data'])->name('register_data');
Route::get('login',[CustomauthController::class,'login'])->name('login');
Route::post('login_data',[CustomauthController::class,'login_data'])->name('login_data');
Route::get('logout',[CustomauthController::class,'logout'])->name('logout');

Route::get('category',[CategoryController::class,'index'])->name('category');
Route::post('category',[CategoryController::class,'add'])->name('add');

Route::get('post',[PostController::class,'index'])->name('index');
Route::post('post',[PostController::class,'add_post'])->name('add_post');
Route::get('edit_post/{id}/',[PostController::class,'edit_post'])->name('edit_post')->middleware('auth');
Route::put('edit_post/{id}/',[PostController::class,'edit_post_data'])->name('edit_post_data')->middleware('auth');
Route::get('my_posts',[PostController::class,'my_post'])->name('my_posts');
Route::get('delete_post/{id}/',[PostController::class,'delete_post'])->name('delete_post')->middleware('auth');
