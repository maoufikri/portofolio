@extends('dashboard.layouts.main')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <div class="flex justify-between items-center border-b pb-3">
            <h1 class="text-2xl font-bold text-gray-700">My Profile</h1>
        </div>
    </div>

    <div class="bg-white p-6 rounded-lg shadow-md">
        <div class="overflow-x-auto w-full">
            <table class="min-w-full border-collapse border border-gray-200">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 border border-gray-200">#</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 border border-gray-200">Name</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 border border-gray-200">Photo Profile</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 border border-gray-200">Description</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 border border-gray-200">Cv Link</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 border border-gray-200">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="px-6 py-4 text-sm text-gray-700 border border-gray-200">1</td>
                        <td class="px-6 py-4 text-sm text-gray-700 border border-gray-200">{{ $name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700 border border-gray-200">
                            <img src="{{ $photo }}" alt="Profile Photo" class="w-12 h-12 rounded-full">
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-700 border border-gray-200">{{ \Illuminate\Support\Str::limit($description, 50) }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-700 border border-gray-200">
                            <a href="{{ $cv_link }}" class="text-blue-500 hover:underline" target="_blank">View CV</a>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-700 border border-gray-200">
                        <a href="{{ route('dashboard.profile.edit', $id) }}"> <i class="fa fa-pen text-blue-500 cursor-pointer">edit</i></a>
                        </td>                        
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
