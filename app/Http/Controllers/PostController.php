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

    public function createPostView() {
        return view('create-post', ['title' => 'Create a post', 'method' => 'POST']);
    }

    public function editPostView(Post $post) {
        if (auth()->guard('web')->id() !== $post['user_id']) {
            return redirect('/');
        }

        return view('create-post', ['title' => 'Edit post', 'post' => $post, 'method' => 'PUT']);
    }

    public function editPost(Post $post, Request $request) {
        if (auth()->guard('web')->id() !== $post['user_id']) {
            return redirect('/');
        }

        $body = $request->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'body' => ['required', 'min:3'],
        ]);  

        $body['title'] = strip_tags($body['title']);
        $body['body'] = strip_tags($body['body']);

        $post->update($body);
        return redirect('/');
    }

    public function deletePost(Post $post) {
        if (auth()->guard('web')->id() === $post['user_id']) {
            $post->delete();
        }

        return redirect('/');
    }
}
