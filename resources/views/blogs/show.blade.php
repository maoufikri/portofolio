<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Portofolio</title>
</head>
<body>

  <!-- Navbar -->
  <x-navbar></x-navbar>

  <!-- Blog Content -->
  <div class="container mx-auto px-4 lg:px-8 py-8 mt-10">
    <h1 class="text-3xl font-bold text-gray-900 text-center">{{ $blog->title }}</h1> <!-- Rata tengah -->
    
    <!-- Gambar Blog -->
    <div class="mt-6 flex justify-center">
        <img 
          src="/{{ $blog->image }}" 
          alt="{{ $blog->title }}" 
          class="w-full sm:max-w-md md:max-w-lg lg:max-w-10xl xl:max-w-10xl h-auto object-cover rounded-lg"
        >
    </div>

    <!-- Konten Blog -->
    <div class="mt-6 text-lg text-gray-800 mx-auto max-w-10xl mb-5">
        {!! nl2br(e($blog->content)) !!} <!-- Menampilkan konten blog -->
    </div>
    <a href="/" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Back</a>
  </div>

</body>
</html>
