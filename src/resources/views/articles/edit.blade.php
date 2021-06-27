@extends('app')

@section('title', '投稿編集ページ')

@include('nav')

@section('content')
<form method="POST" action="{{ route('articles.update', ['article' => $article]) }}" enctype="multipart/form-data">
    @method('PATCH')
    @include('articles.form')

    <div class="container">
        <div class="row">
            <div class="offset-md-2 col-md-8">
                <div class="md-form">
                    <button type="submit" class="btn aqua-gradient btn-block"><i class="fas fa-pen mr-1"></i>更新する</button>
                </div>
                <button type="button" class="btn btn-outline-info waves-effect my-5">
                    <a href="/" class="text-info">
                        <i class="fas fa-angle-double-left"></i> 詳細ページに戻る
                    </a>
                </button>
            </div>
        </div>
    </div>
</form>
@endsection
