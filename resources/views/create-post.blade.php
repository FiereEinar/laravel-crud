<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Create Post</title>
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
  @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
      @vite(['resources/css/app.css', 'resources/js/app.js'])
  @else
      <style></style>
  @endif
</head>
<body>
  <main class="flex justify-center items-center h-[100dvh]">
    @auth
    <form action="/post" method="POST" class="space-y-2 p-8 border rounded-md shadow-2xl">
      @csrf
      <h2 class="text-2xl font-semibold">Create a post</h2>
      <div class="input-field-container">
        <label for="title">Title:</label>
        <input name="title" class="border rounded-sm" type="text" id="title">
      </div>
      <div class="input-field-container">
        <label for="body">Content:</label>
        {{-- <input name="body" class="border rounded-sm" type="text" id="body"> --}}
        <textarea name="body" id="body" class="border rounded-sm" rows="3"></textarea>
      </div>
      <div>
        <button class="btn">Create post</button>
      </div>
    </form>
    @else
    <p>You are not logged in.</p>
    <a href="/login">
      <button class="btn">Login</button>
    </a>
    @endauth
  </main>
</body>
</html>