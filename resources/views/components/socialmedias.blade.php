@props(['socialmedias'])
<div class="bg-gray-50">
    <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 sm:py-24 lg:px-8">
        <h2 class="text-2xl font-bold tracking-tight text-gray-900 text-center mb-12">My Social Media</h2>

        <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8 justify-center">
            @foreach ($socialmedias as $media)
            <div class="group relative w-full flex flex-col items-center text-center">
                <!-- Menampilkan icon Font Awesome yang bisa dipencet -->
                <a href="{{ $media->url }}" target="_blank" class="w-24 h-24 rounded-full bg-blue-600 flex items-center justify-center group-hover:opacity-90 transition-all duration-300 mb-4">
                    <i class="{{ $media->font_awesome_class }} text-white text-4xl"></i> <!-- Menampilkan icon Font Awesome -->
                </a>
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">
                        <a href="{{ $media->url }}" target="_blank" class="hover:text-blue-500 transition-colors duration-300">
                            {{ $media->name }}
                        </a>
                    </h3>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
