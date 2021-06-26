@extends('app')

@section('title', '詳細ページ')

@section('content')
@include('nav')
<div class="container mb-5">
    @include('articles.card')
</div>

<div class="container">
    <div class="col-md-12">
        <div class=h4><strong>コメント一覧</strong></div>
        <div class="card example-1 square scrollbar-dusty-grass square thin mb-5">
            <div class="card-body">
                @forelse($comments as $comment)
                <div class="my-3">
                    {!! nl2br(e($comment->body)) !!}
                    <div class="text-right">
                        <span class="ligth-font pr-2">{{ $comment->user->name }}</span>
                        <span class="ligth-font pr-2">{{ $comment->created_at->format('Y/m/d H:i') }}</span>
                        <div class="auth-dropup">@include('comments.modal')</div>
                    </div>
                    <hr>
                </div>
                @empty
                <p>コメントはまだありません。</p>
                @endforelse
            </div>
        </div>

        @auth
        <form method="POST" action="{{ route('comments.store') }}">
            @csrf
            <input type="hidden" name="article_id" value="{{$article->id}}">
            <textarea class="form-control mb-2" name="body" rows="4" placeholder="コメントを入力してください。">{{ old('comment') }}</textarea>
            <button type="submit" class="btn aqua-gradient btn-block">
                <i class="fas fa-pen mr-1"></i>コメントを送信する
            </button>
        </form>
        @endauth

        <button type="button" class="btn btn-outline-info waves-effect my-5">
            <a href="/" class="text-info">
                <i class="fas fa-angle-double-left"></i> 投稿一覧に戻る
            </a>
        </button>
    </div>
</div>
@endsection
