# 工事現場情報サイト
![site-animation](/src/public/images/readme/Animation.gif)

## 目次
| 番号 | 項目 |
|:-:|:--|
| 1 | [URL](https://github.com/yuuhei-koutoku/cts-remake#1url) |
| 2 | [概要](https://github.com/yuuhei-koutoku/cts-remake#2%E6%A6%82%E8%A6%81) |
| 3 | [制作背景](https://github.com/yuuhei-koutoku/cts-remake#3%E5%88%B6%E4%BD%9C%E8%83%8C%E6%99%AF) |
| 4 | [目的](https://github.com/yuuhei-koutoku/cts-remake#4%E7%9B%AE%E7%9A%84) |
| 5 | [使用画面のイメージ](https://github.com/yuuhei-koutoku/cts-remake#5%E4%BD%BF%E7%94%A8%E7%94%BB%E9%9D%A2%E3%81%AE%E3%82%A4%E3%83%A1%E3%83%BC%E3%82%B8) |
| 6 | [使用技術、バージョン](https://github.com/yuuhei-koutoku/cts-remake#6%E4%BD%BF%E7%94%A8%E6%8A%80%E8%A1%93%E3%83%90%E3%83%BC%E3%82%B8%E3%83%A7%E3%83%B3) |
| 7 | [環境構築手順](https://github.com/yuuhei-koutoku/cts-remake#7%E7%92%B0%E5%A2%83%E6%A7%8B%E7%AF%89%E6%89%8B%E9%A0%86) |
| 8 | [機能一覧](https://github.com/yuuhei-koutoku/cts-remake#8%E6%A9%9F%E8%83%BD%E4%B8%80%E8%A6%A7) |
| 9 | [DB設計](https://github.com/yuuhei-koutoku/cts-remake#9db%E8%A8%AD%E8%A8%88) |
| 10 | [インフラ構成図](https://github.com/yuuhei-koutoku/cts-remake#10%E3%82%A4%E3%83%B3%E3%83%95%E3%83%A9%E6%A7%8B%E6%88%90%E5%9B%B3) |

## 1.URL
- URL：https://koujigenba.site
- ユーザー：ヘッダーもしくはログイン画面のゲストログインボタンを押すと簡単にログインできます。
![guestlogin-image](/src/public/images/readme/guestlogin.png)

なお、以前作成した[Construction-Technologies-Site](https://construction-technologies-site.herokuapp.com)と[工事現場情報サイト](https://koujigenba.site)を比較した、紹介記事をQiitaにて執筆しております。[Ruby・Railsで作ったポートフォリオをPHP・Laravelでリメイクしてみた](https://qiita.com/Yuhei_K/items/06805f3ac8607f77952f)

## 2.概要
工事現場の役立つスキルやテクニックなどの知識・情報を互いに共有するサイトです。

## 3.制作背景
工事現場で働いている人にとって、現場で活かせるスキルやテクニックは非常に有益で貴重なものです。
しかし、このような情報はあまりインターネット上では出回らないので、情報共有できるWebアプリを作成しました。

## 4.目的
現場で働いている人が互いにWeb上で情報共有することで、新たな知見や視点を得ることにより、普段働いている現場に役立てることを目的としています。

## 5.使用画面のイメージ
![usage-screen-image](/src/public/images/readme/cts-remake_usage-screen.png)

## 6.使用技術、バージョン
- フロントエンド
    - HTML / CSS / MDBootstrap
    - vue.js 2.6.12
- バックエンド
    - PHP 7.4.1
    - Laravel 6.20.26
- インフラ、その他
    - MySQL 8.0.25
    - Docker 17:03:37 / docker-compose 1.29.1
    - nginx 1.18.0（開発環境） / Apache 2.4.48（本番環境）
    - AWS（EC2, RDS, Route 53, S3）

## 7.環境構築手順
1.GitHubよりダウンロード
```
$ git clone https://github.com/yuuhei-koutoku/cts-remake.git
```
2.Dockerのコンテナを作成、起動
```
$ docker compose up
```
3.コンポーザーをインストール
```
$ docker-compose exec app php composer install
```
4.マイグレーションの実行
```
$ docker-compose exec app php artisan migrate
```
5.Vue.jsをインストール
```
$ docker-compose exec app npm install
```
6.トランスパイルの実行
```
$ docker-compose exec app npm run watch-poll
```

## 8.機能一覧
- ユーザー関連
    - ユーザー登録機能
    - ログイン機能
    - ゲストログイン機能
- 記事投稿関連
    - 新規作成
    - 編集
    - 削除
    - 画像投稿(AWS S3)
    - タグ(Vue.js)：各記事にタグを付けることが可能。記事に表示されているタグを押すと、そのタグが付けられた記事一覧が表示される。
- キーワード検索機能：タイトルと本文より部分一致検索を行う。
- コメント関連：各記事に対して、コメントを入力することができる。
    - 新規作成
    - 編集
    - 削除

## 9.DB設計
### ER図
![erd-image](/diagram/cts-remake_erd.PNG)
### テーブル設計
#### usersテーブル
ユーザーを管理する。nameにユニーク制約を追加している。
| カラム名           | 属性              | 役割                                                      |
|:------------------|:------------------|:---------------------------------------------------------|
| id                | 整数               | ユーザーを識別するID                                      |
| name              | 文字列/ユニーク制約 | ユーザー名                                                |
| email             | 文字列/ユニーク制約 | メールアドレス                                            |
| email_verified_at | 日付と時刻         | -                                                        |
| password          | 文字列             | このカラムに値があると時間が経っても自動的にログアウトされない |
| created_at        | 日付と時刻         | 作成日時                                                  |
| created_at        | 日付と時刻         | 更新日時                                                  |
#### articlesテーブル
記事を管理する。
| カラム名    | 属性           | 役割                      |
|:-----------|:---------------|:-------------------------|
| id         | 整数            | 記事を識別するID          |
| image      | 文字列/null許容 | 記事の画像                |
| title      | 文字列          | 記事のタイトル            |
| body       | 文字列          | 記事の本文                |
| user_id    | 整数            | 記事を投稿したユーザーのID |
| created_at | 日付と時刻      | 作成日時                  |
| updated_at | 日付と時刻      | 更新日時                  |
#### commentsテーブル
コメントを管理する。
| カラム名   | 属性       | 役割                          |
|:-----------|:----------|:-----------------------------|
| id         | 整数       | コメントを識別するID          |
| body       | 文字列     | コメント                      |
| user_id    | 整数       | コメントを投稿したユーザーのID |
| created_at | 日付と時刻 | 作成日時                      |
| updated_at | 日付と時刻 | 更新日時                      |
#### tagsテーブル
タグ名を管理する。同じタグ名のレコードが重複することの無いよう、nameにはユニーク制約を付けている。
| カラム名    | 属性              | 役割             |
|:-----------|:------------------|:----------------|
| id         | 整数               | タグを識別するID |
| name       | 文字列/ユニーク制約 | タグ名          |
| created_at | 日付と時刻         | 作成日時         |
| updated_at | 日付と時刻         | 更新日時         |
#### article_tagテーブル
「どの記事に」「何のタグが」付いているかを管理する。articlesテーブルとtagsテーブルを紐付ける中間テーブル。
| カラム名    | 属性       | 役割                   |
|:-----------|:-----------|:-----------------------|
| id         | 整数       | タグの紐付けを識別するID |
| article_id | 整数       | タグが付けられた記事のid |
| tag_id     | 整数       | 記事に付けられたタグのid |
| created_at | 日付と時刻 | 作成日時                |
| updated_at | 日付と時刻 | 更新日時                |

## 10.インフラ構成図
![infra-image](/diagram/cts-remake_infra_r1.PNG)

##### [↑ページトップへ](https://github.com/yuuhei-koutoku/cts-remake)
