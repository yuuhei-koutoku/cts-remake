@extends('app')

@section('title', '工事現場情報サイト コメント編集')

@include('nav')

@section('content')
@csrf
<div class="container">
    <div class="row">
        <div class="offset-md-2 col-md-8">
            <!-- コメント 編集フォーム -->
            <form method="POST" action="{{ route('comments.update', ['comment' => $comment]) }}" class="mb-0">
                @csrf
                @method('PATCH')
                @include('error_card_list')
                <textarea class="form-control mt-5 mb-3" name="body" rows="10" placeholder="コメント">{{ $comment->body ?? old('body') }}</textarea>
                <button type="submit" class="btn aqua-gradient btn-block"><i class="fas fa-pen mr-1"></i>更新する</button>
            </form>
            <button type="button" class="btn btn-outline-info waves-effect my-5 ml-0">
                <a href="{{ route('articles.show', ['article' => $comment->article_id]) }}" class="text-info">
                    <i class="fas fa-angle-double-left"></i> 詳細ページに戻る
                </a>
            </button>
        </div>
    </div>
</div>
@endsection
