<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
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

        return view('articles.index', ['articles' => $articles]);
    }
}
