@extends('app')

@section('title', $tag->hashtag)

@section('content')
    @include('nav')
    <div class="container">
        <div class="card mt-3">
            <div class="card-body">
                <h2 class="h4 card-title m-0">{{ $tag->hashtag }}</h2>
                <div class="card-text text-right">
                    {{ $tag->articles->count() }}件
                </div>
            </div>
        </div>
        @foreach($tag->articles as $article)
            @include('articles.card')
        @endforeach
    </div>

    @auth
        <form method="POST" action="{{ route('comments.store') }}">
            @csrf
            <input type="hidden" name="article_id" value="{{ $article->id }}">
            <textarea class="form-control" name="comment" rows="4" placeholder="コメントを入力してください。">{{ old('comment') }}</textarea>
            <button type="submit" class="btn blue-gradient btn-block">
                コメントする
            </button>
        </form>
    @endauth

    <div class=h4>コメント一覧</div>
    @forelse($comments as $comment)
        <div>
            {!! nl2br(e($comment->comment)) !!}
        </div>
        @empty
        <p>コメントはまだありません。</p>
    @endforelse
@endsection
