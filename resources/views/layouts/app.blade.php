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

        .navbar {
            position: relative;
            /* アイコン位置の基準 */
        }

        .navhidden .navbar-toggler {
            z-index: 1050;
            /* アイコンが他の要素より前面に表示されるように調整 */
        }

        /* ハンバーガーアイコンと最終更新日の配置調整 */
        .position-absolute {
            top: 10px;
            /* 上からの距離を調整 */
        }

        /* スクリーン幅が768px未満のときに、positionを解除 */
        @media (max-width: 768px) {
            .sidebar {
                position: static;
                /* スクロール追従を解除 */
                height: auto;
                /* 高さを自動に設定 */
                /* display: none; */
                /* スマホサイズなどはサイドバー非表示 */
            }

            .navbar-toggler {
                top: 5px;
                /* 必要に応じて調整 */
                right: 5px;
            }

            .navbar .container-fluid {
                justify-content: center;
                /* コンテンツを中央寄せ */
            }

            .navhidden {
                display: block;
                width: 100%;
            }

            .position-absolute {
                top: 5px;
                /* 小画面用の微調整 */
                right: 5px;
            }
        }

        /* @media (min-width: 768px) {
            .navhidden {
                display: none;
                スマホサイズなどはサイドバー非表示
            }
        } */

        .update-info {
            white-space: nowrap;
            /* 文字が折り返されないようにする */
        }

        .sepia-bg2 {
            /* background-color: lightgreen; */
            position: relative;
            /* 相対位置指定 */
            top: 0;
            /* 上からの位置（デフォルトは0） */
            left: 15px;
            /* 左から50px移動（右に移動） */
            text-align: right;
        }

        /* ローディング画面 */
        #loading-screen {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        /* リングのスタイル */
        .spinner {
            border: 8px solid #f3f3f3;
            /* 薄い色 */
            border-top: 8px solid #3498db;
            /* トップ部分の色 */
            border-radius: 50%;
            /* 円形にする */
            width: 50px;
            /* リングのサイズ */
            height: 50px;
            animation: spin 1s linear infinite;
            /* アニメーションの設定 */
        }

        /* 回転のアニメーション */
        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
    @yield('style')
</head>

<body>
    <!-- ローディング画面 -->
    <div id="loading-screen">
        <div class="spinner"></div> <!-- 回転するリング -->
    </div>
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

    <script>
        // ページが完全に読み込まれたらローディング画面を非表示にする
        window.onload = function() {
            const loadingScreen = document.getElementById('loading-screen');
            loadingScreen.style.display = 'none'; // ローディング画面を非表示
        };
    </script>
    <!-- スクリプト用のセクション -->
    @yield('scripts')

</body>

</html>