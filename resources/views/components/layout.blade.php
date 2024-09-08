<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pixel Positions</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-black text-white">

<div class="px-10">
  <header class="flex justify-between items-center py-4 border-b border-white/10">
    <a href="/" class="logo">
      <img src="{{ Vite::asset('resources/images/logo.svg') }}" alt="">
    </a>

    <nav>
      <ul class="flex space-x-6 font-bold">
        <li class="menu-item">
          <a href="#">Jobs</a>
        </li>
        <li class="menu-item">
          <a href="#">Careers</a>
        </li>
        <li class="menu-item">
          <a href="#">Salaries</a>
        </li>
        <li class="menu-item">
          <a href="#">Companies</a>
        </li>
      </ul>
    </nav>

    <div class="post-a-job">
      <a href="#">Post a Job</a>
    </div>
  </header>

  <main class="mt-10">
    {{ $slot }}
  </main>
</div>

</body>
</html>
