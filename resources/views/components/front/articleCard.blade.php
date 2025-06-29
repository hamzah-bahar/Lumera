@props(["article", "width"=>"355px"])
<div class='bg-white m-3 mb-12 px-3 pt-3 pb-12 shadow-article-shadow rounded-2xl w-[390px] h-[600px]'>
    <div class="relative rounded-3xl">
        <img src="{{ $article->imageUrl() }}" alt="article-image" width="{{ $width }}" height="262px" class="m-auto clipPath rounded-2xl" />
        <div class="absolute right-5 -bottom-2 bg-frontsecondary rounded-full p-4">
            <h3 class="text-white uppercase text-center text-sm font-medium">{{ $article->category->name }}</h3>
        </div>
    </div>

    <div class="px-3 pt-6">
        <a href="{{ route('articles.show',$article) }}" class='text-2xl font-bold text-black max-w-75% inline-block'>{{ $article->title}}</a>
        <h3 class='text-base font-normal pt-6 text-black/75'>{{ \Illuminate\Support\Str::words($article->content,12) }}</h3>
        <div class="flex justify-between pt-6">
            <div class="flex gap-4">
                <h3 class="text-base font-medium text-black opacity-75">{{ $article->readTime() }} min read</h3>
            </div>
            <div class="flex gap-4">
                <h3 class="text-base font-medium text-black opacity-75">320 claps</h3>
            </div>
        </div>
    </div>
</div>
