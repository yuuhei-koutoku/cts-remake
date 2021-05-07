@extends('app')

@section('title', '記事一覧')

@section('content')
    @include('nav')
    <div class="container">
        @foreach($articles as $article)
        <div>
            {{ $article->title }}
        </div>
        <div>
            {{ $article->body }}
        </div>
        <div>
            {{ $article->user->name }}
        </div>
        <div>
            {{ $article->created_at->format('Y/m/d H:i') }}
        </div>
        @endforeach
    </div>
@endsection
