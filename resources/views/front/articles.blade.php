<x-guest-layout>
    <x-front.header></x-front.header>
    <section id="articles" class="mt-36 mb-8">
        <div class='mx-auto lg:max-w-screen-xl md:max-w-screen-md px-4'>
            <div class="sm:flex justify-between items-center mb-8">
                <h2 class="text-midnight_text text-4xl lg:text-5xl font-semibold mb-5 sm:mb-0">Articles.</h2>
            </div>
            <x-category-tabs source='front' />
            <div class="flex flex-wrap">
                @foreach($articles as $article)
                <x-front.articleCard :article="$article" />
                @endforeach
            </div>
            {{ $articles->links() }}
        </div>
    </section>
</x-guest-layout>
