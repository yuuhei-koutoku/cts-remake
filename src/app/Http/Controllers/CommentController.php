<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(CommentRequest $request, Comment $comment)
    {
        $array=$request->all();
        $comment->fill($array);
        $comment->user_id = $request->user()->id;
        $comment->save();
        return redirect()->route('articles.show', ['article' => $array['article_id']]);
    }

    public function edit(Comment $comment)
    {
        return view('comments.edit', ['comment' => $comment]);
    }

    public function update()
    {
        //
    }

    public function destroy()
    {
        //
    }
}
