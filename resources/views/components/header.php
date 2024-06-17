<html>
<head>
    <title>PHP framework</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<nav class="bg-blue-800">
  <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
    <div class="relative flex h-16 items-center justify-between">
      <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">

            <div class="flex flex-shrink-0 items-center">
            <h1 class="text-gray-50 text-lg">Logo</h1>
            </div>

            <div class="hidden sm:ml-6 sm:block">
            <div class="flex space-x-4 items-center">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <a href="/" class="rounded-md <?= $_SERVER['REQUEST_URI'] == '/' ? 'bg-gray-900' : '' ?> px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white" aria-current="page">Home</a>
                <a href="/about" class="rounded-md <?= $_SERVER['REQUEST_URI'] == '/about' ? 'bg-gray-900' : '' ?> px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">About</a>
                <a href="/contact" class="rounded-md <?= $_SERVER['REQUEST_URI'] == '/contact' ? 'bg-gray-900' : '' ?> px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Contact</a>
                <?php if(!isset($_SESSION['user'])) : ?>
                <a href="/login" class="rounded-md <?= $_SERVER['REQUEST_URI'] == '/login' ? 'bg-gray-900' : '' ?> px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Login</a>
                <a href="/register" class="rounded-md <?= $_SERVER['REQUEST_URI'] == '/register' ? 'bg-gray-900' : '' ?> px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Register</a>
                <?php endif; ?>
                <?php if(isset($_SESSION['user'])) : ?>
                  <div class="h-full">
                  <form action="/logout" method="post" class="my-auto">
                    <div class="rounded-md px-3 py-2 text-sm cursor-pointer font-medium text-gray-300 hover:bg-gray-700 hover:text-white">
                    <input class="cursor-pointer" type="submit" value="Logout"/>
                    </div>
                  </form>
                  </div>
                 <?php endif; ?>
            </div>
            </div>
      
      </div>
    </div>
  </div>

  <!-- Mobile menu, show/hide based on menu state. -->
  <div class="sm:hidden" id="mobile-menu">
    <div class="space-y-1 px-2 pb-3 pt-2">
      <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
      <a href="#" class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white" aria-current="page">Home</a>
      <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">About</a>
    </div>
  </div>
</nav>

