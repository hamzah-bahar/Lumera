  <header class="fixed top-0 z-40 w-full pb-5 transition-all duration-300 bg-white shadow-lg py-6">
      <div class="lg:py-0 py-2">
          <div class="container mx-auto lg:max-w-screen-xl md:max-w-screen-md flex items-center justify-between px-4">
              <a href="/">

                  <img src="/lumera.png" alt="site logo" class="h-12">
              </a>

              <nav class="lg:flex flex-grow items-center gap-8 justify-center">
                  <a href="/" class="text-xl flex hover:text-black capitalized relative text-black after:absolute after:w-8 after:h-1 after:bg-frontprimary after:rounded-full after:-bottom-1">Home</a>
                  <a href="{{ route('articles') }}" class="text-xl flex hover:text-black capitalized relative">Articles</a>
                  <a href="#authors" class="text-xl flex hover:text-black capitalized relative">Authors</a>
                  <a href="#" class="text-xl flex hover:text-black capitalized relative">Testimonial</a>
              </nav>
              <div class="flex items-center gap-4">
                  <a href="#" class="lg:block bg-frontprimary text-white hover:bg-frontprimary/15 hover:text-frontprimary px-12 py-4 rounded-full text-lg font-medium" />
                  Sign In
                  </a>
                  <a href="#" class="lg:block bg-frontprimary/15 text-frontprimary hover:bg-frontprimary hover:text-white px-12 py-4 rounded-full text-lg font-medium" />
                  Sign up
                  </a>
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
