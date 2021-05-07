@extends('app')

@section('title', '記事投稿')

@include('nav')

@section('content')
    <form method="POST" action="{{ route('articles.store') }}">
        @include('articles.form')
        <button type="submit" class="btn blue-gradient btn-block">投稿する</button>
    </form>
@endsection
