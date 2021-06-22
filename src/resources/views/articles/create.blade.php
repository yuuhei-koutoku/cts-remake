@extends('app')

@section('title', '新規作成ページ')

@include('nav')

@section('content')
    <form method="POST" action="{{ route('articles.store') }}" enctype="multipart/form-data">
        @include('articles.form')

        <div class="container">
            <div class="row">
                <div class="offset-2 col-8">
                    <div class="md-form">
                        <button type="submit" class="btn aqua-gradient btn-block"><i class="fas fa-pen mr-1"></i>投稿する</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
