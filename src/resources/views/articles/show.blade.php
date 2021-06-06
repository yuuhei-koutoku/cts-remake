@extends('app')

@section('title', '詳細ページ')

@section('content')
@include('nav')
<div class="container">
    @include('articles.card')
</div>
<br>

<div class="container">
    <div class="col-md-8">
        <div class=h4>コメント一覧</div>
        @forelse($comments as $comment)
        <div>
            {!! nl2br(e($comment->body)) !!}


            @if( Auth::id() === $comment->user_id )
            <a href="{{ route("comments.edit", ['comment' => $comment]) }}">更新</a>

            @endif

        </div>
        @empty
        <p>コメントはまだありません。</p>
        @endforelse

        @auth
        <form method="POST" action="{{ route('comments.store') }}">
            @csrf
            <input type="hidden" name="article_id" value="{{$article->id}}">
            <textarea class="form-control" name="body" rows="4" placeholder="コメントを入力してください。">{{ old('comment') }}</textarea>
            <button type="submit" class="btn aqua-gradient btn-block">
                <i class="fas fa-pen mr-1"></i>コメントを送信する
            </button>
        </form>
        @endauth
    </div>
</div>
@endsection
