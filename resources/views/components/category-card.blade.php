 @props(['category'])
 <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
     <div class="flex justify-end px-4 pt-4">
         <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'category-options')" class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5" type="button">
             <span class="sr-only">Open dropdown</span>
             <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                 <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
             </svg>
         </button>
         <!-- Dropdown menu -->
         <x-modal name="category-options" max-width="sm" focusable>
             {{-- <div id="dropdown" class="z-10 flex justify-center align-center text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700"> --}}
             <ul class="py-2" aria-labelledby="dropdownButton">
                 <li>
                     <x-secondary-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'category-edit')">{{ __('Edit') }}</x-secondary-button>
                     {{-- <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Edit</a> --}}
                 </li>
                 <li>
                     <x-danger-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-category-deletion')">{{ __('Delete Category') }}</x-danger-button>
                 </li>
             </ul>
             {{-- </div> --}}
         </x-modal>

     </div>
     <div class="flex flex-col items-center pb-10">
         <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{ $category->name }}</h5>
     </div>
 </div>

 <x-modal name="confirm-category-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable class="flex justify-center align-center">
     <form method="post" action="{{ route('dashboard.category.destroy', $category) }}" class="p-6">
         @csrf
         @method('delete')

         <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
             {{ __('Are you sure you want to delete this category?') }}
         </h2>

         <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
             {{ __('Once deleted, it cannot be restored') }}
         </p>


         <div class="mt-6 flex justify-end">
             <x-secondary-button x-on:click="$dispatch('close')">
                 {{ __('Cancel') }}
             </x-secondary-button>

             <x-danger-button class="ms-3">
                 {{ __('Delete Category') }}
             </x-danger-button>
         </div>
     </form>
 </x-modal>

 <x-modal name="category-edit" :show="$errors->isNotEmpty()" focusable>
     <form method="POST" action="{{ route('dashboard.categories.update', $category) }}" class="p-6">
         @csrf
         @method('PUT')

         <div class="mt-6">
             <x-input-label for="name" value="{{ __('Name') }}" class="sr-only" />

             <x-text-input id="name" name="name" type="text" class="mt-1 block w-3/4" :value="$category->name" />

             <x-input-error :messages="$errors->get('name')" class="mt-2" />
         </div>

         <div class="mt-6 flex justify-end">
             <x-secondary-button x-on:click="$dispatch('close')">
                 {{ __('Cancel') }}
             </x-secondary-button>

             <x-primary-button class="ms-3">
                 {{ __('Edit') }}
             </x-primary-button>
         </div>
     </form>
 </x-modal>
