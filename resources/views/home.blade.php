<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
  @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
      @vite(['resources/css/app.css', 'resources/js/app.js'])
  @else
      <style></style>
  @endif
</head>
<body>
  <main class="flex flex-col justify-center items-center gap-2 h-[100dvh] py-5">
    @auth
    <form action="/logout" method="POST" class="flex flex-col items-center gap-3">
      @csrf
      <p>You are logged in.</p>
      <p>{{$currentUser['name']}}</p>
      <div class="flex gap-3">
        <a href="/post">
          <button type="button" class="btn">Create post</button>
        </a>
        <button class="btn">Logout</button>
      </div>
    </form>

    <div class="space-y-2 overflow-y-auto overflow-x-hidden">
      @foreach ($posts as $post)
      <article class="p-3 border rounded-sm shadow-sm max-w-[350px]">
        <h3 class="text-xl">{{$post['title']}}</h3>
        <small>By: {{$post['user']->name}}</small>
        <p>{{$post['body']}}</p>

        <div class="flex gap-2 mt-2">
          <a href="/post/{{$post->id}}/edit">
            <button class="btn">Edit</button>
          </a>
          <form action="/post/{{$post->id}}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Delete</button>
          </form>
        </div>
      </article>
      @endforeach
    </div>

    @else

    <div>
      <a href="/login">
        <button class="btn">Login</button>
      </a>
      <a href="/register">
        <button class="btn">Register</button>
      </a>
    </div>
    @endauth
  </main>
</body>
</html>