<?php

namespace App\Http\Middleware;

use App\Models\Post;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsPostOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $post = $request->route("post");

        if ($post === null) {
            return redirect('/');
        }

        if (auth()->guard('web')->id() !== $post['user_id']) {
            return redirect('/');
        }

        return $next($request);
    }
}
