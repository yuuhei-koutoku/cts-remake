@extends('app')

@section('title', '一覧ページ')

@section('content')
@include('nav')
<div class="container">
    <form method="GET" action="{{ route('articles.index') }}" class="d-flex">
        <input class="form-control me-2" name="search" type="search" placeholder="検索" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">検索する</button>
    </form>
    @foreach($articles as $article)
    @include('articles.card')
    @endforeach
</div>
@endsection
