<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Blog</title>
</head>
<body>

<div class="bg-gray-50">
  <div class="max-w-7xl mx-auto px-4 py-16 sm:px-6 sm:py-24 lg:px-8">
      <h2 class="text-2xl font-bold tracking-tight text-gray-900 text-center">My Blog</h2>
      <a href="/" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Back</a>
      <div class="mt-12 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:gap-x-8">
          @foreach ($blogs as $blog)
          <div class="group relative">
              <!-- Gambar Blog -->
              <img src="{{ $blog->image }}" alt="{{ $blog->title }}" class="w-full h-64 object-cover rounded-lg group-hover:opacity-75">
              
              <!-- Judul Blog -->
              <div class="mt-4">
                  <h3 class="text-lg font-semibold text-gray-900">
                      <a href="{{ route('blogs.show', $blog->id) }}" class="hover:underline">{{ $blog->title }}</a>
                  </h3>

                  <!-- Isi Blog -->
                  <p class="mt-2 text-sm text-gray-500">
                    {{ Str::limit($blog->content, 100) }}
                  </p>
              </div>
          </div>
          @endforeach
      </div>
      <div class="mt-6">
        {{ $blogs->links() }} <!-- Pagination Links -->
    </div>
  </div>
</div>
