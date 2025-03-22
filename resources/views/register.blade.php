<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
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
    <div class="text-center">
      <p>You are already logged in.</p>
    </div>
    @else
    {{-- REGISTER --}}
    <form action="/register" method="POST" class="space-y-2 p-8 border rounded-md shadow-2xl">
      @csrf
      <h2 class="text-2xl font-semibold">Register</h2>
      <div class="input-field-container">
        <label for="name">Name:</label>
        <input name="name" class="border rounded-sm" type="text" id="name">
      </div>
      <div class="input-field-container">
        <label for="email">Email:</label>
        <input name="email" class="border rounded-sm" type="email" id="email">
      </div>
      <div class="input-field-container">
        <label for="password">Password:</label>
        <input name="password" class="border rounded-sm" type="password" id="password">
      </div>
      <div>
        <button class="btn">Submit</button>
      </div>
    </form>
    @endauth
  </main>
</body>
</html>