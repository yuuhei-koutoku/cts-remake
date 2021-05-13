@extends('app')

@section('title', '詳細ページ')

@section('content')
    @include('nav')
    <div class="container">
        @include('articles.card')
    </div>
    <div class=h4>コメント</div>
    <div>
        @foreach($comments as $comment)
            <div class="font-weight-bold">{{ $comment->user->name }}</div>
            <div class="font-weight-lighter">{{ $comment->created_at->format('Y/m/d H:i') }}</div>
            <div>{{ $comment->body }}</div>
        @endforeach
    </div>

    <form method="POST" action="{{ route('comments.store') }}">
        @csrf
        <label class=コメント></label>
        <div class="form-group">
            <textarea name="body" class="form-control" rows="16" placeholder="コメントを入力してください">{{ $comment->body ?? old('body') }}</textarea>
        </div>
        <button type="submit" class="btn blue-gradient btn-block">投稿する</button>
    </form>
@endsection
