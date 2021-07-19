<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SettingController;

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

Route::get('/', [HomeController::class,'index']);
Route::get('/detail/{slug}/{id}', [HomeController::class,'detail']);
Route::get('/category/{slug}/{id}', [HomeController::class,'category']);
Route::get('/all-categories', [HomeController::class,'all_categories']);
Route::post('/save-comment/{slug}/{id}', [HomeController::class,'save_comment']);
Route::get('/save-post-form', [HomeController::class,'save_post_form']);
Route::post('/save-post-form', [HomeController::class,'save_post_data']);
Route::get('/manage-posts', [HomeController::class,'manage_posts']);

// Admin
Route::get('/admin/login', [AdminController::class,'login']);
Route::get('/admin/logout', [AdminController::class,'logout']);
Route::post('/admin/login', [AdminController::class,'login_submit']);
Route::get('/admin/dashboard', [AdminController::class,'dashboard']);

// Comment
Route::get('/admin/comment', [AdminController::class,'comments']);
Route::get('/admin/comment/{id}/delete', [AdminController::class,'comment_delete']);

// User
Route::get('/admin/user', [AdminController::class,'users']);
Route::get('/admin/user/{id}/delete', [AdminController::class,'user_delete']);

// Categories
Route::resource('/admin/category', CategoryController::class);
Route::get('/admin/category/{id}/delete', [CategoryController::class,'destroy']);

// Posts 
Route::resource('/admin/post', PostController::class);
Route::get('/admin/post/{id}/delete', [PostController::class,'destroy']);

// Setings
Route::get('admin/setting',[SettingController::class,'index']);
Route::post('/admin/setting', [SettingController::class,'save_setting']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
