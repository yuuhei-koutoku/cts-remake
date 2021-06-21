@extends('app')

@section('title', '一覧ページ')

@section('content')
@include('nav')
<div class="container">
    <div class="row">
            @guest
            <img src="/images/Construction-pana_r1.png" width="100%">
            @endguest
            <div class="col-12">
                <form method="GET" action="{{ route('articles.index') }}" class="d-flex">
                    <input class="form-control me-2 mt-3" name="search" value="{{ request('search') }}" type="search" placeholder="サイト内検索" aria-label="Search">
                    <button class="btn btn-outline-success mt-3 mb-0 ml-0 py-0" type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>

            @foreach($articles as $article)
            @include('articles.card')
            @endforeach
        {{ $articles->links() }}
    </div>
</div>
@endsection
