<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\IsPostOwner;
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
Route::get('/post/{post}/edit', [PostController::class, 'editPostView'])->middleware(IsPostOwner::class);
Route::post('/post', [PostController::class, 'createPost']);
Route::put('/post/{post}', [PostController::class, 'editPost'])->middleware(IsPostOwner::class);
Route::delete('/post/{post}', [PostController::class, 'deletePost'])->middleware(IsPostOwner::class);
