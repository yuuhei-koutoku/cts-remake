@extends('app')

@section('title', $tag->name)

@section('content')
@include('nav')
<div class="container">
    <div class="card mt-3">
        <div class="card-body">
            <!-- 選択されたタグ名、タグの件数 -->
            <h2 class="h4 card-title m-0"><strong>{{ $tag->name }}</strong> に関する記事が{{ $tag->articles->count() }}件あります。</h2>
        </div>
    </div>
    <!-- 選択されたタグが付けられた記事一覧 -->
    @foreach($tag->articles as $article)
    @include('articles.list')
    @endforeach
</div>
@endsection
