<!-- Footer -->
<footer class="page-footer font-small teal pt-4">

    <!-- Footer Text -->
    <div class="container-fluid text-center text-md-left">

        <!-- Grid row -->
        <div class="row">

            <!-- Grid column -->
            <div class="col-md-6 mt-md-0 mt-3">

                <!-- Content -->
                <h5 class="text-uppercase font-weight-bold">
                    <i class="fas fa-building"></i>
                    <span class="logo_style">建設技術情報サイト</span>
                </h5>
                <p>このサイトは架空サイトです。<a href="https://www.decn.co.jp/" target="_blank" rel="noopener noreferrer"><u>日刊建設工業新聞</u></a>から引用しています。</p>

            </div>
            <!-- Grid column -->

            <hr class="clearfix w-100 d-md-none pb-3">

            <!-- Grid column -->
            <div class="col-md-6 mb-md-0 mb-3">

                <!-- Content -->
                <h5 class="text-uppercase font-weight-bold">リンク</h5>
                <ul class="list-unstyled">
                    @guest
                    <li>
                        <a href="{{ route('register') }}">ユーザー登録</a>
                    </li>
                    <li>
                        <a href="{{ route('login') }}">ログイン</a>
                    </li>
                    <li>
                        <a href="{{ route('login.guest') }}">ゲストログイン</a>
                    </li>
                    @endguest
                    @auth
                    <li>
                        <a href="{{ route('articles.create') }}">投稿する</a>
                    </li>
                    <li>
                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                    @endauth
                </ul>

            </div>
            <!-- Grid column -->

        </div>
        <!-- Grid row -->

    </div>
    <!-- Footer Text -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">&copy; 2021 Copyright:
        <a href="https://mdbootstrap.com/"> MDBootstrap.com</a>
    </div>
    <!-- Copyright -->

</footer>
<!-- Footer -->
