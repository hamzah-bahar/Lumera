<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <main class="mt-0 transition-all duration-200 ease-in-out">
        <section>
            <div class="relative flex items-center min-h-screen p-0 overflow-hidden bg-center bg-cover">
                <div class="container w-1/2 z-1">
                    <div class="flex justify-center w-full flex-wrap">
                        <div class="flex flex-col w-full max-w-full px-3 mx-auto lg:mx-0 shrink-0 md:flex-0 md:w-7/12 lg:w-5/12 xl:w-4/12">
                            <x-application-logo href="/" height="20" />
                            <div class="relative flex flex-col min-w-0 break-words bg-transparent border-0 shadow-none lg:py4 dark:bg-gray-100 rounded-2xl bg-clip-border mt-8">
                                <div class="p-6 pb-0 mb-0">
                                    <h4 class="font-bold">Login</h4>
                                    <p class="mb-1 mt-1">Enter your email and password to login</p>
                                </div>
                                <div class="flex-auto p-6">
                                    {{-- <form role="form">
                                        <div class="mb-4">
                                            <input type="email" placeholder="Email" class="focus:shadow-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding p-3 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" />
                                        </div>
                                        <div class="mb-4">
                                            <input type="password" placeholder="Password" class="focus:shadow-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding p-3 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" />
                                        </div>
                                        <div class="flex items-center pl-12 mb-0.5 text-left min-h-6">
                                            <input id="rememberMe" class="mt-0.5 rounded-10 duration-250 ease-in-out after:rounded-circle after:shadow-2xl after:duration-250 checked:after:translate-x-5.3 h-5 relative float-left -ml-12 w-10 cursor-pointer appearance-none border border-solid border-gray-200 bg-zinc-700/10 bg-none bg-contain bg-left bg-no-repeat align-top transition-all after:absolute after:top-px after:h-4 after:w-4 after:translate-x-px after:bg-white after:content-[''] checked:border-blue-500/95 checked:bg-blue-500/95 checked:bg-none checked:bg-right" type="checkbox" />
                                            <label class="ml-2 font-normal cursor-pointer select-none text-sm text-slate-700" for="rememberMe">Remember me</label>
                                        </div>
                                        <div class="text-center">
                                            <button type="button" class="inline-block w-full px-16 py-3.5 mt-6 mb-0 font-bold leading-normal text-center text-white align-middle transition-all bg-blue-500 border-0 rounded-lg cursor-pointer hover:-translate-y-px active:opacity-85 hover:shadow-xs text-sm ease-in tracking-tight-rem shadow-md bg-150 bg-x-25">Sign in</button>
                                        </div>
                                    </form> --}}
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <!-- Email Address -->
                                        <div>
                                            <x-input-label class="dark:text-gray-700" for="email" :value="__('Email')" />
                                            <x-text-input id="email" class="block mt-1 w-full dark:bg-white dark:text-gray-900" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                        </div>

                                        <!-- Password -->
                                        <div class="mt-4">
                                            <x-input-label class="dark:text-gray-700" for="password" :value="__('Password')" />

                                            <x-text-input id="password" class="block mt-1 w-full dark:bg-white dark:text-gray-900" type="password" name="password" required autocomplete="current-password" />

                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                        </div>

                                        <!-- Remember Me -->
                                        <div class="block mt-4">
                                            <label for="remember_me" class="inline-flex items-center">
                                                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-50 border-gray-300 dark:border-gray-700 text-frontprimary shadow-sm focus:ring-frontpriamry dark:focus:ring-frontprimary dark:focus:ring-offset-gray-800" name="remember">
                                                <span class="ms-2 text-sm text-gray-600 dark:text-gray-700">{{ __('Remember me') }}</span>
                                            </label>
                                        </div>

                                        <div class="flex items-center justify-end mt-4">
                                            @if (Route::has('password.request'))
                                            <a class="underline text-sm text-gray-600 dark:text-gray-700 hover:text-gray-900 dark:hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                                                {{ __('Forgot your password?') }}
                                            </a>
                                            @endif

                                            <x-primary-button class="ms-3">
                                                {{ __('Log in') }}
                                            </x-primary-button>
                                        </div>
                                    </form>
                                </div>
                                <div class="border-black/12.5 rounded-b-2xl border-t-0 border-solid p-6 text-center pt-0 px-1 sm:px-6">
                                    <p class="mx-auto mb-6 leading-normal text-sm">Don't have an account? <a href="{{ route('register') }}" class="font-semibold text-transparent bg-clip-text bg-gradient-to-tl from-frontprimary to-frontsecondary">Register</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="absolute top-0 right-0 flex-col justify-center hidden w-6/12 h-full max-w-full px-3 pr-0 my-auto text-center flex-0 lg:flex">
                            <div class="relative flex flex-col justify-center h-full bg-cover px-24 m-4 overflow-hidden bg-[url('https://lumera.test/images/coursethree.png')] rounded-xl ">
                                <span class="absolute top-0 left-0 w-full h-full bg-center bg-cover bg-gradient-to-tl from-blue-500 to-violet-500 opacity-60"></span>
                                <h3 class="z-20 mt-12 font-bold text-xl text-white">LUMERA</h3>
                                <h4 class="z-20 mt-12 font-bold text-white">"Where Thoughts Take Light"</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>


</x-guest-layout>
