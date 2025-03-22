<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Home routes
Route::get('/', [HomeController::class,'index']);
Route::get('/login', [HomeController::class,'login']);
Route::get('/register', [HomeController::class,'register']);
Route::get('/post', [HomeController::class,'createPost']);

// User routes
Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);

// Post routes
Route::post('/post', [PostController::class, 'createPost']);
