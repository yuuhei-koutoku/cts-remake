@csrf
<div class="container my-5">
    <div class="row">
        <div class="offset-md-2 col-md-8">
            @include('error_card_list')
            <div class="mb-3">
                <label></label>
                <input type="text" name="title" class="form-control" value="{{ $article->title ?? old('title') }}" placeholder="タイトル">
            </div>
            <div class="mb-3">
                <article-tags-input :initial-tags='@json($tagNames ?? [])' :autocomplete-items='@json($allTagNames ?? [])'>
                </article-tags-input>
            </div>
            <div class="mb-3">
                <label></label>
                <textarea name="body" class="form-control" rows="16" placeholder="本文">{{ $article->body ?? old('body') }}</textarea>
            </div>
            <div class="mb-3">
                <input type="file" class="from-control-file" id="image" name="image">
            </div>
        </div>
    </div>
</div>
