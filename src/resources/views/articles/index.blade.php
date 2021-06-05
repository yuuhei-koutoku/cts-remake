@extends('app')

@section('title', '一覧ページ')

@section('content')
@include('nav')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @guest
            <img src="/images/Construction-pana.png" width="100%">
            @endguest
            <form method="GET" action="{{ route('articles.index') }}" class="d-flex">
                <input class="form-control me-2 mt-3" name="search" type="search" placeholder="検索" aria-label="Search">
                <button class="btn btn-outline-success mt-3 py-0" type="submit">検索する</button>
            </form>

            @foreach($articles as $article)
            @include('articles.card')
            @endforeach
        </div>
    </div>
</div>
@endsection
