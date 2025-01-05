@extends('dashboard.layouts.main')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <div class="flex justify-between items-center border-b pb-3">
            <h1 class="text-2xl font-bold text-gray-700">Edit Profile</h1>
        </div>
        <div class="mt-6">
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif
            <form action="{{ route('dashboard.profile.update', $profile->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="col-span-2">
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $profile->name) }}"
                            class="mt-1 p-2 border rounded w-full @error('name') border-red-500 @enderror" required>
                        @error('name')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-span-2">
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea name="description" id="description" rows="4"
                            class="mt-1 p-2 border rounded w-full @error('description') border-red-500 @enderror"
                            required>{{ old('description', $profile->description) }}</textarea>
                        @error('description')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="photo" class="block text-sm font-medium text-gray-700">Profile Photo</label>
                        <input type="file" name="photo" id="photo"
                            class="mt-1 p-2 border rounded w-full @error('photo') border-red-500 @enderror">
                        <p class="text-sm text-gray-500 mt-1">Leave empty if you don't want to change the photo.</p>
                        @error('photo')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="cv_link" class="block text-sm font-medium text-gray-700">CV Link</label>
                        <input type="url" name="cv_link" id="cv_link" value="{{ old('cv_link', $profile->cv_link) }}"
                            class="mt-1 p-2 border rounded w-full @error('cv_link') border-red-500 @enderror">
                        @error('cv_link')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mt-6">
                    <button type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none">Update Profile</button>
                    <a href="{{ route('dashboard.index') }}"
                        class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400 focus:outline-none">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
