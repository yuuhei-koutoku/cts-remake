@extends('app')

@section('title', '工事現場情報サイト 記事一覧')

@section('content')
@include('nav')
@guest
<div class="container">
    <div class="row">
        <!-- サイトタイトル -->
        <div class="col-lg-6 my-2">
            <div class="main-title">
                <i class="fas fa-building"></i>
                <span class="logo_style">工事現場情報サイト</span>
            </div>
        </div>
        <!-- トップページ画像 -->
        <div class="col-lg-6 my-2">
            <img src="/images/Construction-pana_r1.png" width="100%">
        </div>
    </div>
</div>

<!-- サイトのコンセプトの説明 -->
<div class="site-consept text-center my-2">
    <p class="sub-title mb-1">工事現場情報サイトとは</p>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p class="sub-body mb-0">
                    工事現場で活かせるスキルやテクニックを共有するサイトです。<br class="sp-br">
                    現場で仕事をする上で、役立つ知識をみんなでシェアしましょう。<br class="sp-br">
                    このサイトに投稿された情報は、是非現場で活用してみてください。
                </p>
            </div>
        </div>
    </div>
</div>
@endguest

<div class="container">
    <div class="row">
        <div class="col-12">
            <!-- 検索フォーム -->
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
