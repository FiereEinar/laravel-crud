<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Home routes
Route::get('/', [HomeController::class,'index']);
Route::get('/login', [HomeController::class,'login']);
Route::get('/register', [HomeController::class,'register']);

// User routes
Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);

// Post routes
Route::get('/post', [PostController::class,'createPostView']);
Route::post('/post', [PostController::class, 'createPost']);
Route::get('/post/{post}/edit', [PostController::class, 'editPostView']);
Route::put('/post/{post}', [PostController::class, 'editPost']);
Route::delete('/post/{post}', [PostController::class, 'deletePost']);
