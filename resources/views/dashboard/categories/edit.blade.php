<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Category:' . $category->name)  }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('dashboard.categories.update', $category) }}" method="POST">
                        @csrf
                        @method('PUT')
                        {{-- Name --}}
                        <div class="mt-4">
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$category->name" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <x-primary-button type="submit" class="mt-4">Edit</x-primary-button>
                        <x-danger-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-category-deletion')" class="mt-4">Delete</x-danger-button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <x-modal name="confirm-category-deletion" :show="$errors->isNotEmpty()" focusable class="flex justify-center align-center">
        <form method="post" action="{{ route('dashboard.category.destroy', $category) }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Are you sure you want to delete category: ' . $category->name . ' ?') }}
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
</x-app-layout>
