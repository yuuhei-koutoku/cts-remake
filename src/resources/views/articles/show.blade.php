@extends('app')

@section('title', '詳細ページ')

@section('content')
    @include('nav')
    <div class="container">
        @include('articles.card')
    </div>

    @auth
        <form method="POST" action="{{ route('comments.store') }}">
            @csrf
            <textarea class="form-control" name="body" rows="4" placeholder="コメントを入力してください。">{{ old('comment') }}</textarea>
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
