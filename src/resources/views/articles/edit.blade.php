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
                </div>
            </div>
        </div>
    </form>
@endsection
