@extends('app')

@section('title', '投稿編集ページ')

@include('nav')

@section('content')
    <form method="POST" action="{{ route('articles.update', ['article' => $article]) }}">
        @method('PATCH')
        @include('articles.form')
        <button type="submit" class="btn blue-gradient btn-block">更新する</button>
    </form>
@endsection
