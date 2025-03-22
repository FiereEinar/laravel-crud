<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function createPost(Request $request) {
        $body = $request->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'body' => ['required', 'min:3'],
        ]);

        $body['title'] = strip_tags($body['title']);
        $body['body'] = strip_tags($body['body']);
        $body['user_id'] = auth()->guard('web')->id();

        Post::create($body);
        return redirect('/');
    }
}
