 @props(['category'])
 <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
     <div class="flex justify-end px-4 pt-4">
         <x-dropdown width="48">
             <x-slot name="trigger">
                 <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                     <span class="sr-only">Open dropdown</span>
                     <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                         <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                     </svg>
                 </button>
             </x-slot>

             <x-slot name="content">
                 <x-dropdown-link href="{{ route('dashboard.categories.edit', $category) }}">
                     {{ __('Edit') }}
                 </x-dropdown-link>
             </x-slot>
         </x-dropdown>

     </div>
     <div class="flex flex-col items-center pb-10">
         <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{ $category->name }}</h5>
     </div>
 </div>
