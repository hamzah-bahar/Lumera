  <header class="fixed top-0 z-40 w-full pb-5 transition-all duration-300 bg-white shadow-lg py-6">
      <div class="lg:py-0 py-2">
          <div class="container mx-auto lg:max-w-screen-xl md:max-w-screen-md flex items-center justify-between px-4">
              <a href="/">

                  <img src="/lumera.png" alt="site logo" class="h-12">
              </a>

              <nav class="lg:flex flex-grow items-center gap-8 justify-center">
                  <a href="/" class="{{ Route::currentRouteNamed('home') ? 'text-xl flex hover:text-black capitalized relative text-black after:absolute after:w-8 after:h-1 after:bg-frontprimary after:rounded-full after:-bottom-1' :  'text-xl flex hover:text-black capitalized relative'}}">Home</a>
                  <a href="{{ route('articles') }}" class="{{ Route::currentRouteNamed('articles') ? 'text-xl flex hover:text-black capitalized relative text-black after:absolute after:w-8 after:h-1 after:bg-frontprimary after:rounded-full after:-bottom-1' :  'text-xl flex hover:text-black capitalized relative'}}">Articles</a>
                  <a href="#authors" class="text-xl flex hover:text-black capitalized relative">Authors</a>
                  <a href="#" class="text-xl flex hover:text-black capitalized relative">Testimonial</a>
              </nav>
              <div class="flex items-center gap-4">
                  @guest
                  <a href="{{ route('login') }}" class="lg:block bg-frontprimary text-white hover:bg-frontprimary/15 hover:text-frontprimary px-6 py-2 rounded-full text-lg font-medium" />
                  Sign In
                  </a>
                  <a href="{{ route('register') }}" class="lg:block bg-frontprimary/15 text-frontprimary hover:bg-frontprimary hover:text-white px-6 py-2 rounded-full text-lg font-medium" />
                  Sign up
                  </a>
                  @endguest
                  @auth
                  {{-- <a href="{{ route('dashboard') }}" class="lg:block bg-secondary text-black hover:bg-frontprimary/15 hover:text-frontprimary px-6 py-2 rounded-full text-lg font-medium" />
                  Dashboard
                  </a> --}}
                  <x-dropdown align="right" width="48">
                      <x-slot name="trigger">
                          <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                              <div>{{ auth()->user()->name }}</div>

                              <div class="ms-1">
                                  <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                      <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                  </svg>
                              </div>
                          </button>
                      </x-slot>

                      <x-slot name="content">
                          <x-dropdown-link :href="route('dashboard')">
                              {{ __('Dashboard') }}
                          </x-dropdown-link>
                          <form method="POST" action="{{ route('logout') }}">
                              @csrf

                              <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                  {{ __('Log Out') }}
                              </x-responsive-nav-link>
                          </form>
                      </x-slot>
                  </x-dropdown>
                  @endauth
              </div>
          </div>
          {{-- {navbarOpen && (
          <div class="fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 z-40" />
          )}
          <div ref={mobileMenuRef} class={`lg:hidden fixed top-0 right-0 h-full w-full bg-darkmode shadow-lg transform transition-transform duration-300 max-w-xs ${navbarOpen ? "translate-x-0" : "translate-x-full" } z-50`}>
              <div class="flex items-center justify-between p-4">
                  <h2 class="text-lg font-bold text-midnight_text dark:text-midnight_text">
                      <Logo />
                  </h2>

                  {/* */}
                  <button onClick={()=> setNavbarOpen(false)}
                      class="bg-[url('/images/closed.svg')] bg-no-repeat bg-contain w-5 h-5 absolute top-0 right-0 mr-8 mt-8 dark:invert"
                      aria-label="Close menu Modal"
                      ></button>
              </div>
              <nav class="flex flex-col items-start p-4">
                  {headerData.map((item, index) => (
                  <MobileHeaderLink key={index} item={item} />
                  ))}
                  <div class="mt-4 flex flex-col space-y-4 w-full">
                      <Link href="#" class="bg-transparent border border-primary text-primary px-4 py-2 rounded-lg hover:bg-blue-600 hover:text-white" onClick={()=> {
                      setIsSignInOpen(true);
                      setNavbarOpen(false);
                      }}
          >
          Sign In
          </Link>
          <Link href="#" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-blue-700" onClick={()=> {
          setIsSignUpOpen(true);
          setNavbarOpen(false);
          }}
          >
          Sign Up
          </Link>
      </div>
      </nav>
      </div>
      </div> --}}
  </header>
