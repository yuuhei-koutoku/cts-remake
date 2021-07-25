<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    // ポリシーをコントローラーで使用
    public function __construct()
    {
        $this->authorizeResource(Comment::class, 'comment');
    }

    public function store(CommentRequest $request, Comment $comment)
    {
        // リクエストで送られたデータを配列にまとめて取り出し、変数に代入
        $array = $request->all();
        // Commentモデルのfillableプロパティ内に指定しておいたプロパティを、$commentの各プロパティに代入
        $comment->fill($array);
        // userメソッドでリクエストしたユーザーのidを取得し、Commentモデルのインスタンスのuser_idプロパティに代入
        $comment->user_id = $request->user()->id;
        $comment->save();

        return redirect()->route('articles.show', ['article' => $array['article_id']]);
    }

    public function edit(Comment $comment)
    {
        return view('comments.edit', ['comment' => $comment]);
    }

    public function update(CommentRequest $request, Comment $comment)
    {
        // リクエストで送られたデータを配列にまとめて取り出し、変数に代入
        $array = $request->all();
        // Commentモデルのfillableプロパティ内に指定しておいたプロパティを、$commentの各プロパティに代入し保存
        $comment->fill($array)->save();

        return redirect()->route('articles.show', $comment->article);
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->route('articles.show', $comment->article);
    }
}
