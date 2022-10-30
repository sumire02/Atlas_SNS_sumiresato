<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="{{ asset('/js/script.js') }} "></script>
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
        <div id = "head">
        <h1><a href="/top">
            <input type ="image" name="submit" width="100" height="40" src="{{ asset('images/atlas.png') }}"></a></h1>
            <div id="">
                <div id="">

                    <div class="accordion">
                        <div class="head">
                            <h5 class="accordion-title js-accordion-title">
                        <p>{{ Auth::user()->username }}さん
                            <img src="{{ asset('storage/images/'. Auth::user()->images) }}" class="rounded-circle" width="45" height="45">

                        <i class='button'></i>
                    </p>
            </h5>
        </div>
    </div>
</div>
</div>
</div>
</header>
<div id="row">
    <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <!-- サイドバーに隠しているようにするから上ではなくこの中 -->
            <ul class="content">
            <li><a href="/top">ホーム</a></li>
            <li><a href="/profile">プロフィール</a></li>
            <li><a href="/logout">ログアウト</a></li>
        </ul>
            <div id="confirm">
                <p>{{ Auth::user()->username }}さんの</p>
                <div>
                <p>フォロー数{{Auth()->user()->follows->count() }}名</p>
                </div>
                <div class="btn-f">
                <a class="btn btn-primary" href="/follow-list">フォローリスト</a>
            </div>
                <div>
                <p>フォロワー数{{Auth()->user()->followers->count() }}名</p>
                </div>
                <div class="btn-f">
                <a class="btn btn-primary" href="/follower-list" >フォロワーリスト</a>
            </div>
            </div>
            <div class="btn-u">
            <a class="btn btn-primary" href="/search">ユーザー検索</a>
        </div>
        </div>
    </div>
    <footer>
    </footer>
    <script src="JavaScriptファイルのURL"></script>
    <script src="JavaScriptファイルのURL"></script>
</body>
</html>
