<nav class="navbar navbar-expand-lg navbar-dark default-color sticky-top">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">

        <a class="navbar-brand" href="/">
            <i class="fas fa-building"></i>
            <span class="logo_style">工事現場情報サイト</span>
        </a>

        <ul class="navbar-nav ml-auto mt-lg-0">

            <!-- ログアウト時のボタン -->
            @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">ユーザー登録</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">ログイン</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('login.guest') }}">ゲストログイン</a>
            </li>
            @endguest

            <!-- ログイン時のボタン -->
            @auth
            <li class="nav-item">
                <a class="nav-link" href="{{ route('articles.create') }}"><i class="fas fa-pen mr-1"></i>投稿する</a>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-door-open"></i>ログアウト</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>

            <li class="nav-item">
                <a class="nav-link disabled" href="#"><img src="/images/user_icon.png" height="22px">ユーザー名：{{ Auth::user()->name }}</a>
            </li>
            @endauth

        </ul>
    </div>
</nav>
