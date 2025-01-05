@props(['portofolios'])
<div class="bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 py-16 sm:px-6 sm:py-24 lg:px-8">
      <h2 class="text-2xl font-bold tracking-tight text-gray-900 text-center">PROJECTS</h2>
      <p class="text-center text-gray-700 mt-4 mb-3">
        Here you will find some of the personal and clients projects that I created with each project containing its own case study.
      </p>
      <a href="{{ route('portofolios.index') }}" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">See all portofolio</a>
      <div class="mt-12 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:gap-x-8">
        @foreach ($portofolios as $portofolio)
        <div class="group relative">
          <img src="{{ $portofolio->image }}" alt="{{ $portofolio->title }}" 
               class="w-full h-64 object-cover rounded-lg group-hover:opacity-75">
          <div class="mt-4">
            <h3 class="text-lg font-semibold text-gray-900">
              <a href="{{ $portofolio->url }}" target="_blank" class="hover:underline">{{ $portofolio->title }}</a>
            </h3>
            <p class="mt-2 text-sm text-gray-500">
              {{ $portofolio->description}}
            </p>
          </div>
          <div class="mt-4">
            <a href="{{ $portofolio->url }}" target="_blank"
               class="inline-block bg-purple-600 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-purple-700 transition">
              Lihat Portofolio
            </a>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
  