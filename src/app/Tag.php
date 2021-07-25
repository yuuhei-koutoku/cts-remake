<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    //nameプロパティをセットしてタグモデルを保存（tagsテーブルにレコードを保存）
    protected $fillable = [
        'name',
    ];

    public function articles(): BelongsToMany
    {
        return $this->belongsToMany('App\Article')->withTimestamps();
    }
}
