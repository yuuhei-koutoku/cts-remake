<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(CommentRequest $request, Comment $comment)
    {
        $arry=$request->all();
        $comment->fill($arry);
        $comment->user_id = $request->user()->id;
        $comment->save();
        return redirect()->route('articles.show', ['article' => $arry['article_id']]);
    }

    public function edit()
    {
        //
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
