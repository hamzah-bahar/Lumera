<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Post, '. $post->title) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('dashboard.posts.update', $post->slug) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        {{-- Image --}}
                        <x-input-label for="image" :value="__('Image')" />
                        <div class="flex items-center justify-center w-full">
                            <label for="image" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <img src="{{ $post->imageUrl() }}" alt="{{ $post->title }}" class="w-24 h-24">
                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG, or JPEG</p>
                                </div>
                                <x-text-input id="image" type="file" name="image" class="hidden" :value="old('image')" />
                            </label>
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                        </div>

                        {{-- Title --}}
                        <div class="mt-4">
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title') ? old('title'): $post->title " required autofocus autocomplete="title" />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        {{-- Content --}}
                        <div class="mt-4">
                            <x-input-label for="content" :value="__('Content')" />
                            <x-textarea-input id="content" class="block mt-1 w-full" name="content" required autofocus>{{ old('content')? old('content'): $post->content }}</x-textarea-input>
                            <x-input-error :messages="$errors->get('content')" class="mt-2" />
                        </div>

                        {{-- Category --}}
                        <div class="mt-4">
                            <x-input-label for="category_id" :value="__('Category')" />
                            <x-select-input name="category_id" id="category_id" class="block mt-1 w-full" required autofocus>
                                <option value="">Select a category:</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" @selected(old('category_id')? old('category_id')==$category->id : $post->category_id == $category->id)>{{ $category->name }}</option>
                                @endforeach
                            </x-select-input>
                            <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                        </div>
                        <x-primary-button type="submit" class="mt-4">Edit</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
