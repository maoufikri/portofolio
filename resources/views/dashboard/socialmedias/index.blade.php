@extends('dashboard.layouts.main')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <div class="flex justify-between items-center border-b pb-3">
            <h1 class="text-2xl font-bold text-gray-700">My Social Media</h1>
            <!-- Tambah Portofolio Button -->
            <a href="{{ route('dashboard.socialmedias.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-600">
                Add New social media
            </a>
        </div>
    </div>

    <div class="bg-white p-6 rounded-lg shadow-md">
        <div class="overflow-x-auto w-full">
            <table class="min-w-full border-collapse border border-gray-200">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 border border-gray-200">#</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 border border-gray-200">name</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 border border-gray-200">URL</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 border border-gray-200">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($socialMedias as $socialmedia)
                    <tr>
                        <td class="px-6 py-4 text-sm text-gray-700 border border-gray-200">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700 border border-gray-200">{{ $socialmedia->name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700 border border-gray-200">
                            <a href="{{ $socialmedia->url }}" class="text-blue-500 hover:underline" target="_blank">{{ $socialmedia->url }}</a>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-700 border border-gray-200">
                            <a href="{{ route('dashboard.socialmedias.edit', $socialmedia->id) }}">
                                <i class="fa fa-pen text-blue-500 cursor-pointer"> Edit</i>
                            </a>
                            <form action="{{ route('dashboard.socialmedias.destroy', $socialmedia->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                            <button 
                                type="submit" 
                                class="text-red-500 hover:text-red-700 cursor-pointer" 
                                onclick="return confirm('Apakah Anda yakin ingin menghapus item ini?')">
                                <i class="fa fa-trash"></i> Delete
                            </button>
                            
                            </form>                                                    
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
@endsection
