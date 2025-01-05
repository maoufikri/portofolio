@props(['profile'])
<div class="relative isolate px-6 pt-0 lg:px-8 h-auto">
      <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
      <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[24rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-20rem)] sm:w-[48rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
    </div>
    <div class="mx-auto max-w-2xl py-16 sm:py-24 lg:py-32">
      <div class="text-center">
        <img src="{{ asset('storage/' . $profile->photo) }}" alt="{{ $profile->name }}" class="rounded-full mx-auto w-64 sm:w-80 md:w-96 lg:w-1/2 xl:w-1/3 h-auto">
        <h1 class="text-balance text-5xl font-semibold tracking-tight text-gray-900 sm:text-7xl">My Profile</h1>
        <p class="mt-8 text-pretty text-lg font-medium text-gray-500 sm:text-xl/8">{{ $profile->description }}</p>
        <div class="mt-10 flex items-center justify-center gap-x-6">
          <a href="#portofolios" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Portofolio</a>
          <a href="{{ $profile->cv_link }}" target="_blank" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Download Cv</a>
        </div>
      </div>
    </div>
  </div>
</div>
