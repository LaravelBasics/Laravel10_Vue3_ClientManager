<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'タイトル')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .sidebar {
            position: sticky;
            /* 固定されつつ、スクロールに追従 */
            top: 0;
            /* ビューポートの上端に固定 */
            height: 100vh;
            /* 必要に応じて高さを設定 */
        }

        .sidebar2 {
            position: sticky;
            /* 固定されつつ、スクロールに追従 */
            top: 0;
            /* ビューポートの上端に固定 */
            height: 100vh;
            /* 必要に応じて高さを設定 */
        }

        /* スクリーン幅が768px未満のときに、positionを解除 */
        @media (max-width: 768px) {
            .sidebar {
                position: static;
                /* スクロール追従を解除 */
                height: auto;
                /* 高さを自動に設定 */
            }
        }
    </style>
    @yield('style')
</head>

<body>
    <div id="app">
        <!-- ナビゲーションバー -->
        @include('includes.navbar')

        <div class="container-fluid">
            <div class="row">
                <!-- サイドメニュー -->
                <div class="col-md-2 bg-light sidebar">
                    @include('includes.sidemenu')
                </div>
                <!-- コンテンツ -->
                <div class="col-md-10 mt-0">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <!-- Vue 3 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/vue@3.3.0/dist/vue.global.prod.js"></script>
    <!-- Axios CDN -->
    <script src="https://cdn.jsdelivr.net/npm/axios@1.4.0/dist/axios.min.js"></script>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- スクリプト用のセクション -->
    @yield('scripts')

</body>

</html>