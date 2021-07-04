@extends('app')

@section('title', 'ユーザー登録')

@section('content')
@include('nav')
<div class="container my-5">
    <div class="row">
        <div class="mx-auto col col-12 col-sm-11 col-md-9 col-lg-7 col-xl-6">
            <form method="POST" class="text-center border border-light p-5" action="{{ route('register') }}">
                @csrf

                <p class="h4 mb-4">ユーザー登録</p>

                @include('error_card_list')

                <input class="form-control" type="text" id="name" name="name" value="{{ old('name') }}" placeholder="ユーザー名">
                <small class="form-text text-muted mb-4">
                    (登録後の変更はできません)
                </small>

                <input class="form-control mb-4" type="text" id="email" name="email" value="{{ old('email') }}" placeholder="メールアドレス">

                <input class="form-control" type="password" id="password" name="password" placeholder="パスワード">
                <small class="form-text text-muted mb-4">
                    (半角英字（小文字）、半角英字（大文字）、半角数字を少なくとも１文字以上含む8文字以上)
                </small>

                <input class="form-control mb-4" type="password" id="password_confirmation" name="password_confirmation" placeholder="パスワード（確認）">

                <button class="btn aqua-gradient mb-2 btn-block" type="submit">ユーザー登録</button>

                <div class="mt-0">
                    <a href="{{ route('login') }}" class="text-muted">ログインはこちら</a>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
