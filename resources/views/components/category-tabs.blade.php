@props(['source' =>'dashboard'])
@if($source === 'dashboard')
<ul class="flex flex-wrap justify-center mb-4 text-sm font-medium text-center text-gray-500 dark:text-gray-400">
    <li class="me-2">
        <a href="{{ route('dashboard.posts.index') }}" class="{{ request('category') ? 'inline-block px-4 py-3 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-white' : 'inline-block px-4 py-3 text-white bg-primary-500 rounded-lg active'  }}" aria-current="page">All</a>
    </li>
    @foreach($categories as $category)
    <li class="me-2">
        <a href="{{ route('dashboard.posts.byCategory',$category) }}" class="{{ Route::currentRouteNamed('dashboard.posts.byCategory') && request('category')->slug == $category->slug ? 
        'inline-block px-4 py-3 text-white bg-primary-500 rounded-lg active' 
        : 'inline-block px-4 py-3 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-white' }}">{{
            $category->name }}</a>
    </li>
    @endforeach
</ul>
@else
<ul class="flex flex-wrap justify-center mb-4 text-sm font-medium text-center text-gray-500 dark:text-black">
    <li class="me-2">
        <a href="{{ route('articles') }}" class="{{ request('category') ? 'inline-block px-4 py-3 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-frontsecondary dark:hover:text-white' : 'inline-block px-4 py-3 text-white bg-frontsecondary rounded-lg active'  }}" aria-current="page">All</a>
    </li>
    @foreach($categories as $category)
    <li class="me-2">
        <a href="{{ route('articles.category',$category) }}" class="{{ Route::currentRouteNamed('articles.category') && request('category')->slug == $category->slug ? 
        'inline-block px-4 py-3 text-white bg-frontsecondary rounded-lg active' 
        : 'inline-block px-4 py-3 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-frontsecondary dark:hover:text-white' }}">
            {{ $category->name }}</a>
    </li>
    @endforeach
</ul>
@endif
{{-- && request('category')->slug == $category->slug --}}
