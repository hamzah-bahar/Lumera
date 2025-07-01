<x-guest-layout>
    {{-- <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div> --}}

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="flex flex-col justify-center items-center h-screen">
        <x-application-logo />
        <div class="mt-7 w-full max-w-2xl bg-white border border-gray-200 rounded-xl shadow-2xs dark:bg-white dark:border-gray-200">
            <div class="p-4 sm:p-7">
                <div class="text-center">
                    <h1 class="block text-2xl font-bold text-gray-800 dark:gray-800">Forgot password?</h1>
                    <p class="mt-2 text-sm text-gray-600 dark:text-neutral-400">
                        Remember your password?
                        <a class="text-blue-600 decoration-2 hover:underline focus:outline-hidden focus:underline font-medium dark:text-frontprimary" href="{{ route('login') }}">
                            Login here
                        </a>
                    </p>
                </div>

                <div class="mt-5">
                    <!-- Form -->
                    <form>
                        <div class="grid gap-y-4">
                            <!-- Form Group -->
                            <div>
                                <x-input-label class="dark:text-gray-800" for="email" :value="__('Email')" />
                                <x-text-input id="email" class="block mt-1 w-full bg-gray-50 dark:bg-gray-50" type="email" name="email" :value="old('email')" required autofocus />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                {{-- <label for="email" class="block text-sm mb-2 dark:text-gray-20">Email address</label>
                                <div class="relative">
                                    <input type="email" id="email" name="email" class="py-2.5 sm:py-3 px-4 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-frontprimary focus:ring-frontprimary disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:placeholder-gray-500 dark:focus:ring-gray-600" required aria-describedby="email-error">
                                </div>
                                <p class="hidden text-xs text-red-600 mt-2" id="email-error">Please include a valid email address so we can get back to you</p> --}}
                            </div>
                            <!-- End Form Group -->

                            <button type="submit" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-primary-500 text-white hover:bg-primary-400 focus:outline-hidden focus:bg-frontprimary disabled:opacity-50 disabled:pointer-events-none">Reset password</button>
                        </div>
                    </form>
                    <!-- End Form -->
                </div>
            </div>
        </div>
    </div>








    {{-- <form method="POST" action="{{ route('password.email') }}">
    @csrf

    <!-- Email Address -->
    <div>
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <div class="flex items-center justify-end mt-4">
        <x-primary-button>
            {{ __('Email Password Reset Link') }}
        </x-primary-button>
    </div>
    </form> --}}
</x-guest-layout>
