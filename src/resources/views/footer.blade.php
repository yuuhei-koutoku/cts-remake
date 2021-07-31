<!-- Footer -->
<footer class="page-footer font-small teal">

    <!-- Footer Text -->
    <div class="container-fluid text-center text-md-left">

        <!-- Grid row -->
        <div class="row">

            <!-- Grid column -->
            <div class="col-md-6 mt-md-0 mt-3">

                <!-- Content -->
                <h5 class="text-uppercase font-weight-bold">
                    <i class="fas fa-building"></i>
                    <span class="logo_style">工事現場情報サイト</span>
                </h5>

            </div>
            <!-- Grid column -->

            <hr class="clearfix w-100 d-md-none">

            <!-- Grid column -->
            <div class="col-md-6 mb-md-0">

                <!-- Content -->
                <h5 class="text-uppercase font-weight-bold">リンク</h5>
                <ul class="d-flex flex-row list-unstyled footer-ul">
                    @guest
                    <li>
                        <a href="{{ route('register') }}" class="footer-list">ユーザー登録</a>
                    </li>
                    <li>
                        <a href="{{ route('login') }}" class="footer-list">ログイン</a>
                    </li>
                    <li>
                        <a href="{{ route('login.guest') }}" class="footer-list">ゲストログイン</a>
                    </li>
                    @endguest
                    @auth
                    <li>
                        <a href="{{ route('articles.create') }}" class="footer-list">投稿する</a>
                    </li>
                    <li>
                        <a href="#" class="footer-list" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a>
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
    <div class="footer-copyright text-center py-3">
        &copy; 2021 Yuhei Kotoku
    </div>
    <!-- Copyright -->

</footer>
<!-- Footer -->
