<div x-data="{ sidebarOpen: false }" class="relative">
    <!-- Sidebar for Larger Screens (Desktop) -->
    <div class="hidden lg:block bg-blue-700 text-white w-64 p-4 fixed top-0 left-0 h-full z-50">
        <!-- Sidebar content for desktop -->
        <div class="bg-blue-700 text-white w-64 p-4 flex flex-col">
            <!-- Logo Section -->
            <div class="flex items-center mb-8">
                <img src="{{ asset('img/maou.jpg') }}" alt="Logo" class="h-8 w-8 mr-2 rounded-full" height="30" width="30">
                <a class="text-lg font-bold" href="/dashboard">My Dashboard</a>
            </div>

            <!-- Navigation Menu -->
            <nav class="flex-1">
                <ul>
                    <li class="mb-4">
                        <a class="flex items-center text-white" href="/dashboard/profile">
                            <i class="fas fa-user mr-3"></i> Profile
                        </a>
                    </li>
                    <li class="mb-4">
                        <a class="flex items-center text-white" href="/dashboard/portofolios">
                            <i class="fas fa-laptop mr-3"></i> My Portfolios
                        </a>
                    </li>
                    <li class="mb-4">
                        <a class="flex items-center text-white" href="/dashboard/blogs">
                            <i class="fas fa-book mr-3"></i> My Blogs
                        </a>
                    </li>
                    <li class="mb-4">
                        <a class="flex items-center text-white" href="/dashboard/socialmedias">
                            <i class="fas fa-phone mr-3"></i> My Social Media
                        </a>
                    </li>
                    <li class="mb-4">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="flex items-center text-white">
                                <i class="fas fa-sign-out-alt mr-3"></i> Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <!-- Hamburger Button for Small Screens (Mobile) -->
    <div class="md:hidden p-4 flex items-center justify-between">
        <button @click="sidebarOpen = !sidebarOpen" class="text-black">
            <i class="fas fa-bars"></i> <!-- Hamburger icon -->
        </button>
    </div>

    <!-- Sidebar for Small Screens (Mobile) -->
    <div :class="{'block': sidebarOpen, 'hidden': !sidebarOpen}" 
         x-transition:enter="transition transform duration-300"
         x-transition:enter-start="-translate-x-full"
         x-transition:enter-end="translate-x-0"
         x-transition:leave="transition transform duration-300"
         x-transition:leave-start="translate-x-0"
         x-transition:leave-end="-translate-x-full"
         class="bg-blue-700 text-white p-4 fixed top-0 left-0 h-full z-50 sm:hidden">

        <!-- Close Button for Mobile Sidebar -->
        <div class="flex justify-end mb-4">
            <button @click="sidebarOpen = false" class="text-white">
                <i class="fas fa-times"></i> <!-- Close Icon -->
            </button>
        </div>

        <!-- Sidebar content for mobile -->
        <div class="bg-blue-700 text-white w-64 p-4 flex flex-col">
            <!-- Logo Section -->
            <div class="flex items-center mb-8">
                <img src="{{ asset('img/maou.jpg') }}" alt="Logo" class="h-8 w-8 mr-2 rounded-full" height="30" width="30">
                <a class="text-lg font-bold" href="/dashboard">My Dashboard</a>
            </div>

            <!-- Navigation Menu -->
            <nav class="flex-1">
                <ul>
                    <li class="mb-4">
                        <a class="flex items-center text-white" href="/dashboard/profile">
                            <i class="fas fa-user mr-3"></i> Profile
                        </a>
                    </li>
                    <li class="mb-4">
                        <a class="flex items-center text-white" href="/dashboard/portofolios">
                            <i class="fas fa-laptop mr-3"></i> My Portfolios
                        </a>
                    </li>
                    <li class="mb-4">
                        <a class="flex items-center text-white" href="/dashboard/blogs">
                            <i class="fas fa-book mr-3"></i> My Blogs
                        </a>
                    </li>
                    <li class="mb-4">
                        <a class="flex items-center text-white" href="/dashboard/socialmedias">
                            <i class="fas fa-phone mr-3"></i> My Social Media
                        </a>
                    </li>
                    <li class="mb-4">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="flex items-center text-white">
                                <i class="fas fa-sign-out-alt mr-3"></i> Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

</div>
