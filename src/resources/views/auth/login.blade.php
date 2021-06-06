@extends('app')

@section('title', 'ログイン')

@section('content')
@include('nav')
<div class="container">
    <div class="row">
        <div class="mx-auto col col-12 col-sm-11 col-md-9 col-lg-7 col-xl-6">
            <form method="POST" class="text-center border border-light p-5" action="{{ route('login') }}">
                @csrf

                <p class="h4 mb-4">ログイン</p>

                @include('error_card_list')

                <input class="form-control mb-4" type="text" id="email" name="email" value="{{ old('email') }}" required placeholder="メールアドレス">

                <input class="form-control mb-4" type="password" id="password" name="password" required placeholder="パスワード">

                <input type="hidden" name="remember" id="remember" value="on">

                <button class="btn aqua-gradient btn-block mb-2" type="submit">ログイン</button>

                <button class="btn btn-block peach-gradient mb-2">
                    <a href="{{ route('login.guest') }}" class="text-white">
                        ゲストログイン
                    </a>
                </button>

                <div class="mt-0">
                    <a href="{{ route('register') }}" class="text-muted">ユーザー登録はこちら</a>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
