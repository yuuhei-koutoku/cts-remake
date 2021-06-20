<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use \InterventionImage;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Article::class, 'article');
    }

    public function index(Request $request)
    {
        // 文字列受け取り
        $search = $request->input('search');
        // クエリ生成
        $query = Article::query();
        // タイトルと本文の曖昧検索を実施
        if (!empty($search)) {
            $query->where('title', 'LIKE', "%{$search}%")
            ->orWhere('body', 'LIKE', "%{$search}%");
        }

        $articles = $query->orderByDesc('created_at')->paginate(10);

        return view('articles.index', ['articles' => $articles]);
    }

    public function create()
    {
        $allTagNames = Tag::all()->map(function ($tag) {
            return ['text' => $tag->name];
        });

        return view('articles.create', [
            'allTagNames' => $allTagNames,
        ]);
    }

    public function store(ArticleRequest $request, Article $article)
    {
        $article->fill($request->all());

        // 画像投稿機能
        if ($request->file('image')){
            // formから送信されたimgファイルを読み込む
            $file = $request->file('image');
            // 画像の拡張子を取得
            $extension = $request->file('image')->getClientOriginalExtension();
            // 画像の名前を取得
            $filename = $request->file('image')->getClientOriginalName();
            // 画像をリサイズ
            $resize_img = InterventionImage::make($file)->resize(462.5, 260)->encode($extension);
            // バケットの`myprefix`フォルダへアップロード
            $path = Storage::disk('s3')->put('/myprefix/'.$filename, (string)$resize_img, 'public');
            // アップロードした画像のフルパスを取得
            $article->image = Storage::disk('s3')->url('myprefix/'.$filename);
        }

        $article->user_id = $request->user()->id;
        $article->save();

        $request->tags->each(function ($tagName) use ($article) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $article->tags()->attach($tag);
        });

        return redirect()->route('articles.index');
    }

    public function edit(Article $article)
    {
        $tagNames = $article->tags->map(function ($tag) {
            return ['text' => $tag->name];
        });

        $allTagNames = Tag::all()->map(function ($tag) {
            return ['text' => $tag->name];
        });

        return view('articles.edit', [
            'article' => $article,
            'tagNames' => $tagNames,
            'allTagNames' => $allTagNames,
        ]);
    }

    public function update(ArticleRequest $request, Article $article)
    {
        $article->fill($request->all())->save();

        $article->tags()->detach();
        $request->tags->each(function ($tagName) use ($article) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $article->tags()->attach($tag);
        });

        return redirect()->route('articles.index');
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index');
    }

    public function show(Article $article)
    {
        $comments = $article->comments;
        return view('articles.show', ['article' => $article, 'comments' => $comments]);
    }
}
