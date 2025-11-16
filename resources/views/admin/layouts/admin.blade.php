<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin - Data Master</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-b from-blue-50 to-white min-h-screen">
<div class="max-w-7xl mx-auto px-4">
<nav class="flex items-center justify-between py-6">
<div class="flex items-center gap-3">
<div class="w-10 h-10 bg-blue-300 rounded-lg flex items-center justify-center text-white font-bold">DM</div>
<div>
<h1 class="text-xl font-semibold text-blue-800">Admin Panel</h1>
<p class="text-sm text-blue-600/70">Data Master</p>
</div>
</div>
<div>
<a href="#" class="text-sm text-blue-700">Hi, Admin</a>
</div>
</nav>


<main class="mt-6">
@yield('content')
</main>


<footer class="mt-12 mb-6 text-center text-sm text-blue-400">© {{ date('Y') }} Admin - Data Master</footer>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

</div>
</body>
</html>