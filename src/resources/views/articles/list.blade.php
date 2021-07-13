<div class="my-5">
    <div class="row">
        <!-- image -->
        <div class="article-img-padding col-md-5 col-lg-4 col-xl-3">
            <div class="view overlay">
                @if ($article->image)
                <img src="{{ $article->image }}" class="article-img-size-index">
                <a href="{{ route('articles.show', ['article' => $article]) }}">
                    <div class="mask rgba-white-slight"></div>
                </a>
                @else
                <img src="/images/no_image.jpg" class="article-img-size-index">
                <a href="{{ route('articles.show', ['article' => $article]) }}">
                    <div class="mask rgba-white-slight"></div>
                </a>
                @endif
            </div>
        </div>

        <div class="title-tag-other col-md-7 col-lg-8 col-xl-9">
            <!-- title -->
            <h3>
                <a class="article-title-index" href="{{ route('articles.show', ['article' => $article]) }}">
                    {{ $article->title }}
                </a>
            </h3>
            <!-- tag -->
            @foreach($article->tags as $tag)
            @if($loop->first)
            <div class="pt-0 pb-3">
                <div class="card-text line-height">
                    @endif
                    <a href="{{ route('tags.show', ['name' => $tag->name]) }}" class="border p-1 mr-1 mt-1 text-muted">
                        {{ $tag->name }}
                    </a>
                    @if($loop->last)
                </div>
            </div>
            @endif
            @endforeach
            <!-- name,time,dropup -->
            <div class="text-right">
                <span class="light-font pr-2">{{ $article->user->name }}</span>
                <span class="light-font pr-2">{{ $article->created_at->format('Y年n月j日 H時i分') }}</span>
                @include('articles.dropup')
            </div>
        </div>
    </div>
</div>
