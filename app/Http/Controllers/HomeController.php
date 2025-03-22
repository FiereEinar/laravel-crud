<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $posts = Post::all();
        $currentUser = auth()->guard("web")->user();

        return view("home", ['posts' => $posts, 'currentUser' => $currentUser]);
    }

    public function login() {
        return view("login");
    }

    public function register() {
        return view("register");
    }

}
