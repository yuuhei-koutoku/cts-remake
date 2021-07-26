@extends('app')

@section('title', '工事現場情報サイト 記事一覧')

@section('content')
@include('nav')
<div class="container">
    <!-- トップページ画像 -->
    @guest
    <img src="/images/Construction-pana_r3.png" width="100%">
    @endguest

    <!-- 検索フォーム -->
    <div class="row">
        <div class="col-12">
            <form method="GET" action="{{ route('articles.index') }}" class="d-flex">
                <input class="form-control me-2 mt-3" name="search" value="{{ request('search') }}" type="search" placeholder="キーワードを入力" aria-label="Search">
                <button class="btn btn-outline-info mt-3 mb-0 ml-0 py-0" type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>
    </div>

    <!-- 記事一覧 -->
    @foreach($articles as $article)
    @include('articles.list')
    @endforeach

    {{ $articles->links('pagination::default') }}
</div>

@endsection
