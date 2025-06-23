<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <ul class="flex flex-wrap justify-center mb-4 text-sm font-medium text-center text-gray-500 dark:text-gray-400">
            <li class="me-2">
                <a href="#" class="inline-block px-4 py-3 text-white bg-blue-600 rounded-lg active" aria-current="page">All</a>
            </li>
            @foreach($categories as $category)
            <li class="me-2">
                <a href="#" class="inline-block px-4 py-3 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-white">{{ $category->name }}</a>
            </li>
            @endforeach


        </ul>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @forelse($posts as $post)
                    <a href="#" class="flex flex-col mb-4 items-center bg-white border border-gray-200 rounded-lg shadow-sm md:flex-row md:max-w-xxl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                        <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg" src="{{ $post->image }}" alt="">
                        <div class="flex flex-col justify-between p-4 leading-normal">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ $post->title }}</h5>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ \Illuminate\Support\Str::words($post->content,20) }}</p>
                        </div>
                    </a>
                    @empty
                    <div>No Posts Found!</div>
                    @endforelse
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
