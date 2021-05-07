@extends('app')

@section('title', '記事更新')

@include('nav')

@section('content')
    <form method="POST" action="{{ route('articles.update', ['article' => $article]) }}">
        @method('PATCH')
        @include('articles.form')
        <button type="submit" class="btn blue-gradient btn-block">更新する</button>
    </form>
@endsection
