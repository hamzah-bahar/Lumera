 @props(["articles"])
 <section id="articles" class="mt-4">
     <div class='container mx-auto lg:max-w-screen-xl md:max-w-screen-md px-4'>
         <div class="sm:flex justify-between items-center mb-20">
             <h2 class="text-midnight_text text-4xl lg:text-5xl font-semibold mb-5 sm:mb-0">Popular articles.</h2>
             <a href="{{ route('articles') }}" class="text-frontprimary text-lg font-medium hover:tracking-widest duration-500">Explore articles&nbsp;&gt;&nbsp;</a>
         </div>
         <div class="flex">
             @foreach ($articles as $article )
             <x-front.articleCard :article="$article"></x-front.articleCard>
             @endforeach

         </div>

     </div>
 </section>
