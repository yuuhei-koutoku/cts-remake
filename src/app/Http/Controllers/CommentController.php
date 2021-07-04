<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Comment::class, 'comment');
    }

    public function store(CommentRequest $request, Comment $comment)
    {
        $array = $request->all();
        $comment->fill($array);
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
        $array = $request->all();
        $comment->fill($array)->save();

        return redirect()->route('articles.show', $comment->article);
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->route('articles.show', $comment->article);
    }
}
