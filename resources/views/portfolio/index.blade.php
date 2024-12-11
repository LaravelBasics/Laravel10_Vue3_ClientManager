@extends('layouts.app')

@section('title', 'ポートフォリオ')
@section('style')
<style>
    .aomori {
        background-color: lightblue;
    }

    .kagoshima {
        background-color: lightcoral;
    }

    .mie {
        background-color: #BCF4BC;
    }

    .inline-table {
        display: inline-block;
        margin-right: 1.25rem;
        /* テーブル間の余白調整 */
        vertical-align: top;
        /* 上揃え */
    }

    /* ライトグリーンのCSS */
    .light-green-bg {
        background-color: #A8D5BA;
    }

    /* セピアのCSS */
    .sepia-bg {
        background-color: #F5E6D3;
    }

    /* #AFDCEC; ペールブルーのCSS */
    /* グリーン */
    .green-bg {
        background-color: #BCF4BC;
        width: 100%;
        height: auto;
        margin: 0 0 1.25rem 0;
        /* 20px -> 1.25rem */
        padding: 0.7rem 0;
        /* 15px -> 0.9375rem */
        font-size: 3rem;
        text-align: center;
    }

    /* 背景灰色 rgb(240, 240, 240);*/
    .off-white-bg {
        /* 背景オフホワイトbackground-color: #F8F8F8; */
        background-color: rgb(240, 240, 240);
        width: 100%;
        height: auto;
        margin: 0 0 1.25rem 0;
        /* 20px -> 1.25rem */
        padding: 0.9375rem 0;
        /* 15px -> 0.9375rem */
        font-size: 3rem;
        text-align: center;

    }

    /* 背景灰色 */
    .gray-bg {
        background-color: rgb(240, 240, 240);
    }

    /* 背景アイボリー */
    .ivory-bg {
        background-color: #FFFFF0;
    }

    @media (max-width: 48rem) {
        .modal-dialog {
            max-width: 90%;
            /* モーダルの幅を90%にする */
        }

        .modal-content {
            max-height: 80vh;
            /* ビューポートの80%に制限 */
            overflow-y: auto;
            /* 縦方向にスクロール */
        }

        .modal-body p {
            font-size: 0.9rem;
            /* 小さい画面ではフォントサイズを少し小さく */
        }
    }
</style>
@endsection
@section('content')

<div class="container mt-4">

    <h1 class="green-bg" id="section3">【プロフィール】</h1>
    <div>
        <div>
            <h3>自己紹介</h3>
            <p class="gray-bg">私はゲーム（PSO2、ラチェット＆クランク、モンスターハンター、遊戯王）、アニメ、漫画が好きで、<br>
                テクノロジーに関心を持ちながら、プログラミングに挑戦し続けている成長中のエンジニアです。
                <br>
                PC関連の職に就くことを目指し、プログラミングの学習を始めました。趣味を通じて得た創造力を、開発の現場で活かしたいと考えています。
            </p>
        </div>
        <div>
            <h3>学習やキャリアの動機</h3>
            <p class="gray-bg">PC関係の職につきたいという思いから、プログラミングに興味を持ち、独学や実習を通じてスキルを身につけています。
                <br>
                特に、フロントエンド（Vue.js、Reactなど）とバックエンド（PHP、Java）の両方に興味があり、幅広い技術を学ぶことで自分の可能性を広げたいと思っています。
            </p>
        </div>
        <div>
            <h3>現在学習中の言語や環境</h3>
            <p class="gray-bg"><strong>プログラミング言語:</strong> PHP, HTML5, CSS3, JavaScript
                <br>
                <strong>フレームワーク: </strong>Laravel, Vue.js 3.4, Bootstrap 5.3
                <br>
                <strong>データベース:</strong> MySQL, PostgreSQL
                <br>
                <strong>開発環境:</strong> ローカル: XAMPP, Rocky Linux 9.4, Docker(少し経験)
                <br>
                <strong>デプロイ:</strong> GitHub, Vercel
            </p>
        </div>
        <div>
            <h3>デプロイ経験</h3>
            <p class="gray-bg">Windows、Linux共に、GitHubにプッシュ、Vercelにデプロイ、VercelDBとの接続にも成功。
                <br>
                WindowsはXAMPP, Laravel 10, 11, PHP 8.2, PostgreSQL
                <br>
                バーチャルボックス、Rocky Linux 9.4, Laravel 6, PHP 7.4, PostgreSQL
            </p>
        </div>
        <div>
            <h3>将来の目標</h3>
            <p class="gray-bg">将来の目標はまだ明確に決まっていませんが、フロントエンドとバックエンドの両方に興味を持ち、各技術を磨きながら、プロジェクトに活かしていきたいと考えています。</p>
        </div>
    </div>
    <div>
        <div>
            <h1 class="green-bg" id="section5">【実習履歴】</h1>
            <h5><strong>本社実習（株式会社リテラル）:</strong> 8/19～9/19の1か月間、10～16時（休憩1時間）</h3>
                <p class="gray-bg">

                    過去の案件顧客管理システムの一部を基本設計書、詳細設計書を元に作成（マイグレーション、シーダー、モデルは事前に用意された物を使用）
                    <br>
                    環境構築: ローカル環境、XAMPP（Laravel 10, PHP 8.2）、GitHubを使用しBacklogにプッシュ。
                    <br>
                    使用言語: Laravel 10, CDN, Vue.js 3.3, Bootstrap 5.3, MySQL
                    <br>
                    コミュニケーションツール: 実習中にSlackを使用し、チームメンバーとのコミュニケーションを円滑に行いました。
                    <br>
                    成果: 4画面大体完成。ログイン機能は無し。実習の評価は優秀でした。<br>
                    CSS（相対位置、絶対位置の違い）、データベース、コードの可読性などは更なる学習が必要と感じました。
                </p>
                <h5><strong>外部実習:</strong> 3日間、13～17時（小休憩自由）</h5>
                <p class="gray-bg">
                    課題①バーチャルボックスを使用してローカルにLAMP環境を構築し、Laravel 11をインストール。
                    <br>
                    課題②として⑤簡易問い合わせフォームを作成（テスト用にメールトラップで受信を確認しました）。
                    <br>
                    成果: 初めてLinuxを学習（実習1週間前の情報は、バーチャルボックスでLAMP環境を構築することのみ、事前の学習期間は1週間）、<br>
                    即戦力を求めていたため全体的に難しい課題だったものの、事前学習の甲斐もあり達成できました。
                </p>
        </div>
    </div>
    <h1 class="green-bg" id="section2">
        【Java課題制作】
    </h1>

    <div>
        <h4><button type="button" class="btn btn-link" @click="showHelpModal"
                style="font-size: 1.5rem; position: relative; right: 0.75rem;">
                FizzBuzz
            </button>
        </h4>
        <p class="gray-bg">開発環境：eclipse<br>制作期間：1日</p>
        「<strong>振り返り</strong>」<br>
        <p class="gray-bg">コード完成後（コメントアウトしている箇所）、職員からフィードバックを受けて、条件式の部分をメソッド化しました。</p>

        <div>
            <h4><button type="button" class="btn btn-link" @click="showHelpModal4"
                    style="font-size: 1.5rem; position: relative; right: 0.75rem;">
                    青森鹿児島問題（二次元配列）
                </button>
            </h4>
            <p class="gray-bg">開発環境：eclipse<br>制作期間：約2週間</p>
            「<strong>振り返り</strong>」<br>
            <p class="gray-bg">
                問題を【1】から順番に解いたため、コードは問題【4】のみです。<br>
                また、研究問題【1】のコードは実行時間3秒（ひとつのメソッドにまとめ、呼ぶ回数を減らすと、2秒でした）<br>
                研究問題【2】 5 * 5に減らすなどして、コード自体は完成したものの、<br>
                100 * 100だと、数分待っても処理が終わらないため、実行時間も含めると20 * 20までが限界でした。<br>
                コードの書き方次第で処理速度が大きく変わるなど、色々と勉強になりました。
            </p>
        </div>

        <div>
            <h4><button type="button" class="btn btn-link" @click="showHelpModal5"
                    style="font-size: 1.5rem; position: relative; right: 0.75rem;">
                    ブラックジャック
                </button>
            </h4>
            <p class="gray-bg">開発環境：eclipse<br>制作期間：3週間</p>
            「<strong>振り返り</strong>」<br>
            <p class="gray-bg">仕様や処理の順番（一人用にするか、対戦できるようにするか、カードを引く順番など）を決めて、<br>
                処理の仕方が分からない部分は職員に質問し、何度もデバッグしながら挑戦しました。<br>
                特に、エース【1】の扱い、勝敗判定の条件式に苦戦しながら、無事に完成しました。</p>
        </div>
        <h1 class="green-bg" id="section1">
            【稼働中のPHPアプリ】<br>
            <!-- <span class="mie" style="font-size: 1.5rem;">サーバーレス環境で動作するPHPアプリ（Vercel + Laravel + PostgreSQL）</span> -->
        </h1>
        <h5 class="mie"><strong>サーバーレス環境で動作するPHPアプリ（Vercel + Laravel + PostgreSQL）</strong></h5>
        <div>
            <div>
                <div>
                    <span style="font-weight: bold;">
                        ※Vercelの無料プランではリソース制限により、特に画像処理で504エラーが発生する場合があります。エラー時は少し時間を置いて再試行してください。
                    </span>
                    <div style="padding: 0.5rem 0;"></div>
                    <!-- <h3>①メルカリ風フリマアプリ</h3> -->
                    <h3>
                        <span style="margin-right: 5rem;">①メルカリ風フリマアプリ</span>
                        <a href="https://laravel6-flea-market.vercel.app/" target="_blank">アプリの画面</a>
                        <span style="margin-right: 5rem;"></span>
                        <a href="https://github.com/LaravelBasics/Laravel6_FleaMarket/tree/main"
                            target="_blank">GitHub</a>
                    </h3>
                </div>
                <p class="gray-bg">開発環境: Windows, Laravel 6, JavaScript, MySQL（教材の環境: Windows, Laravel 7, Docker,
                    JavaScript, MySQL）
                    <br>
                    アプリ製作期間：３週間
                </p>
                <strong>「アプリの説明」</strong><br>
                <p class="gray-bg">
                    メールアドレス、パスワードを入力してログイン、ログイン状態で画面右上の▼付近をクリックするとメニューが表示されます。<br>
                    プロフィールから名前、画像を編集出来ます。<br>
                    画面左上の Melpitアイコン をクリックするとトップページに移動。<br>
                    また、商品を出品、購入（購入済みの物はSOLDと表示）、出品中の物は検索が可能です。<br>
                    本来の画像処理は、クリックするとエクスプローラーが開いてPCから画像を選択できます。（詳細は「デプロイ」に記述）
                </p>
                <strong>「振り返り」</strong><br>
                <p class="gray-bg">
                    教材の環境と異なるためエラー対応や、Laravel 6でLaravel 7の機能再現に挑戦しました。
                    <br>
                    クレジットカード決済（PAY.JP）、Mailtrap.ioによるメール送受信、画像の保存処理にJavaScriptを利用するなど、基礎を学びつつエラー解決に取り組みました。
                </p>

                <strong>「デプロイ」</strong><br>
                <p class="gray-bg">
                    Windowsで作成したプロジェクト①をLinuxにコピーし、Laravel 6を使用して、デプロイに挑戦しました。
                    <br>
                    画像処理を除く機能は正常に動作しましたが、Vercelのサーバーレス環境ではPHPのライブラリが制限されており、
                    <br>
                    ユーザーがPCから選択した画像を直接保存して表示する機能が実現できませんでした。
                    <br>
                    そのため、事前にローカルでpublic/imagesに画像を保存し、デプロイ後に保存された画像を表示するように仕様を変更しました。
                    <br>
                    これにより、一時的に画像処理の機能が動作するようになりました。
                </p>
                <br>
            </div>
            <div>
                <h3>
                <strong style="margin-right: 5rem;">②SNS風アプリ</strong>
                    <a href="https://laravel6-sns.vercel.app/" target="_blank">アプリの画面</a>
                    <span style="margin-right: 5rem;"></span>
                    <a href="https://github.com/LaravelBasics/Laravel6_SNS" target="_blank">GitHub</a>
                </h3>
                <p class="gray-bg">開発環境: Windows, Laravel 6, Vue.js 3, MySQL
                    （教材の環境: MacOS, Laravel 6, Docker, Vue.js 2, PostgreSQL）
                    <br>
                    アプリ製作期間：３週間
                </p>
                <strong>「アプリの説明」</strong><br>
                <p class="gray-bg">
                    メールアドレス、パスワードを入力してログインすると、記事の投稿やユーザーのフォローなどができます。<br>
                    ログイン後、ハートを押すと「いいね」が付きます（赤の状態でクリックすると逆になります。※反映までタイムラグ５～６秒）<br>
                    ＃タグをクリックすると、クリックしたタグを検索。ユーザー名付近をクリックすると、<br>
                    クリックしたユーザーのページへ移動、フォローや記事をみれます。（フォロー中の場合、フォローが外れます）<br>
                    ※ログインしていない場合一部の機能は、ポップアップで説明が出ます。<br>

                    画面左上の「Memo」をクリックすると、トップページに移動します。画面右上の投稿するから記事を新規投稿、トップページの︙マークを押すと記事を編集できます。
                </p>
                <strong>「振り返り」</strong><br>
                <p class="gray-bg">
                    初めてのVue.jsとLaravelの環境構築に苦戦し、
                    <br>
                    特にnpm依存関係のエラーでVue.jsが2から3へ自動的にバージョンアップされたため記述の違いにさらに時間がかかりました。
                    <br>
                    教材通りの機能は実装できたものの、Vueコンポーネントの理解が不十分でした。
                    <br>
                    また、Googleアカウントでのログイン機能の実装も困難でしたが、無事に実現しました。
                </p>
                <strong>「デプロイ」</strong><br>
                <p class="gray-bg">
                    Linux上でLaravel 6を用いたデプロイに挑戦した際、Laravel Mixのmix.jsを使ったVue.js機能が本番環境で動作しないという課題に直面しました。
                    <br>
                    これに対して、npm run productionでビルドを行い、vercel.jsonの設定を見直した後、npx vercel
                    --forceで再デプロイすることでVue.jsが本番で正常に動作するよう改善しました。

                </p>
                <br>
            </div>
            <div>
                <h3>
                <strong style="margin-right: 5rem;">③本管理アプリ</strong>
                    <a href="https://laravel10-books.vercel.app/" target="_blank">アプリの画面</a>
                    <span style="margin-right: 5rem;"></span>
                    <a href="https://github.com/LaravelBasics/Laravel10_Books" target="_blank">GitHub</a>
                </h3>
                <p class="gray-bg">開発環境: Windows, Laravel 10, React, 認証パッケージBreeze, PostgreSQL
                    <br>
                    アプリ製作期間：１週間
                </p>
                <strong>「アプリの説明」</strong><br>
                <p class="gray-bg">
                    画面右上から、メールアドレス、パスワードを入力してログインできます。<br>
                    ログイン後、Booksをクリックすると、本管理ページに移動します。<br>
                    登録、編集、削除が行える機能や、ページネーションに対応しています。
                </p>
                <strong>「振り返り」</strong><br>
                <p class="gray-bg">
                    就労支援の職員が作成した基本設計書をもとに、本管理アプリの機能変更と追加を行いました。
                    <br>
                    Laravelシーダーのファクトリークラスでダミーデータを生成した際に、ダミーデータを英語から日本語に変更するのに苦戦しました。
                    <br>
                    職員に動作確認をしてもらい機能自体は完成しましたが、Reactはあまり理解できませんでした。
                </p>
                <strong>「デプロイ」</strong><br>
                <p class="gray-bg">
                    Reactのjsxファイルでデプロイに挑戦しました。成功するか不安でしたが、無事に動作しました。
                </p>
                <br>
            </div>
            <div>
                <h3>
                <strong style="margin-right: 5rem;">④顧客管理システムを置き換えたアプリ</strong>
                    <a href="https://laravel10-vue3-client-manager.vercel.app/languages"
                        target="_blank">アプリの画面</a>
                    <span style="margin-right: 5rem;"></span>
                    <a href="https://github.com/LaravelBasics/Laravel10_Vue3_ClientManager/tree/master"
                        target="_blank">GitHub</a>
                </h3>
                </p>
                <p class="gray-bg">開発環境: Windows, Laravel 10, CDN Vuejs 3.3, Bootstrap 5.3
                    <br>
                    実習中のアプリ製作期間：１か月（既存のコードを改修した期間：１週間）
                </p>
                <strong>「アプリの説明」</strong><br>
                <p class="gray-bg">
                    例：学習した日数一覧画面に移動後、登録などの際に、プログラミング言語（セレクトボックス）をクリック後、<br>
                    教材をクリックすると、プログラミング言語に紐付いた教材が取得されます。（取得までタイムラグがあります）<br>
                    <strong class="mie" style="color: #333333; font-weight: bold;">※空のまま検索ボタンをクリックすると、データベースから全件取得されます。
                        <br>
                    </strong>
                    ※左のサイドメニュー: 学習したプログラミングをクリックすると、４つの画面にアクセスできます。<br>
                    登録、編集、削除が行える機能や、バリデーション機能、学習日数コードなどをクリックするとソート機能（並び替え、昇順⇔降順）が行われます。<br>
                    登録済みデータの表示部分はバックエンド、編集ボタンをクリックした時、バックからフロントにデータを渡しています。<br>
                </p>
                <strong>「振り返り」</strong><br>
                <p class="gray-bg">
                    社外秘の情報が含まれているため職員に確認を取り、実習で作成したコードを置き換えることに挑戦しました。<br>
                    元の仕様"A"に紐付く"B"から、プログラミング言語に紐付く教材、教材に紐付く学習した日数、のように変更しました。
                    <br>
                    マイグレーションのテーブル名、ユニークカラムをすべて変更し、それに伴うモデル、コントローラー、リクエストクラス、ブレードなどを修正しました。
                </p>
                <strong>「デプロイ」</strong><br>
                <p class="gray-bg">
                    CDNを使用していたため、Vue.jsやBootstrapの動作も問題なくスムーズにデプロイできました。</p>
                <br>
            </div>
            <div>
                <h3>
                <strong style="margin-right: 5rem;">⑤簡易お問い合わせフォームアプリ</strong>
                    <a href="https://laravel11-contact-form.vercel.app/" target="_blank">アプリの画面</a>
                    <span style="margin-right: 5rem;"></span>
                    <a href="https://github.com/LaravelBasics/Laravel11_ContactForm/tree/master"
                        target="_blank">GitHub</a>
                </h3>
                <p class="gray-bg">開発環境: バーチャルボックス, LAMP(RockyLinux9.4, apache 2.4, MySQL 8.0, PHP8.2), Laravel 11
                    <br>
                    アプリ製作期間：３～４時間（環境構築を除いた時間）
                </p>
                <strong>「アプリの説明」</strong><br>
                <p class="gray-bg">
                    外部実習で制作したアプリ。フロントエンドは最低限の機能（バリデーション、送信時に同意するチェックボックスなど）で実装しました。<br>
                    テスト用にメールトラップで受信を確認しました。
                    <br>
                    Laravel 11は初めて触ったので、メール、管理者、送信者など難しかったです。
                </p>
                <strong>「デプロイ」</strong><br>
                <p class="gray-bg">
                    デプロイ後も動作するのか気になったため挑戦し、無事にメールトラップで受信できました。</p>
                <br>
            </div>
            <div>
                <h3>
                <strong style="margin-right: 5rem;">⑥Breezeを使ったログイン機能のデプロイに挑戦したアプリ</strong>
                    <a href="https://laravel10-breeze-demo.vercel.app/"
                        target="_blank">アプリの画面</a>
                    <span style="margin-right: 5rem;"></span>
                    <a href="https://github.com/LaravelBasics/Laravel10_Breeze_Demo/tree/aaa"
                        target="_blank">GitHub</a>
                </h3>
                <p class="gray-bg">開発環境: Windows, Laravel 10, 認証パッケージBreeze, PostgreSQL
                    <br>
                    デプロイまでの期間２日
                </p>
                <strong>「アプリの説明」</strong><br>
                <p class="gray-bg">
                    画面右上から、メールアドレス、パスワードを入力してログインできます。
                </p>
                <strong>「振り返り」</strong><br>
                <p class="gray-bg">
                    Laravelでデプロイに挑戦。
                    就労支援の職員が作成した教材をもとに、Docker（WSL）とVercel(gihub連携)を学習しました。
                    <br>
                    Vercelでの環境変数やデータベース接続（特にvercel.jsonや.envファイルの記述）には、ネット上（2024年10月）に十分な情報がなく試行錯誤を要しました。
                    <br>
                    最終的に、成功した設定をもとに必要な項目を逆算して整理、職員の方もデプロイ成功に至ったことが何よりの成果で、大きな達成感を感じました。
                </p>

                <strong>「デプロイ」</strong><br>
                <p class="gray-bg">
                    ローカルでのPostgreSQLインストールの必要性や接続方法の設定など、チャットGPTを活用しつつ、100回以上デプロイを試行してようやく成功に至りました。
                    <br>
                    Dockerはコンテナで使用するDockerfileの作成に難航し、実習で経験したRockyLinuxを使って試行した結果、Linuxでは無事に成功しました。
                </p>
                <br>
            </div>
        </div>


        <!-- ①のモーダル -->
        <div class="modal fade" id="helpModal" tabindex="-1" aria-labelledby="helpModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="max-width: 47.24rem;">
                <div class="modal-content" style="height: 23.622rem;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="helpModalLabel">
                            FizzBuzz
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h5>【問題】</h5>
                        <p>1から100までの数字を画面に表示してください。ただし、<br>
                            3の倍数は"FIzz"、<br>
                            5の倍数は"Buzz"、<br>
                            15の倍数は"FizzBuzz"と<br>
                            表示してください。
                        </p>
                        <a href="https://github.com/LaravelBasics/java/blob/master/src/FizzBuzz7_1/FizzBuzz.java"
                            target="_blank">
                            <h5>自身で制作したコード</h5>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- ④のモーダル --}}
        <div class="modal fade" id="helpModal4" tabindex="-1" aria-labelledby="helpModalLabel4" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="max-width: 52.03rem;">
                <div class="modal-content" style="height: 37.80rem;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="helpModalLabel4">青森鹿児島問題</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>二次元配列があり、中には0と1がランダムで入っています。※この二次元配列を世界と呼ぶことにします<br>
                            世界の中から青森と鹿児島の数を数えて表示します。以下は青森と鹿児島の定義です</p>
                        <div>
                            <table class="inline-table" border="1">
                                <tb>青森</tb>
                                <tr>
                                    <td class="aomori">1</td>
                                    <td class="aomori">0</td>
                                    <td class="aomori">1</td>

                                </tr>
                                <tr>
                                    <td class="aomori">1</td>
                                    <td class="aomori">1</td>
                                    <td class="aomori">1</td>
                                </tr>
                            </table>
                            <table class="inline-table" border="1">
                                <tb>鹿児島</tb>
                                <tr>
                                    <td class="kagoshima">1</td>
                                    <td class="kagoshima">1</td>
                                    <td class="kagoshima">1</td>
                                </tr>
                                <tr>
                                    <td class="kagoshima">1</td>
                                    <td class="kagoshima">0</td>
                                    <td class="kagoshima">1</td>
                                </tr>
                            </table>
                            <table class="inline-table" border="1">
                                <tb>三重</tb>
                                <tr>
                                    <td class="mie">1</td>
                                    <td class="mie">0</td>
                                </tr>
                                <tr>
                                    <td class="mie">1</td>
                                    <td class="mie">1</td>
                                </tr>
                                <tr>
                                    <td class="mie">1</td>
                                    <td class="mie">0</td>
                                </tr>
                            </table>
                            <div class="inline-table">
                                <p>世界の例 ➡<br>
                                    青森の数: 1個<br>
                                    鹿児島の数: 2個</p>
                            </div>
                            <table class="inline-table" border="1">
                                <tr>
                                    <td>0</td>
                                    <td>1</td>
                                    <td>0</td>
                                    <td>1</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                    <td>1</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>0</td>
                                    <td>1</td>
                                    <td>0</td>
                                    <td>1</td>
                                </tr>
                            </table>
                        </div>

                        <h5>問題 【1】</h5>
                        10 * 10 の世界を作成し、その中の青森と鹿児島の数を教えてください

                        <h5>問題 【2】</h5>
                        3000 * 3000 の世界を作成し、その中の青森と鹿児島の数を教えてください。
                        ただし1秒以内に数え終わってください

                        <h5>問題 【3】</h5>
                        新しく三重を追加します。
                        10 * 10 の世界を作成し、その中の青森と鹿児島と三重の数を教えてください

                        <h5>問題 【4】<a
                                href="https://github.com/LaravelBasics/java/blob/master/src/%E9%9D%92%E6%A3%AE%E9%B9%BF%E5%85%90%E5%B3%B6%E5%95%8F%E9%A1%8C/Main.java"
                                target="_blank" style="padding-left: 4.3rem;">自身で制作したコード</a></h5>
                        5 * 5の世界の中に存在できる青森の最大の数と、その配置を求めてください

                        <h5>研究問題 【1】<a
                                href="https://github.com/LaravelBasics/java/blob/master/src/%E9%9D%92%E6%A3%AE%E9%B9%BF%E5%85%90%E5%B3%B6%E5%95%8F%E9%A1%8C/kennkyuu.java"
                                target="_blank" style="padding-left: 2rem;">自身で制作したコード</a></h5>
                        10000 * 10000 の世界を作成し、その中の青森と鹿児島の数を教えてください
                        ただし、１秒以内に数えて終わってください

                        <h5>研究問題 【2】</h5>
                        100 * 100の世界の中に存在できる青森、鹿児島、三重の合計の最大の数と、その配置を求めてください <br>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        {{-- ブラックジャックモーダル --}}
        <div class="modal fade" id="helpModal5" tabindex="-1" aria-labelledby="helpModalLabel5" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="max-width: 59.05rem;">
                <div class="modal-content" style="height: 37.80rem;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="helpModalLabel5">
                            ブラックジャック
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h5>【自身で考えた仕様】<a
                                href="https://github.com/LaravelBasics/java/blob/master/src/%E3%83%96%E3%83%A9%E3%83%83%E3%82%AF%E3%82%B8%E3%83%A3%E3%83%83%E3%82%AF/Game.java"
                                target="_blank" style="padding-left: 2rem;">自身で制作したコード</a></h5>
                        <p>５２枚のトランプを使用（ジョーカーはありません）<br>
                            初めにディーラーがカードを2枚ずつ配ります。<br>
                            ゲーム開始時、『ディーラー』の手は２枚のうち1枚だけ開示されます<br>
                            『ディーラー』は『プレイヤー』に対してカードの追加を行うかを聞きます。<br>
                            カードを追加する場合は、【１】を入力<br>
                            手持ちの点数が十分だと思ったら、【０】を入力。その点数のままディーラーと勝負します。<br>
                            カードは何枚でも追加できますが、21点を越えてしまうとその時点で『プレイヤー』の負けとなります。<br>
                            『プレイヤー』が選択を終えた後、最後に『ディーラー』がカードをめくり、17点以上になるまでカードを引き続け、【勝負】となります。<br>
                            『ディーラー』が22点以上になった場合は、『ディーラー』の負けとなり、『プレイヤー』が21点以下の場合勝利となります。<br>
                            『ディーラー』よりも21点に近い場合、『プレイヤー』は勝ちとなり、逆に『ディーラー』よりも21点に遠い場合プレイヤーは負けとなります。<br>
                            同点の場合は引き分けとなります。</p>
                        <h5>【カードの数え方】</h5>
                        <p>2～9 まではそのままの数字、10・J・Q・K は「すべて10点」と数えます。<br>
                            また、 A （エース）は「1点」もしくは「11点」のどちらに数えても構いません。</p>
                        <h5>【特別な役】</h5>
                        <p>最初に配られた2枚のカードが「Aと10点札」で21点が完成していた場合を<br>
                            『ブラックジャック』といい、片方のみの場合その時点で勝ちとなります。</p>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div>
        <h1 class="green-bg" id="section4">【プログラミング学習履歴】</h1>
        <div>
            <h6 class="mie">2023年10月: プログラミングを0から学習開始</h6>
            <p>10月1日〜1月19日: 教材ProgateのJava、就労支援カリキュラムのJava基礎、アルゴリズム、2次元配列、例外処理、ファイル入出力など（約4ヶ月）</p>

            <h6 class="mie">2024年1月</h6>
            <p>1月22日〜2月13日: エクリプス上で動くブラック・ジャックを作成（約3週間）</p>
            <p>2月15日〜3月14日: 教材Be EngineerのPHP基礎, アルゴリズム問題, 基礎15問, 応用15問</p>
            <p>3月15日〜3月16日: Be EngineerのHTML/CSS/JavaScript</p>
            <p>3月19日〜3月22日: ProgateのJavaScript</p>
            <p>3月25日〜3月27日: SQL</p>
            <p>3月29日〜4月1日: ProgateのPython</p>
            <p class="gray-bg">4月1日〜4月30日: Microsoft Officeを学習</p>
            <p>4月25日〜5月17日: 教材PDO</p>
            <p>5月20日〜6月24日: 教材Laravel 6基礎</p>
            <p>6月25日〜7月4日: 教材Techpit①メルカリ風フリマアプリ制作、Excelアンケートデータ入力(一日目10件、二日目20件)</p>
            <p>7月8日〜7月24日: Techpit②SNS風アプリ制作、PC4台キッティング作業</p>

            <h6 class="mie">2024年7月</h6>
            <p>7月26日〜7月31日: 職員が作成した基本設計書をもとに（Laravel 10, React）③本管理アプリの機能変更、追加。ProgateでReact学習</p>
            <p>7月31日〜8月5日: ProgateのJavaScript、Git、HTML&CSS</p>
            <p>8月6日〜8月7日: JavaScriptによるDOM操作</p>
            <p>8月8日〜8月16日: Vue.js</p>
            <p>8月19日〜9月19日: リテラル本社実習</p>
            <p>9月24日〜9月27日: 実習で作成したコードを置き換えられるか検証④顧客管理システムのコードを置き換えたアプリ、Excelアンケートデータ入力(10件)</p>
            <p>9月28日〜9月30日: ProgateでjQuery</p>
            <p>10月1日〜10月7日: 外部実習のために学習（Linux環境でUbuntu、LAMP構築）</p>
            <p>10月8日〜10月10日: 3日間外部実習、Rocky Linux 9 LAMP環境構築、⑤簡易お問い合わせフォームアプリ作成</p>
            <p>10月11日〜10月16日: 実習の復習</p>
            <p>10月17日〜10月5日: 就労支援の職員が作成中の教材、Dockerデプロイ学習しながらデバッグ。⑥Laravelでデプロイに挑戦。デプロイが成功したので職員へフィードバック
            </p>
            <p>10月18日〜10月29日: ポートフォリオ完成、①～⑥デプロイの検証終了</p>
            <p>10月29日〜xx月xx日: 就職活動開始</p>
            <p>11月1日〜11月7日: ポートフォリオの更新、②SNS風アプリの見直し、Vue.jsが本番で正常に動作するよう改善</p>
            <p>11月8日〜11月20日: ポートフォリオの更新、①メルカリ風フリマアプリの見直し、デプロイ後に画像処理が動作するよう仕様を変更</p>
            <p>11月21日〜12月11日: ポートフォリオにJavaのコードを追加、ポートフォリオ更新</p>
            <div>
                <h3 class="mie">
                    「最後までご覧いただき、ありがとうございました。これまでの学習と経験を活かし、さらに技術を磨いていきたいと思っております。ご興味をお持ちいただけましたら、ぜひお気軽にご連絡ください。どうぞよろしくお願いいたします。」
                </h3>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

@section('scripts')
<script>
    const app = Vue.createApp({
        data() {
            return {
                menu: {
                    clientMaster: false,
                    clientCorporation: false,
                    client: false,
                    employeeMaster: false,
                    employee: false,
                    location: false
                },
            };
        },
        methods: {
            toggleMenu() {
                this.menuOpen = !this.menuOpen;
            },
            toggleSubMenu(menu) {
                this.menu[menu] = !this.menu[menu];
            },
            showHelpModal() {
                const modal = new bootstrap.Modal(document.getElementById('helpModal'));
                modal.show();
            },
            showHelpModal2() {
                const modal = new bootstrap.Modal(document.getElementById('helpModal2'));
                modal.show();
            },
            showHelpModal3() {
                const modal = new bootstrap.Modal(document.getElementById('helpModal3'));
                modal.show();
            },
            showHelpModal4() {
                const modal = new bootstrap.Modal(document.getElementById('helpModal4'));
                modal.show();
            },
            showHelpModal5() {
                const modal = new bootstrap.Modal(document.getElementById('helpModal5'));
                modal.show();
            },
        }
    }).mount('#app');
</script>
@endsection