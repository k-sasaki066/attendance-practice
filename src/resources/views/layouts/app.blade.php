<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
    <title>Atte</title>
</head>
<body>
    <header class="header">
        <div class="header__inner">
            <div class="header__title">
                <a href="" class="header__logo">Atte</a>
            </div>
            <nav class="header-nav">
                <ul class="header-nav__list">
                    <li class="header-nav__item"><a href="" class="header-nav__link">ホーム</a></li>
                    <li class="header-nav__item"><a href="" class="header-nav__link">日付一覧</a></li>
                    <li class="header-nav__item"><a href="" class="header-nav__link">ユーザー一覧</a></li>
                    <li class="header-nav__item"><a href="" class="header-nav__link">勤怠表</a></li>
                    <li class="header-nav__item"><a href="" class="header-nav__link">ログアウト</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="footer">
        <div class="footer__copylight">
            <small class="footer__copylight-text">&copy;Atte,Inc</small>
        </div>
    </footer>
</body>
</html>