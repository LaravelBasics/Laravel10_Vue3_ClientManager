@extends('layouts.app')

@section('title', 'ポートフォリオ')

@section('content')

<div class="container mt-4">
    <h1 style="width: 100%; height: auto;
            margin: 0px 0px 20px 0px; padding: 15px 0px;
            background-color: rgb(240, 240, 240);
            font-size: 3em;
            text-align: center;">【Laravel プロジェクト一覧】
    </h1>
    <div>
        <div>
            <div>
                <h3><a href="https://laravel6-flea-market.vercel.app/" target="_blank">①メルカリ風フリマアプリ</a>
                    <span style="margin-right: 50px;"></span>
                    <a href="https://github.com/LaravelBasics/Laravel6_FleaMarket/tree/main" target="_blank">①GitHub</a>
                </h3>
                <span style="background-color: #B3E5FC; color: #333333; font-weight: bold;">※全アプリ共通ログイン用: メールアドレス「test@test」 パスワード「testtest」
                    ※実在するメールアドレスを新規登録する場合は、自己責任でお願いします。
                </span>
            </div>
            <p>開発環境: Windows, Laravel 6, JavaScript, MySQL（教材の環境: MacOS, Laravel 7, Docker, JavaScript, PostgreSQL）
                <br>
                アプリ製作期間：３週間
            </p>
            <p><strong>「振り返り」</strong>
                教材の環境と異なるためエラー対応や、Laravel 6でLaravel 7の機能再現に挑戦しました。
                <br>
                クレジットカード決済（PAY.JP）、Mailtrap.ioによるメール送受信、画像の保存処理にJavaScriptを利用するなど、基礎を学びつつエラー解決に取り組みました。
            </p>

            <p><strong>「デプロイ」</strong>
                Windowsのプロジェクト①をLinuxにコピーして、Laravel 6を使ったデプロイに挑戦し、画像処理以外の機能は成功しました。GDライブラリの有無により課題が残りました。
                <br>
                出品されている物は購入出来ます。(カード決済番号は「4242, 4242, 4242, 4242」です。画像が必要になる所は保存するとserver500エラーになります)
            </p>
            <br>
        </div>
        <div>
            <h3>
                <a href="https://laravel6-sns.vercel.app/" target="_blank">②SNS風アプリ</a>
                <span style="margin-right: 50px;"></span>
                <a href="https://github.com/LaravelBasics/Laravel6_SNS" target="_blank">②GitHub</a>
            </h3>
            <p>開発環境: Windows, Laravel 6, Vue.js 3, MySQL（教材の環境: MacOS, Laravel 6, Docker, Vue.js 2, PostgreSQL）
                <br>
                アプリ製作期間：３週間
            </p>
            <p><strong>「振り返り」</strong>
                ①と同じ環境の違い、初めてのVue.jsとLaravelの環境構築に難航しました。
                <br>
                npmパッケージの依存関係エラーを解決する際、Vue.jsのバージョンが3に上がってしまい、Vue.jsは2と3で記述が異なるため更に苦戦しました。
                <br>
                教材通りの機能は実装できましたが、コンポーネントを使用したVueファイルはあまり理解できませんでした。
                <br>
                Googleのアカウントでログインできる機能も難しかったですが、無事に最後まで完成しました。
            </p>
            <p><strong>「デプロイ」</strong>
                ①同様Linux上でLaravel 6を使ったデプロイに挑戦。ローカルでは「Laravel Mix」のmix.jsを使用して動作していた部分が、デプロイ後は動作せず課題が残りました。
                <br>
                Vue.jsの機能は使えませんが記事を登録、更新、削除は可能です(ローカルで登録した物は、#タグ、フォロー機能など一部表示されています)
            </p>
            <br>
        </div>
        <div>
            <h3>
                <a href="https://laravel10-books.vercel.app/" target="_blank">③本管理アプリ</a>
                <span style="margin-right: 50px;"></span>
                <a href="https://github.com/LaravelBasics/Laravel10_Books" target="_blank">③GitHub</a>
            </h3>
            <p>開発環境: Windows, Laravel 10, React, 認証パッケージBreeze, PostgreSQL
                <br>
                アプリ製作期間：１週間
            </p>
            <p><strong>「振り返り」</strong>
                就労支援の職員が作成した基本設計書をもとに、本管理アプリの機能変更と追加を行いました。
                <br>
                Laravelシーダーのファクトリークラスでダミーデータを生成した際に、ダミーデータを英語から日本語に変更するのに苦戦しました。
                <br>
                職員に動作確認をしてもらい機能自体は完成しましたが、Reactはあまり理解できませんでした。
            </p>
            <p><strong>「デプロイ」</strong>
                Reactのjsxファイルでデプロイに挑戦しました。成功するか不安でしたが、無事に動作しました。
            </p>
            <br>
        </div>
        <div>
            <h3>
                <a href="https://laravel10-vue3-client-manager.vercel.app/languages" target="_blank">④ポートフォリオ</a>
                <span style="margin-right: 50px;"></span>
                <a href="https://github.com/LaravelBasics/Laravel10_Vue3_ClientManager" target="_blank">④GitHub</a>
            </h3>
            <div style="background-color: #B3E5FC; color: #333333; font-weight: bold;">※左上のサイドメニュー: プログラミング→学習したプログラミング→をクリックして行くと、４つの画面にアクセスできます。</div>
            <div style="background-color: #B3E5FC; color: #333333; font-weight: bold;">※空のまま検索ボタンを押すと、データベースから全件取得されます。</div>
            </p>
            <p>開発環境: Windows, Laravel 10, CDN Vuejs 3.3, Bootstrap 5.3
                <br>
                実習中のアプリ製作期間：１か月（コードを置き換えた期間：１週間）
            </p>
            <p><strong>「振り返り」</strong>
                社外秘の情報が含まれているため職員に確認を取り、実習で作成したコードを置き換えることに挑戦しました。
                <br>
                マイグレーションのテーブル名、ユニークカラムをすべて変更し、それに伴うモデル、コントローラー、リクエストクラス、ブレードなどを修正しました。
                動作するか不安でしたが無事に完成しました。
            </p>
            <p><strong>「デプロイ」</strong>
                CDNを使用していたため、Vue.jsやBootstrapの動作も問題なくスムーズにデプロイできました。</p>
            <br>
        </div>
        <div>
            <h3>
                <a href="https://laravel11-contact-form.vercel.app/" target="_blank">⑤簡易お問い合わせフォーム</a>
                <span style="margin-right: 50px;"></span>
                <a href="https://github.com/LaravelBasics/Laravel11_ContactForm/tree/master" target="_blank">⑤GitHub</a>
            </h3>
            <p>開発環境: バーチャルボックス, LAMP(RockyLinux9.4, apache 2.4, MySQL 8.0, PHP8.2), Laravel 11
                <br>
                アプリ製作期間：３～４時間（環境構築を除いた時間）
            </p>
            <p><strong>「振り返り」</strong>
                外部実習で制作したアプリ。フロントエンドは最低限の機能で実装しました。テスト用にメールトラップで受信を確認しました。
                <br>
                Laravel 11は初めて触ったので、メール、管理者、送信者など難しかったです。
            </p>
            <p><strong>「デプロイ」</strong>
                デプロイ後も動作するのか気になったため挑戦し、無事にメールトラップで受信できました。</p>
            <br>
        </div>
        <div>
            <h3>
                <a href="https://laravel10-breeze-demo.vercel.app/" target="_blank">⑥Breezeを使ったログイン機能のデプロイに挑戦したアプリ</a>
                <span style="margin-right: 50px;"></span>
                <a href="https://github.com/LaravelBasics/Laravel10_Breeze_Demo/tree/aaa" target="_blank">⑥GitHub</a>
            </h3>
            <p>開発環境: Windows, Laravel 10, 認証パッケージBreeze, PostgreSQL</p>
            デプロイまでの期間２日
            <p><strong>「振り返り」（2024年10月現在）</strong>
                Laravelでデプロイに挑戦。
                就労支援の職員が作成した教材をもとに、Docker（WSL）とVercel(gihub連携)を学習しました。
                <br>
                Vercelでの環境変数やデータベース接続（特にvercel.jsonや.envファイルの記述）には、ネット上に十分な情報がなく試行錯誤を要しました。
                <br>
                最終的に、成功した設定をもとに必要な項目を逆算して整理、職員の方もデプロイ成功に至ったことが何よりの成果で、大きな達成感を感じました。
            </p>

            <p><strong>「デプロイ」</strong>
                ローカルでのPostgreSQLインストールの必要性や接続方法の設定など、チャットGPTを活用しつつ、100回以上デプロイを試行してようやく成功に至りました。
                <br>
                Dockerはコンテナで使用するDockerfileの作成に難航し、実習で経験したRockyLinuxを使って試行した結果、Linuxでは無事に成功しました。
            </p>
            <br>
        </div>
    </div>
    <div>
        <h1>【プロフィール】</h1>
        <div>
            <h3>①自己紹介</h3>
            <p>私はゲームや漫画、アニメが好きで、テクノロジーに関心を持ちながら成長しているプログラミング初心者です。
                <br>
                PC関連の職に就くことを目指し、プログラミングの学習を始めました。趣味を通じて得た創造力を、開発の現場で活かしたいと考えています。
            </p>
        </div>
        <div>
            <h3>②学習やキャリアの動機</h3>
            <p>PC関係の職につきたいという思いから、プログラミングに興味を持ち、独学や実習を通じてスキルを身につけています。
                <br>
                特に、フロントエンド（Vue.js、React）とバックエンド（PHP、Java）の両方に興味があり、幅広い技術を学ぶことで自分の可能性を広げたいと思っています。
            </p>
        </div>
        <div>
            <h3>③現在学習中の言語や環境</h3>
            <p><strong>プログラミング言語:</strong> PHP, HTML5, CSS3, JavaScript
                <br>
                <strong>フレームワーク: </strong>Laravel, Vue.js 3.3, Bootstrap 5.3
                <br>
                <strong>データベース:</strong> MySQL, PostgreSQL
                <br>
                <strong>開発環境:</strong> ローカル: XAMPP, Rocky Linux 9.4, Docker(少し経験)
                <br>
                <strong>デプロイ:</strong> GitHub, Vercel
            </p>
        </div>
        <div>
            <h3>④実習経験</h3>
            <p><strong>本社実習（株式会社リテラル）:</strong> 8/19～9/19の1か月間、10～16時（休憩1時間）
                <br>
                過去の案件顧客管理システムの一部を基本設計書、詳細設計書を元に作成（マイグレーション、シーダー、モデルは事前に用意された物を使用）
                <br>
                環境構築: ローカル環境、XAMPP（Laravel 10, PHP 8.2）、GitHubを使用しBacklogにプッシュ。
                <br>
                使用言語: Laravel 10, CDN, Vue.js 3.3, Bootstrap 5.3, MySQL
                <br>
                コミュニケーションツール: 実習中にSlackを使用し、チームメンバーとのコミュニケーションを円滑に行いました。
                <br>
                成果: CSSを除いて、4画面大体完成。ログイン機能は無し。実習の評価は優秀でしたが、CSS（相対位置、絶対位置の違い）、データベース、コードの可読性などが勉強不足と感じました。
            </p>

            <p><strong>外部実習:</strong> 3日間、13～17時。バーチャルボックスを使用してローカルにLAMP環境を構築し、Laravel 11をインストール。
                <br>
                課題2として⑤簡易問い合わせフォームを作成（テスト用にメールトラップで受信を確認しました）。
                <br>
                成果: 初めてLinuxを学習し、課題は達成したものの、即戦力を求めていたため全体的に難しかったです。
            </p>
        </div>
        <div>
            <h3>⑤デプロイ経験</h3>
            <p>Windows、Linux共に、GitHubにプッシュ、Vercelにデプロイ、VercelDBとの接続にも成功。
                <br>
                WindowsはXAMPP, Laravel 10, 11, PHP 8.2, PostgreSQL
                <br>
                バーチャルボックス、Rocky Linux 9.4, Laravel 6, PHP 7.4, PostgreSQL
            </p>
        </div>
        <div>
            <h3>⑥将来の目標</h3>
            <p>将来の目標はまだ明確には決まっていませんが、フロントエンドとバックエンドの両方に興味を持ち、各技術を磨きながら、プロジェクトに活かしていきたいと考えています。</p>
        </div>

        <div>
            <h1>【プログラミング学習履歴】</h1>
            <h6>2023年10月: プログラミングを0から学習開始</h6>
            <p>10月〜1月19日: 教材ProgateのJava、就労支援カリキュラムのJava基礎、アルゴリズム、2次元配列、例外処理、ファイル入出力など（約4ヶ月）</p>

            <h6>2024年1月</h6>
            <p>1月22日〜2月13日: エクリプス上で動くブラック・ジャックを作成（約3週間）</p>
            <p>2月15日〜3月14日: 教材Be EngineerのPHP基礎, アルゴリズム問題, 基礎15問, 応用15問</p>
            <p>3月15日〜3月16日: Be EngineerのHTML/CSS/JavaScript</p>
            <p>3月19日〜3月22日: ProgateのJavaScript</p>
            <p>3月25日〜3月27日: SQL</p>
            <p>3月29日〜4月1日: ProgateのPython</p>
            <p>4月1日〜4月30日: Microsoft Officeを学習</p>
            <p>4月25日〜5月17日: 教材PDO</p>
            <p>5月20日〜6月24日: 教材Laravel 6基礎</p>
            <p>6月25日〜7月4日: 教材Techpit①メルカリ風フリマアプリ制作、Excelアンケートデータ入力(一日目10件、二日目20件)</p>
            <p>7月8日〜7月24日: Techpit②SNS風アプリ制作、PC4台キッティング作業</p>

            <h6>2024年7月</h6>
            <p>7月26日〜7月31日: 職員が作成した基本設計書をもとに（Laravel 10, React）③本管理アプリの機能変更、追加。ProgateでReact学習</p>
            <p>7月31日〜8月5日: ProgateのJavaScript、Git、HTML&CSS</p>
            <p>8月6日〜8月7日: JavaScriptによるDOM操作</p>
            <p>8月8日〜8月16日: Vue.js</p>
            <p>8月19日〜9月19日: リテラル本社実習</p>
            <p>9月24日〜9月27日: 実習で作成したコードを置き換えられるか検証④ポートフォリオ、Excelアンケートデータ入力(10件)</p>
            <p>9月28日〜9月30日: ProgateでjQuery</p>
            <p>10月1日〜10月7日: 外部実習のために学習（Linux環境でUbuntu、LAMP構築）</p>
            <p>10月8日〜10月10日: 3日間外部実習、Rocky Linux 9 LAMP環境構築、⑤簡易お問い合わせフォーム作成</p>
            <p>10月11日〜10月16日: 実習の復習</p>
            <p>10月17日〜10月5日: 就労支援の職員が作成中の教材、Dockerデプロイ学習しながらデバッグ。⑥Laravelでデプロイに挑戦。デプロイが成功したので職員へフィードバック</p>
            <p>10月18日〜10月29日: ポートフォリオ完成、①～⑥デプロイの検証終了</p>
            <p>10月29日〜xx月xx日: 就職活動開始</p>
        </div>
        <div>
            <h3>「最後までご覧いただき、ありがとうございました。これまでの学習と経験を活かし、さらに技術を磨いていきたいと思っております。ご興味をお持ちいただけましたら、ぜひお気軽にご連絡ください。どうぞよろしくお願いいたします。」</h3>
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
            showHelpModal() {
                const modal = new bootstrap.Modal(document.getElementById('helpModal'));
                modal.show();
            },
            toggleSubMenu(menu) {
                this.menu[menu] = !this.menu[menu];
            },
        }
    }).mount('#app');
</script>
@endsection