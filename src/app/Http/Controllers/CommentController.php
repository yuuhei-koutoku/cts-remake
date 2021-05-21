<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(CommentRequest $request, Comment $comment)
    {
        /*
        $user = auth()->user();
        $comment->fill($request->all());
        $comment->user_id = $request->user()->id;
        //$comment->user_id = $user->id;
        $comment->save();
        return redirect()->route('articles.show');
        */

        $comment->fill($request->all());
        $comment = new Comment();
        $comment->body = $request->body;
        $comment->save();
        return redirect()->route('articles.show');
    }

    /*
    public function store(CommentRequest $request, Comment $comment)
    {
        $comment->fill($request->all());
        $comment->user_id = $request->user()->id;
        $comment->article_id = $request->article()->id;
        $comment->save();
        return redirect()->route('articles.show');
    }
    */

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
