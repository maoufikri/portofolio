<div class="bg-white" x-data="{ isOpen: false }">
  <header class="absolute inset-x-0 top-0 z-50">
    <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
      <div class="flex lg:flex-1">
        <a href="#" class="-m-1.5 p-1.5">
          <span class="sr-only">Your Company</span>
          <img class="h-8 w-auto rounded-full" src="{{ asset('img/maou.jpg') }}" alt="">
        </a>
      </div>
      <div class="flex lg:hidden">
        <button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700" @click="isOpen = !isOpen">
          <span class="sr-only">Open main menu</span>
          <svg x-show="!isOpen" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
          <svg x-show="isOpen" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
      <div class="hidden lg:flex lg:gap-x-12">
        <a href="#profile" class="text-sm/6 font-semibold text-gray-900">My Profile</a>
        <a href="#portofolios" class="text-sm/6 font-semibold text-gray-900">My Portofolio</a>
        <a href="#blogs" class="text-sm/6 font-semibold text-gray-900">My Blog</a>
        <a href="#contact" class="text-sm/6 font-semibold text-gray-900">My Social Media</a>
      </div>
    </nav>

    <!-- Mobile menu -->
    <div 
      x-show="isOpen" 
      @click.away="isOpen = false" 
      class="fixed inset-0 z-40 bg-gray-800/50 flex items-end lg:hidden"
    >
      <div class="w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
        <div class="flex items-center justify-between">
          <a href="#" class="-m-1.5 p-1.5">
            <span class="sr-only">Your Company</span>
            <img class="h-8 w-auto rounded-full" src="{{ asset('img/maou.jpg') }}" alt="">
          </a>
          <button 
            type="button" 
            class="-m-2.5 rounded-md p-2.5 text-gray-700" 
            @click="isOpen = false"
          >
            <span class="sr-only">Close menu</span>
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
        <div class="mt-6 flow-root">
          <div class="-my-6 divide-y divide-gray-500/10">
            <div class="space-y-2 py-6">
              <a href="#profile" class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">My Profile</a>
              <a href="#portofolios" class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">My Portofolio</a>
              <a href="#blogs" class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">My Blog</a>
              <a href="#contact" class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">My Social Media</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
</div>
