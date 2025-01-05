@extends('dashboard.layouts.main')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <div class="flex justify-between items-center border-b pb-3">
            <h1 class="text-2xl font-bold text-gray-700">Edit Portofolio</h1>
        </div>
    </div>

    <div class="bg-white p-6 rounded-lg shadow-md">
        <form action="{{ route('dashboard.portofolios.update', $portofolio->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-600">Title</label>
                <input type="text" id="title" name="title" value="{{ old('title', $portofolio->title) }}" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" required>
                @error('title')
                    <div class="text-sm text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-600">Description</label>
                <textarea id="description" name="description" rows="4" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" required>{{ old('description', $portofolio->description) }}</textarea>
                @error('description')
                    <div class="text-sm text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-600">Image</label>
                <div class="mt-2 mb-2">
                    <img src="{{ asset('storage/' . $portofolio->image) }}" alt="Current Image" class="w-32 h-32 object-cover rounded-md">
                </div>
                <input type="file" id="image" name="image" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                @error('image')
                    <div class="text-sm text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="url" class="block text-sm font-medium text-gray-600">URL</label>
                <input type="url" id="url" name="url" value="{{ old('url', $portofolio->url) }}" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" required>
                @error('url')
                    <div class="text-sm text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Update Portofolio</button>
            </div>
        </form>
    </div>
@endsection
