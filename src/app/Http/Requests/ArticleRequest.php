<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'image' => 'mimes:jpeg,jpg,png,gif|max:10240',
            'title' => 'required|max:50',
            'body' => 'required|max:500',
            // JSON形式以外、スペース、/（スラッシュ）は許容しない
            'tags' => 'json|regex:/^(?!.*\s).+$/u|regex:/^(?!.*\/).*$/u',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'タイトル',
            'body' => '本文',
            'tags' => 'タグ',
        ];
    }

    // フォームリクエストのバリデーションが成功した後に自動的に呼ばれる
    public function passedValidation()
    {
        // JSON形式の文字列であるタグ情報をPHPのjson_decode関数を使って連想配列に変換
        // また、sliceメソッドやmapメソッドを使用するために、collect関数を使ってコレクションに変換
        $this->tags = collect(json_decode($this->tags))
            // コレクションの要素が6個以上ある場合は、最初の5個だけが残る
            ->slice(0, 5)
            // コレクションの各要素に対して順に処理を行い、新しいコレクションを作成
            ->map(function ($requestTag) {
                return $requestTag->text;
            });
    }
}
