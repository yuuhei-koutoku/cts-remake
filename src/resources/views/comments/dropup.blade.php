@if( Auth::id() === $comment->user_id )
<div class="auth-dropup">
    <!-- 3点リーダー -->
    <div class="ml-auto card-text">
        <div class="dropdown">
            <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-h"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="{{ route("comments.edit", ['comment' => $comment]) }}">
                    <i class="fas fa-pen mr-1"></i>コメントを更新する
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-danger" data-toggle="modal" data-target="#modal-delete-{{ $comment->id }}">
                    <i class="fas fa-trash-alt mr-1"></i>コメントを削除する
                </a>
            </div>
        </div>
    </div>

    <!-- 削除モーダル画面 -->
    <div id="modal-delete-{{ $comment->id }}" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('comments.destroy', ['comment' => $comment]) }}">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body text-center">
                        コメントを削除します。よろしいですか？
                    </div>
                    <div class="modal-footer justify-content-between">
                        <a class="btn btn-outline-grey" data-dismiss="modal">キャンセル</a>
                        <button type="submit" class="btn btn-danger">削除する</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endif
