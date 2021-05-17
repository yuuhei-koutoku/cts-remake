@extends('app')

@section('title', '詳細ページ')

@section('content')
    @include('nav')
    <div class="container">
        @include('articles.card')
    </div>

    <div class="p-3">
        <h3>コメント一覧</h3>
        @foreach($article->comments as $comments)
            {{ $comment->comment }}
            <a href="{{ route('users.show', $comment->user->id) }}">
                {{ $comment->user->name }}
            </a>
        @endforeach
        <a href="{{ route('comments.create', ['article_id' => $article->id"]) }}" classs="btn btn-primary">コメントする</a>
    </div>
    
@endsection
