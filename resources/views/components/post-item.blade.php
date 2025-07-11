@props(['post'])
<a href="{{ route('dashboard.posts.show',$post->slug) }}" class="flex flex-col mb-4 items-center bg-white border border-gray-200 rounded-lg shadow-sm md:flex-row md:max-w-xxl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
    <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg" src="{{ $post->imageUrl() }}" alt="">
    <div class="flex flex-col justify-between p-4 leading-normal">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
            {{ $post->title }}</h5>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ \Illuminate\Support\Str::words($post->content,20) }}</p>
    </div>
</a>
