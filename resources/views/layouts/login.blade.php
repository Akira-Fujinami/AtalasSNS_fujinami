<!DOCTYPE html>
<html>
<head>
<title>AtlasSNS</title>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
</head>
<body>
    <header>
        <div class="container">
            <div id = "head">
                <p class="atlas"><a href="/top"><img src="{{asset('images/atlas.png')}}" alt="Atlas"></a></p>
            </div>
            @if(Auth::user()->images == "dawn.png")
                <div class="top-icon">
                    <img src="{{asset('images/icon1.png')}}" alt="ユーザーのアイコン">
                </div>
            @else
                <div>
                    <img src="{{asset('storage/'.Auth::user()->images)}}" alt="ユーザーのアイコン" class="user-image">
                </div>
            @endif
            <div class="header-menu">
                <div class="login-user">{{Auth::user()->username}}     さん
                </div>
                <div class="accordion">
                    <dl>
                        <dt>
                        </dt>
                    </dl>
                </div>
            </div>
        </div>
    </header>
    <nav class="menu">
        <ul class="right">
            <li><a href="/top">HOME</a></li>
            <li><a href="/profile">プロフィール編集</a></li>
            <li><a href="/logout">ログアウト</a></li>
        </ul>
    </nav>
    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bars">
            <div id="confirm"class="side-bar">
                <h6 class="username-auth">{{Auth::user()->username}}さんの</p>
            <div>
            <div class="follow">
                <div class="follow-number">フォロー数
            </div>
            <div class="number">{{ Auth::user()->follows()->count() }}名
            </div>
        </div>
    </div>
    <div class="button-followlist">
        <a href="/followList">フォローリスト</a>
    </div>
    <div class="follow">
        <div class="follower-number">フォロワー数
        </div>
        <div class="number">{{ Auth::user()->followers()->count() }}名
        </div>
    </div>
    <div class="button-followerlist">
        <a href="/followerList">フォロワーリスト</a>
    </div></div>
    <div id="side-center-bar">
        <div class="user-search">
            <a href="/search">ユーザー検索</a>
        </div>
    </div>
    <footer>
    </footer>
    <script src="{{ asset('/js/app.js') }}"></script>
    <script src="{{ asset('/js/script.js') }}"></script>
</body>
</html>
