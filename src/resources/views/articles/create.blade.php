@extends('app')

@section('title', '新規作成ページ')

@include('nav')

@section('content')
    <form method="POST" action="{{ route('articles.store') }}" enctype="multipart/form-data">
        @include('articles.form')
        <button type="submit" class="btn blue-gradient btn-block"><i class="fas fa-pen mr-1"></i>投稿する</button>
    </form>
@endsection
