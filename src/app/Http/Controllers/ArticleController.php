<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        /*
        $articles = [
            (object) [
                'title' => 'タイトル1',
                'body' => '本文1'
            ],
            (object) [
                'title' => 'タイトル2',
                'body' => '本文2'
            ]
        ];
        */

        $articles = Article::all()->sortByDesc('created_at');

        return view('articles.index', ['articles' => $articles]);
    }

    public function create()
    {
        return view('articles.create');
    }
}
