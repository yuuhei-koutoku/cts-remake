@extends('app')

@section('title', '工事現場情報サイト 新規投稿ページ')

@include('nav')

@section('content')
<form method="POST" action="{{ route('articles.store') }}" enctype="multipart/form-data">
    <!-- 記事 入力フォーム -->
    @include('articles.form')
    <div class="container">
        <div class="row">
            <div class="offset-md-2 col-md-8">
                <div>
                    <button type="submit" class="btn aqua-gradient btn-block"><i class="fas fa-pen mr-1"></i>投稿する</button>
                </div>
                <button type="button" class="btn btn-outline-info waves-effect my-5 ml-0">
                    <a href="/" class="text-info">
                        <i class="fas fa-angle-double-left"></i> 投稿一覧に戻る
                    </a>
                </button>
            </div>
        </div>
    </div>
</form>
@endsection
