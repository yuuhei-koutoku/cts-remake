# 建設技術情報サイト


## URL


## 概要
建設業界で働いている方をターゲットとした、建設関係の技術情報を投稿し共有するCGMサービスです。

## 制作背景
建設業界では自分たちの保持している情報を外部に発信する場が少ないので、気軽にWeb上に公開できるよう
なサービスがあったら面白いと考え作成しました。

## 使用技術、バージョン
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

## 環境構築手順
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


## 機能一覧


## DB設計


## インフラ構成図
