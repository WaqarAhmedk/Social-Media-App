<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\WellcomeController;
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
Auth::routes();
Route::get('/',[WellcomeController::class ,'index'])->name('home');


Route::get('/posts' , [PostsController::class ,'index'])->name('posts_index');
Route::post('/newpost' ,[PostsController::class ,'create'])->name('post_create');

Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

Route::get('/post/{post}/like', [LikesController::class, 'store'])->name('like');
Route::get('/post/{post}/unllike', [LikesController::class, 'unlike'])->name('unlike');
