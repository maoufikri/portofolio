<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <!-- TailwindCSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
    <!-- Font Awesome Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <!-- Main Wrapper (Flexbox) -->
    <div class="flex h-screen">
        
        <!-- Sidebar -->
        <div class=" text-white w-64 p-4 flex flex-col md:flex md:w-1/4 lg:w-1/5">
            @include('dashboard.layouts.sidebar')
        </div>

        <!-- Main Content -->
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-6 max-w-screen-xl">
        <div :class="{'ml-64': !sidebarOpen, 'ml-0': sidebarOpen}" class="transition-all duration-300 flex-1 p-6">
            @yield('content')
        </div>
        </div>
        
    </div>

</body>
</html>
