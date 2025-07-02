<x-guest-layout>
    <x-front.header></x-front.header>
    <!-- Blog Article -->
    <div class="max-w-[85rem] px-4 sm:px-6 lg:px-8 mx-auto mt-32">
        <div class="grid lg:grid-cols-3 gap-y-8 lg:gap-y-0 lg:gap-x-6">
            <!-- Content -->
            <div class="lg:col-span-2">
                <div class="py-8 lg:pe-8">
                    <div class="space-y-5 lg:space-y-8">
                        <a class="inline-flex items-center gap-x-1.5 text-sm text-gray-600 decoration-2 hover:underline focus:outline-hidden focus:underline dark:text-frontprimary" href="{{ route('articles') }}">
                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m15 18-6-6 6-6" /></svg>
                            Back to Blog
                        </a>

                        <h2 class="text-3xl font-bold lg:text-5xl dark:text-frontsecondary">{{ $article->title }}</h2>

                        <div class="flex items-center gap-x-5">
                            <a class="inline-flex items-center gap-1.5 py-1 px-3 sm:py-2 sm:px-4 rounded-full text-xs sm:text-sm bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 dark:bg-frontprimary dark:text-white dark:hover:bg-frontsecondary dark:focus:bg-frontprimary" href="#">
                                {{ $article->category->name }}
                            </a>
                            <p class="text-xs sm:text-sm text-gray-800 dark:text-gray-800">{{ $article->updated_at->format('M d, Y') }}</p>
                            <p class="text-sm text-gray-500">{{ $article->readTime() }} min read</p>
                        </div>

                        <figure>
                            <img class="w-full object-cover rounded-xl" src="{{ $article->imageUrl() }}" alt="{{ $article->title }}">
                            <figcaption class="mt-3 text-sm text-center text-gray-500 dark:text-neutral-500">
                                {{ $article->title }}
                            </figcaption>
                        </figure>

                        <p class="text-lg text-gray-800 dark:text-gray-800">
                            {{ $article->content }}
                        </p>


                        <div class="flex flex-col lg:flex-row lg:justify-between lg:items-center gap-y-5 lg:gap-y-0">
                            <div class="flex justify-end items-center gap-x-1.5">
                                <!-- Button -->
                                <div class="hs-tooltip inline-block" x-data="{
                                        clapsCount: {{ $article->claps->count() }},
                                        hasClapped: {{ auth()->user() ? auth()->user()->hasClapped($article) ? 'true' : 'false' : 'false' }}, 
                                        clap(){
                                            axios.post('{{ route('clap',$article) }}')
                                                .then(response => {
                                                    this.hasClapped = !this.hasClapped;
                                                    this.clapsCount = response.data.clapsCount;
                                                })
                                                .catch(error => console.log(error));
                                        },
                                    }">
                                    <button @click="clap()" type="button" class="flex items-center gap-x-2 text-sm text-gray-500 hover:text-black focus:outline-hidden dark:text-gray-600 dark:hover:text-black">
                                        <template x-if="hasClapped">
                                            <svg class="shrink-0 size-6" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="black" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z" /></svg>
                                        </template>
                                        <template x-if="!hasClapped">
                                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z" /></svg>
                                        </template>
                                        <span x-text="clapsCount"></span> claps
                                    </button>
                                </div>
                                <!-- Button -->
                                <div class="block h-3 border-e border-gray-300 mx-3 dark:border-neutral-600"></div>
                                <p class="text-sm text-gray-500">{{ $article->readTime() }} min read</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Content -->

            <!-- Sidebar -->
            <div class="lg:col-span-1 lg:w-full lg:h-full lg:bg-linear-to-r lg:from-gray-50 lg:via-transparent lg:to-transparent dark:from-neutral-800">
                <div class="sticky top-0 start-0 py-8 lg:ps-8">
                    <!-- Avatar Media -->
                    <x-front.authorFollowWrapper class="group flex items-center gap-x-3 border-b border-gray-200 pb-8 mb-8 dark:border-neutral-700" :user="$article->user">
                        <a class="block shrink-0 focus:outline-hidden" href="#">
                            <img class="size-10 rounded-full" src="{{ $article->user->image ? Storage::url($article->user->image) :'/images/author3.png' }}" alt="Avatar">
                        </a>

                        <a class="group grow block focus:outline-hidden" href="{{ route('author.show',$article->user) }}">
                            <h5 class="group-hover:text-gray-600 group-focus:text-gray-600 text-sm font-semibold text-gray-800 dark:group-hover:text-gray-400 dark:group-focus:text-gray-400 dark:text-gray-800">
                                {{ $article->user->name }}
                            </h5>
                            <p class="text-sm text-gray-500 dark:text-gray-500">
                                <span x-text="followersCount"></span> followers
                            </p>
                        </a>

                        @if(auth()->user() && auth()->user()->id !== $article->user->id)
                        <div class="grow">
                            <div class="flex justify-end">
                                <button @click="follow()" type="button" :class="following ? 'bg-red-600' : 'bg-frontprimary'" class="py-1.5 px-2.5 inline-flex items-center gap-x-2 text-xs font-medium rounded-lg border border-transparent bg-frontprimary text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                                        <circle cx="9" cy="7" r="4" />
                                        <line x1="19" x2="19" y1="8" y2="14" />
                                        <line x1="22" x2="16" y1="11" y2="11" /></svg>
                                    <span x-text="following ? 'Unfollow' : 'Follow'""></span>
                                </button>
                            </div>
                        </div>
                        @endif
                    </x-front.authorFollowWrapper>
                    <!-- End Avatar Media -->

                    <div class=" space-y-6">
                                        <!-- Media -->
                                        <a class="group flex items-center gap-x-6 focus:outline-hidden" href="#">
                                            <div class="grow">
                                                <span class="text-sm font-bold text-gray-800 group-hover:text-frontprimary group-focus:text-blue-600 dark:text-gray-800 dark:group-hover:text-frontprimary dark:group-focus:text-blue-500">
                                                    5 Reasons to Not start a UX Designer Career in 2022/2023
                                                </span>
                                            </div>

                                            <div class="shrink-0 relative rounded-lg overflow-hidden size-20">
                                                <img class="size-full absolute top-0 start-0 object-cover rounded-lg" src="https://images.unsplash.com/photo-1567016526105-22da7c13161a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=320&q=80" alt="Blog Image">
                                            </div>
                                        </a>
                                        <!-- End Media -->

                                        <!-- Media -->
                                        <a class="group flex items-center gap-x-6 focus:outline-hidden" href="#">
                                            <div class="grow">
                                                <span class="text-sm font-bold text-gray-800 group-hover:text-frontprimary group-focus:text-blue-600 dark:text-gray-800 dark:group-hover:text-frontprimary dark:group-focus:text-blue-500">
                                                    If your UX Portfolio has this 20% Well Done, it Will Give You an 80% Result
                                                </span>
                                            </div>

                                            <div class="shrink-0 relative rounded-lg overflow-hidden size-20">
                                                <img class="size-full absolute top-0 start-0 object-cover rounded-lg" src="https://images.unsplash.com/photo-1542125387-c71274d94f0a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=320&q=80" alt="Blog Image">
                                            </div>
                                        </a>
                                        <!-- End Media -->

                                        <!-- Media -->
                                        <a class="group flex items-center gap-x-6 focus:outline-hidden" href="#">
                                            <div class="grow">
                                                <span class="text-sm font-bold text-gray-800 group-hover:text-frontprimary group-focus:text-blue-600 dark:text-gray-800 dark:group-hover:text-frontprimary dark:group-focus:text-blue-500">
                                                    7 Principles of Icon Design
                                                </span>
                                            </div>

                                            <div class="shrink-0 relative rounded-lg overflow-hidden size-20">
                                                <img class="size-full absolute top-0 start-0 object-cover rounded-lg" src="https://images.unsplash.com/photo-1586232702178-f044c5f4d4b7?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=320&q=80" alt="Blog Image">
                                            </div>
                                        </a>
                                        <!-- End Media -->
                            </div>
                        </div>
                </div>
                <!-- End Sidebar -->
            </div>
        </div>
        <!-- End Blog Article -->
</x-guest-layout>
