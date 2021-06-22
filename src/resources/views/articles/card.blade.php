<div class="col-12">
    <div class="card mt-3">
        <div class="card-body d-flex flex-row">
            <div class="card-body pt-0">

                <div class="col-3 aritcle-card">
                    <div class="view overlay">
                        @if ($article->image)
                        <img src="{{ $article->image }}">
                        <a href="{{ route('articles.show', ['article' => $article]) }}">
                            <div class="mask rgba-white-slight"></div>
                        </a>
                        @endif
                    </div>
                </div>

                <div class="col-5 aritcle-card">
                    <h3 class="h4 card-title">
                        <a class="text-muted" href="{{ route('articles.show', ['article' => $article]) }}">
                            {{ $article->title }}
                        </a>
                    </h3>

                    @foreach($article->tags as $tag)
                    @if($loop->first)
                    <div class="pt-0 pb-3">
                        <div class="card-text line-height">
                            @endif
                            <a href="{{ route('tags.show', ['name' => $tag->name]) }}" class="border p-1 mr-1 mt-1 text-muted">
                                {{ $tag->name }}
                            </a>
                            @if($loop->last)
                        </div>
                    </div>
                    @endif
                    @endforeach

                    <div class="text-dark pb-3">
                        {{ $article->body }}
                    </div>

                    <div>
                        <span class="font-weight-lighter pr-2">{{ $article->user->name }}</span>
                        <span class="font-weight-lighter pr-2">{{ $article->created_at->format('Y/m/d H:i') }}</span>
                        <div class="aritcle-card">
                            @if( Auth::id() === $article->user_id )
                            <!-- dropdown -->
                            <div class="ml-auto card-text">
                                <div class="dropdown">
                                    <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-h"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="{{ route("articles.edit", ['article' => $article]) }}">
                                            <i class="fas fa-pen mr-1"></i>記事を更新する
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-danger" data-toggle="modal" data-target="#modal-delete-{{ $article->id }}">
                                            <i class="fas fa-trash-alt mr-1"></i>記事を削除する
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- dropdown -->
                            <!-- modal -->
                            <div id="modal-delete-{{ $article->id }}" class="modal fade" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form method="POST" action="{{ route('articles.destroy', ['article' => $article]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <div class="modal-body text-center">
                                                記事を削除します。よろしいですか？
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <a class="btn btn-outline-grey" data-dismiss="modal">キャンセル</a>
                                                <button type="submit" class="btn btn-danger">削除する</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- modal -->
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
