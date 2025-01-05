@extends('dashboard.layouts.main')

@section('content')
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Edit Social Media</h2>

        <!-- Form untuk update social media -->
        <form action="{{ route('dashboard.socialmedias.update', $socialMedia->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Menggunakan method PUT untuk update -->

            <!-- Field untuk Name -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-600">Name</label>
                <input type="text" id="name" name="name" value="{{ old('name', $socialMedia->name) }}" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" required>
                @error('name')
                    <div class="text-sm text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <!-- Field untuk URL -->
            <div class="mb-4">
                <label for="url" class="block text-sm font-medium text-gray-600">URL</label>
                <input type="url" id="url" name="url" value="{{ old('url', $socialMedia->url) }}" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" required>
                @error('url')
                    <div class="text-sm text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <!-- Field untuk Font Awesome Class -->
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

            <!-- Button untuk submit -->
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Update Social Media</button>
        </form>
    </div>
@endsection
