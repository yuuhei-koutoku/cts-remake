@extends('app')

@section('title', '記事詳細')

@section('content')
@include('nav')
<div class="container">
    @include('articles.card')
</div>
<div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">コメント入力</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
</div>
<form method="POST" action="{{ route('comments.store') }}">
    <button type="submit" class="btn blue-gradient btn-block">投稿する</button>
</form>
@endsection
