<x-guest-layout>
    <x-front.header></x-front.header>
    <div class="max-w-[85rem] px-4 sm:px-6 lg:px-8 mx-auto mt-32">
        <div class="grid lg:grid-cols-3 gap-y-8 lg:gap-y-0 lg:gap-x-6">
            <!-- Content -->
            <div class="lg:col-span-2">
                <div class="py-8 lg:pe-8">
                    <div class="space-y-5 lg:space-y-8">
                        <h2 class="text-3xl font-bold lg:text-5xl dark:text-frontsecondary">Articles</h2>
                        <div class="flex flex-wrap">
                            @foreach ($user->posts as $article )
                            <x-front.articleCard width="360px" :article="$article"></x-front.articleCard>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Content -->

            <!-- Sidebar -->
            <div class="lg:col-span-1 lg:w-full lg:h-full lg:bg-linear-to-r lg:from-gray-50 lg:via-transparent lg:to-transparent dark:from-neutral-800">
                <div class="sticky top-0 start-0 py-8 lg:ps-8">
                    <!-- Avatar Media -->
                    <div class="gap-x-3 mt-12 mx-auto lg:max-w-screen-xl md:max-w-screen-md flex items-center border-b border-gray-200 pb-8 mb-8">
                        <div class="shrink-0">
                            <img class="shrink-0 size-16 rounded-full" src="{{ $user->image ? Storage::url($user->image) : '/images/author3.png' }}" alt="Avatar">
                        </div>

                        <div class="grow">
                            <div class="flex justify-center">
                                <h1 class="text-lg font-medium text-gray-800 dark:text-gray-800">
                                    {{ $user->name }}
                                </h1>
                                <div class="grow">
                                    <div class="flex justify-end">
                                        <button type="button" class="py-1.5 px-2.5 inline-flex items-center gap-x-2 text-xs font-medium rounded-lg border border-transparent bg-frontprimary text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                                                <circle cx="9" cy="7" r="4" />
                                                <line x1="19" x2="19" y1="8" y2="14" />
                                                <line x1="22" x2="16" y1="11" y2="11" /></svg>
                                            Follow
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                {{ $user->email }}
                            </p>
                        </div>
                    </div>
                    <!-- End Avatar Media -->

                    <div class="space-y-6">
                        <div class="mx-auto lg:max-w-screen-xl md:max-w-screen-md">
                            {{ $user->bio }}
                        </div>
                        <ul class="mt-5 flex flex-col gap-y-3">
                            <li class="flex items-center gap-x-2.5">
                                <svg class="shrink-0 size-3.5 text-gray-800 dark:text-gray-800" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect width="20" height="16" x="2" y="4" rx="2" />
                                    <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" /></svg>
                                <a class="text-[13px] text-gray-500 underline hover:text-gray-800 hover:decoration-2 focus:outline-hidden focus:decoration-2 dark:text-neutral-500 dark:hover:text-gray-400" href="#">
                                    {{ $user->email }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- End Sidebar -->
        </div>
    </div>




















    {{-- <div class="gap-x-3 mt-32 mx-auto lg:max-w-screen-xl md:max-w-screen-md flex items-center">
        <div class="shrink-0">
            <img class="shrink-0 size-16 rounded-full" src="https://images.unsplash.com/photo-1510706019500-d23a509eecd4?q=80&w=2667&auto=format&fit=facearea&facepad=3&w=320&h=320&q=80&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Avatar">
        </div>

        <div class="grow">
            <h1 class="text-lg font-medium text-gray-800 dark:text-gray-800">
                Eliana Garcia
            </h1>
            <p class="text-sm text-gray-600 dark:text-gray-400">
                Graphic Designer, Web designer/developer
            </p>
        </div>
    </div>
    <!-- End Profile -->

    <!-- About -->
    <div class="mt-8 mx-auto lg:max-w-screen-xl md:max-w-screen-md">
        <p class="text-sm text-gray-600 dark:text-neutral-400">
            I am a seasoned graphic designer with over 14 years of experience in creating visually appealing and user-centric designs. My expertise spans across UI design, design systems, and custom illustrations, helping clients bring their digital visions to life.
        </p>

        <ul class="mt-5 flex flex-col gap-y-3">
            <li class="flex items-center gap-x-2.5">
                <svg class="shrink-0 size-3.5 text-gray-800 dark:text-gray-800" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect width="20" height="16" x="2" y="4" rx="2" />
                    <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" /></svg>
                <a class="text-[13px] text-gray-500 underline hover:text-gray-800 hover:decoration-2 focus:outline-hidden focus:decoration-2 dark:text-neutral-500 dark:hover:text-gray-400" href="#">
                    elianagarcia997@about.me
                </a>
            </li>
        </ul>
    </div> --}}
    <!-- End About -->
</x-guest-layout>
