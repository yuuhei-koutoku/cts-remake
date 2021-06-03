@csrf
<div class="container">
    <div class="row">
        <div class="offset-md-2 col-md-8">
            <div class="md-form">
                <label>タイトル</label>
                <input type="text" name="title" class="form-control" required value="{{ $article->title ?? old('title') }}">
            </div>
            <div class="form-group">
                <article-tags-input :initial-tags='@json($tagNames ?? [])' :autocomplete-items='@json($allTagNames ?? [])'>
                </article-tags-input>
            </div>
            <div class="form-group">
                <label></label>
                <textarea name="body" required class="form-control" rows="16" placeholder="本文">{{ $article->body ?? old('body') }}</textarea>
            </div>
            <div class="form-group">
                <input type="file" class="from-control-file" id="image" name="image">
            </div>
        </div>
    </div>
</div>
