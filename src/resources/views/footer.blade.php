<footer>
    <div class="logo">
        <i class="fas fa-building"></i>
        <span class="logo_style">建設技術情報サイト</span>
    </div>
    <nav class="footer__nav">
        <ul>
            @guest
            <li><a href="{{ route('register') }}">ユーザー登録</a></li>
            <li><a href="{{ route('login') }}">ログイン</a></li>
            <li><a href="{{ route('login.guest') }}">ゲストログイン</a></li>
            @endguest
            @auth
            <li><a href="{{ route('articles.create') }}">投稿する</a></li>
            <li><a href="{{ route('logout') }}">ログアウト</a></li>
            @endauth
        </ul>
        <div class="footer__copyright">
            &copy;
        </div>
    </nav>


</footer>
