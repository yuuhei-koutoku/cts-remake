@extends('app')

@section('title', '工事現場情報サイト 記事一覧')

@section('content')
@include('nav')
<div class="container">
    <!-- トップページ画像 -->
    @guest
    <div class="row">
        <div class="col-lg-6 my-2">
            <i class="fas fa-building"></i>
            <span class="logo_style">工事現場情報サイト</span>
        </div>
        <div class="col-lg-6 my-2">
            <img src="/images/Construction-pana_r5.png" width="100%">
        </div>
    </div>

    <div class="text-center mt-3">
        <p>工事現場情報サイトとは</p>
        <p>
            工事現場で活かせるスキルやテクニックを共有するサイトです。<br>
            現場で仕事をする上で、役立つ知識をみんなでシェアしましょう。<br>
            このサイトに投稿された情報は、是非現場で活用してみてください。
        </p>
    </div>
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
