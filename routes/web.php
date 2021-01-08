<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WellcomeController;
use Illuminate\Support\Facades\Route;




Auth::routes();
Route::get('/',[WellcomeController::class ,'index'])->name('home');

Route::get('/profile/update/{user}',[ProfileController::class , 'update'])->name('updateform');
Route::patch('/profile/update/{user}',[ProfileController::class , 'store'])->name('storeupdateform');


Route::get('/posts' , [PostsController::class ,'index'])->name('posts_index');
Route::post('/newpost' ,[PostsController::class ,'create'])->name('post_create');

Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

Route::get('/post/{post}/like', [LikesController::class, 'store'])->name('like');
Route::get('/post/{post}/unllike', [LikesController::class, 'unlike'])->name('unlike');
