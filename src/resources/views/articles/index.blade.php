@extends('app')

@section('title', '一覧ページ')

@section('content')
    @include('nav')
    <div class="container">
        @foreach($articles as $article)
            @include('articles.card')
        @endforeach
    </div>
@endsection
