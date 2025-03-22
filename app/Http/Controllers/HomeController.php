<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $posts = Post::all();
        return view("home", ['posts' => $posts]);
    }

    public function login() {
        return view("login");
    }

    public function register() {
        return view("register");
    }

    public function createPost() {
        return view('create-post');
    }
}
