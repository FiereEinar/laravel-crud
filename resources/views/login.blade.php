<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>
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
    {{-- LOGIN --}}
    <form action="/login" method="POST" class="space-y-2 p-8 border rounded-md shadow-2xl">
      @csrf
      <h2 class="text-2xl font-semibold">Login</h2>
      <x-input-field name="loginEmail" label="Email:" type="email" value="{{old('loginEmail', '')}}" />
      <x-input-field name="loginPassword" label="Password:" type="password" value="{{old('loginPassword', '')}}" />
      @error('all')
        <small class="text-red-500">{{$message}}</small>
      @enderror
      <div>
        <button class="btn">Submit</button>
      </div>
    </form>
    @endauth
  </main>
</body>
</html>