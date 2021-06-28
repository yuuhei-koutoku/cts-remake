@extends('app')

@section('title', $tag->name)

@section('content')
@include('nav')
<div class="container">
    <div class="card mt-3">
        <div class="card-body">
            <h2 class="h4 card-title m-0"><strong>{{ $tag->name }}</strong> に関する記事が{{ $tag->articles->count() }}件あります。</h2>
        </div>
    </div>
    @foreach($tag->articles as $article)
    @include('articles.list')
    @endforeach
</div>
@include('footer')
@endsection
