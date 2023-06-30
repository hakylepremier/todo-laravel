<!DOCTYPE html>
<html lang="en">
  <head>
    <title>todo</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Serif:wght@400;600&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
      [x-cloak] { display: none !important; }
    </style>
    @livewireStyles
    {{-- <link href="css/main.css" rel="stylesheet"> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>
  <body class="bg-primary text-white px-4 font-plex-serif" x-data="{ formOpen: false }">
    <header class="flex justify-between my-2">
      <h1 class="text-[2rem] font-bold">todo</h1>
      @livewire('add-button')
    </header>

    @yield('content')
 

   <footer>
     Copyright <script>new Date().getFullYear()</script>
    </footer>
    @livewireScripts
  </body>
</html>
