@extends('app')

@section('title', '記事一覧')

@section('content')
    <div class="container">
        @foreach($articles as $article)
            <div>
                {{ $article->title }}
            </div>
            <div>
                {{ $article->body }}
            </div>
        @endforeach
    </div>
@endsection
