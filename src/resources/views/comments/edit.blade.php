@extends('app')

@section('title', 'コメント編集ページ')

@include('nav')

@section('content')
@csrf
<div class="container">
    <div class="row">
        <div class="offset-md-2 col-md-8">
            <div class="form-group">
                <form method="POST" action="{{ route('comments.update', ['comment' => $comment]) }}">
                    @csrf
                    @method('PATCH')
                    <textarea class="form-control my-5" name="body" rows="4" placeholder="コメントを入力してください。" required>{{ $comment->body ?? old('body') }}</textarea>
                    <button type="submit" class="btn aqua-gradient btn-block"><i class="fas fa-pen mr-1"></i>更新する</button>
                </form>
            </div>
            <button type="button" class="btn btn-outline-default waves-effect my-5">
                <a href="/" class="text-default">
                    <i class="fas fa-angle-double-left"></i> 詳細ページに戻る
                </a>
            </button>
        </div>
    </div>
</div>
@endsection
