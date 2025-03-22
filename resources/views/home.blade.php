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
  <main class="flex justify-center items-center h-[100dvh]">
    @auth
    <form action="/logout" method="POST" class="flex flex-col items-center gap-3">
      @csrf
      <p>You are logged in.</p>
      <button class="bg-blue-500 text-white px-3 py-1 rounded-md">Logout</button>
    </form>
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