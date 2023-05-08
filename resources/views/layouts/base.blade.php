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
    {{-- <link href="css/main.css" rel="stylesheet"> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>
  <body class="bg-primary text-white px-4 font-plex-serif" x-data="{ formOpen: false }">
    <header class="flex justify-between my-2">
      <h1 class="text-[2rem] font-bold">todo</h1>
      <a href="#" class="px-3 py-4 relative rounded-lg hover:bg-secondary hover:transition-colors" x-on:click="formOpen = ! formOpen">
        <div class="bg-white w-6 h-1 rounded mt-1 block "></div>
        <div class="bg-white w-6 h-1 rounded rotate-90 absolute top-[19px] "></div>
      </a>
    </header>

    @yield('content')
 

   <footer>
     Copyright <script>new Date().getFullYear()</script>
    </footer>
  </body>
</html>
