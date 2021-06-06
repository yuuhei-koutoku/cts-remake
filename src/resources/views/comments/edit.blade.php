@extends('app')

@section('title', 'コメント編集ページ')

@include('nav')

@section('content')
<form method="POST" action="{{ route('comments.update', ['comment' => $comment]) }}" enctype="multipart/form-data">
    @method('PATCH')
    <textarea class="form-control" name="body" rows="4" placeholder="コメントを入力してください。">{{ old('comment') }}</textarea>
    <button type="submit" class="btn aqua-gradient btn-block"><i class="fas fa-pen mr-1"></i>更新する</button>
</form>
@endsection
