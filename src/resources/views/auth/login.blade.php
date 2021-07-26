@extends('app')

@section('title', '工事現場情報サイト ログイン')

@section('content')
@include('nav')
<div class="container my-5">
    <div class="row">
        <div class="mx-auto col col-12 col-sm-11 col-md-9 col-lg-7 col-xl-6">
            <form method="POST" class="text-center border border-light p-5" action="{{ route('login') }}">
                @csrf

                <p class="h4 mb-4">ログイン</p>

                @include('error_card_list')

                <input class="form-control mb-4" type="text" id="email" name="email" value="{{ old('email') }}" placeholder="メールアドレス">

                <input class="form-control mb-4" type="password" id="password" name="password" placeholder="パスワード">

                <input type="hidden" name="remember" id="remember" value="on">

                <button class="btn aqua-gradient btn-block mb-2" type="submit">ログイン</button>
                <a href="{{ route('login.guest') }}" class="btn btn-block peach-gradient mb-2 text-white">
                    ゲストログイン
                </a>

                <div class="mt-0">
                    <a href="{{ route('register') }}" class="text-muted">ユーザー登録はこちら</a>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
