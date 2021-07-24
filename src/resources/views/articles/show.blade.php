@extends('app')

@section('title', '詳細ページ')

@section('content')
@include('nav')
<div class="container mb-5">
    <div>
        <div>
            <!-- titel -->
            <h3 class="article-title-show mt-5">
                {{ $article->title }}
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
            <!-- image -->
            @if ($article->image)
            <img src="{{ $article->image }}" class="article-img-size-show my-3">
            @endif
            <!-- body -->
            <div class="body-font pb-3">
                {!! nl2br(e($article->body)) !!}
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="col-md-12">
        <h4 class="comments-index">コメント一覧</h4>
        <div class="card example-1 square scrollbar-dusty-grass square thin mb-5">
            <div class="card-body">
                @forelse($comments as $comment)
                <div class="body-font my-3">
                    <!-- title -->
                    {!! nl2br(e($comment->body)) !!}
                    <!-- name,time,dropup -->
                    <div class="text-right">
                        <span class="light-font pr-2">{{ $comment->user->name }}</span>
                        <span class="light-font pr-2">{{ $comment->created_at->format('Y年n月j日 H時i分') }}</span>
                        @include('comments.dropup')
                    </div>
                    <hr>
                </div>
                @empty
                <p class="body-font">コメントはまだありません。</p>
                @endforelse
            </div>
        </div>

        @auth
        <form method="POST" action="{{ route('comments.store') }}">
            @csrf
            @include('error_card_list')
            <input type="hidden" name="article_id" value="{{$article->id}}">
            <textarea class="form-control mb-3" name="body" rows="5" placeholder="コメント">{{ old('comment') }}</textarea>
            <button type="submit" class="btn aqua-gradient btn-block">
                <i class="fas fa-pen mr-1"></i>コメントを送信する
            </button>
        </form>
        @endauth

        <button type="button" class="btn btn-outline-info waves-effect my-5 ml-0">
            <a href="/" class="text-info">
                <i class="fas fa-angle-double-left"></i> 投稿一覧に戻る
            </a>
        </button>
    </div>
</div>
@endsection
