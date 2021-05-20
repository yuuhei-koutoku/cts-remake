<?php

//様々なサイトのコメントコントローラーのstoreアクションを記載

//ポートフォリオ
public function store(CommentRequest $request, Comment $comment)
    {
        // 二重送信対策
        $request->session()->regenerateToken();

        $user = auth()->user();
        $comment->fill($request->validated() + ['ip_address' => $request->ip()]);
        $comment->user_id = $user->id;
        $comment->save();

        session()->flash('msg_success', 'コメントを投稿しました');

        return back();
    }

//【Laravel】掲示板を作成する（4）新規投稿機能、コメント投稿機能
public function store(CommentRequest $request)
    {
        $savedata = [
            'post_id' => $request->post_id,
            'name' => $request->name,
            'comment' => $request->comment,
        ];

        $comment = new Comment;
        $comment->fill($savedata)->save();

        return redirect()->route('bbs.show', [$savedata['post_id']])->with('commentstatus','コメントを投稿しました');
    }

//LaravelとVue.jsでコメント機能実装
public function store(Item $item, Request $request)
    {
        $comment = new Comment();
        $comment->text = $request->comment;
        $comment->user_id = Auth::id();

        $item->comments()->save($comment);
    }

//コメント機能の実装でハマった話
public function store(Request $request)
    {
        $validate_rule = [
            'post_id' => 'required|exists:posts,id',
            'body' => 'required|max:2000',
        ];
        $this->validate($request, $validate_rule);
        $params = $request->all();
        return $params;
        //Comment::create($params);
        return redirect()->route('posts_show', ['id' => $request->post_id]);
    }

//Laravel まとめ6(コメント表示/保存)
public function store(Request $request, $postId)
    {
        $this->validate($request, [
            'body' => 'required'
        ]);

        $comment = new Comment(['body' => $request->body]);
        $post = Post::findOrFail($postId);
        $post->comments()->save($comment);

        return redirect()
                ->action('PostsController@show', $post->id);
    }

//【保存版】Laravelで掲示板を作成する方法【チュートリアル】
public function store()
{
	$rules = [
		'commenter' => 'required',
		'comment'=>'required',
	];

	$messages = array(
		'commenter.required' => 'タイトルを正しく入力してください。',
		'comment.required' => '本文を正しく入力してください。',
	);

	$validator = Validator::make(Input::all(), $rules, $messages);

	if ($validator->passes()) {
		$comment = new Comment;
		$comment->commenter = Input::get('commenter');
		$comment->comment = Input::get('comment');
		$comment->post_id = Input::get('post_id');
		$comment->save();
		return Redirect::back()
			->with('message', '投稿が完了しました。');
	}else{
		return Redirect::back()
			->withErrors($validator)
			->withInput();
	}
}

//Laravel で簡単な掲示板を作る
public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'body' => 'required|string|max:512',
    ]);

    DB::transaction(function () use ($request) {
        $thread = $request->user()->threads()->create([
            'title' => $request->title,
        ]);

        $thread->comments()->create([
            'body' => $request->body,
            'user_id' => $request->user()->id
        ]);
    });

    return back();
}

//【PHP＋Laravel】Laravel入門 掲示板作成③
public function store(Request $request)
    {
        $params = $request->validate([
            'post_id' => 'required|exists:posts,id',
            'body' => 'required|max:2000',
        ]);

        $post = Post::findOrFail($params['post_id']);
        $post->comments()->create($params);

        return redirect()->route('posts.show', ['post' => $post]);
    }

//コメント掲示板を作成してみよう - Laravel 入門
public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:10',  // 入力が必須で，最大10文字
            'body' => 'required'           // 入力が必須
        ]);

        $comment = new Comment();    // インスタンスを生成する
        $comment->title = $request->title; // タイトルをセット
        $comment->body = $request->body;   // 本文をセット
        $comment->save();                  // データベースに登録
        return redirect('/comments');      // リダイレクト
    }
