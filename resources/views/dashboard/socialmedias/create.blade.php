@extends('dashboard.layouts.main')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold text-gray-700">Create Social Media</h1>

        <form action="{{ route('dashboard.socialmedias.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md mt-4">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-600">Name</label>
                <input type="text" id="name" name="name" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" required>
                @error('name')
                    <div class="text-sm text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="url" class="block text-sm font-medium text-gray-600">URL</label>
                <input type="url" id="url" name="url" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" required>
                @error('url')
                    <div class="text-sm text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="font_awesome_class" class="block text-sm font-medium text-gray-600">Sosmed</label>
                <select id="font_awesome_class" name="font_awesome_class" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" required>
                    <option value="fab fa-facebook">Facebook</option>
                    <option value="fab fa-instagram">Instagram</option>
                    <option value="fab fa-whatsapp">WhatsApp</option>
                    <option value="fab fa-tiktok">TikTok</option>
                    <option value="fab fa-x">X</option>
                    <option value="fab fa-discord">Discord</option>
                    <option value="fab fa-facebook-messenger">Messenger</option>
                    <option value="fab fa-telegram">Telegram</option>
                    <option value="fab fa-line">Line</option>
                    <option value="fab fa-threads">threads</option>
                    <option value="fab fa-linkedin">linked in</option>
                    <option value="fab fa-github">github</option>
                    <option value="fab fa-youtube">You tube</option>
                    <!-- Add more icons as needed -->
                </select>
                @error('font_awesome_class')
                    <div class="text-sm text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Create Social Media</button>
        </form>
    </div>

    <!-- Add Font Awesome JS for Icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
@endsection
