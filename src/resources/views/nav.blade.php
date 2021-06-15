<nav class="navbar navbar-expand-lg navbar-dark aqua-gradient fixed-top">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">

        <a class="navbar-brand" href="/"><i class="fas fa-building"></i>Construction Technologies</a>

        <ul class="navbar-nav ml-auto mt-lg-0">

            @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">ユーザー登録</a>
            </li>
            @endguest

            @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">ログイン</a>
            </li>
            @endguest

            @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login.guest') }}">ゲストログイン</a>
            </li>
            @endguest

            @auth
            <li class="nav-item">
                <a class="nav-link" href="{{ route('articles.create') }}"><i class="fas fa-pen mr-1"></i>投稿する</a>
            </li>
            @endauth

            @auth
            <!-- Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-hard-hat"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                    <button class="dropdown-item" type="submit">
                        {{ Auth::user()->name }}
                    </button>
                    <div class="dropdown-divider"></div>
                    <button form="logout-button" class="dropdown-item" type="submit">
                        ログアウト
                    </button>
                </div>
            </li>
            <form id="logout-button" method="POST" action="{{ route('logout') }}">
                @csrf
            </form>
            <!-- Dropdown -->
            @endauth

        </ul>
    </div>
</nav>
