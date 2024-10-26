@extends('layouts.app')

@section('title', 'ポートフォリオ')

@section('content')

<div class="container mt-4">
    <h1 style="width: 100%; height: auto;
            margin: 0px 0px 20px 0px; padding: 15px 0px;
            background-color: rgb(240, 240, 240);
            font-size: 2em;
            text-align: center;">ポートフォリオ
    </h1>
    <div>
        <ul>
        <br>
            <li>
                【プロジェクト一覧】<br>
                <strong>①プロジェクト名</strong> 「Laravel 6 Flea Market」<br>
                概要: メルカリ風フリマアプリ、教材名Techpit、教材の環境MacOS, Laravel7, Docker, js、作成した環境windows, Laravel6, js<br>
                デプロイ先のURL: <br>
                GitHubのリポジトリ: <br>
                <strong>振り返り</strong><br>
                教材の環境と異なるためのエラー対応や、Laravel 6でLaravel 7の機能を再現する方法を学びました。<br>
                クレジットカード決済（PAY.JP）、Mailtrap.ioによるメール送受信、画像の保存処理にJavaScriptを利用するなど、基礎を学びつつエラー解決に取り組みました。
                <br><br>
                <strong>②プロジェクト名</strong> 「Laravel 6 SNS」<br>
                概要: プロジェクトの目的や機能を簡潔に説明します。<br>
                リンク: デプロイ先のURLやGitHubのリポジトリへのリンクを記載します。<br>
                学び: プロジェクトを通じて得たことや苦労した点を振り返ります。
                <br><br>
                <strong>③プロジェクト名</strong> 「Laravel 10 Vue 3 Client Manager」<br>
                概要: プロジェクトの目的や機能を簡潔に説明します。<br>
                リンク: デプロイ先のURLやGitHubのリポジトリへのリンクを記載します。<br>
                学び: プロジェクトを通じて得たことや苦労した点を振り返ります。
                <br><br>
                <strong>④プロジェクト名</strong> 「Laravel 11 Contact Form」<br>
                概要: プロジェクトの目的や機能を簡潔に説明します。<br>
                リンク: デプロイ先のURLやGitHubのリポジトリへのリンクを記載します。<br>
                学び: プロジェクトを通じて得たことや苦労した点を振り返ります。
                <br><br>
                <strong>⑤プロジェクト名</strong> 「Laravel 10 Breeze Demo」<br>
                概要: Docker学習の一環として、就労支援の職員が作成した教材をもとに、Docker（WSL）とVercelを使用したLaravelアプリのデプロイに挑戦しました。<br>
                デプロイ先のURL: <br>
                GitHubのリポジトリ: <br>
                <strong>振り返り（2024年10月現在）</strong><br>
                Vercelでの環境変数設定やデータベース接続の設定（特にvercel.jsonや.envファイルの記述）には、ネット上に十分な情報がなく、試行錯誤を要しました。<br>
                特に、ローカルでのPostgreSQLインストールの必要性や接続方法の設定など、チャットGPTを活用しつつ、100回以上デプロイを試行して、ようやく成功に至りました。。<br>
                Dockerはコンテナで使用するDockerfileの作成に難航し、実習で経験したRockyLinuxを使って試行した結果、Linuxでは無事に成功しました。<br>
                最終的に、成功した設定をもとに必要な項目を逆算して整理し、職員の方もデプロイ成功に至ったことが何よりの成果で、大きな達成感を感じました。
            </li>
            <br>
            <li>
                【プロフィール】<br>
                <strong>①自己紹介</strong><br> 私はゲームや漫画、アニメが好きで、テクノロジーに関心を持ちながら成長しているプログラミング初心者です。<br>PC関連の職に就くことを目指し、プログラミングの学習を始めました。趣味を通じて得た創造力を、開発の現場で活かしたいと考えています。<br><br>

                <strong>②学習やキャリアの動機</strong><br> PC関係の職につきたいという思いから、プログラミングに興味を持ち、独学や実習を通じてスキルを身につけています。<br>特に、フロントエンド（Vue.js、React）とバックエンド（PHP、Java）の両方に興味があり、幅広い技術を学ぶことで自分の可能性を広げたいと思っています。<br><br>

                <strong>③現在学習中の言語や環境</strong><br>
                <strong>プログラミング言語:</strong> PHP, HTML5, CSS3, JavaScript<br>
                <strong>フレームワーク: </strong>Laravel, Vue.js 3.3, Bootstrap 5.3<br>
                <strong>データベース:</strong> MySQL, PostgreSQL<br>
                <strong>開発環境:</strong> ローカル: XAMPP, Rocky Linux 9.4, Docker(少し経験)<br>
                <strong>デプロイ:</strong> GitHub, Vercel<br><br>

                <strong>④実習経験</strong><br>
                <strong>本社実習:</strong> 8/19～9/19の1か月間、10～16時（休憩1時間）<br>過去の案件顧客管理システムの一部を基本設計書、詳細設計書を元に作成（マイグレーション、シーダー、モデルは事前に用意された物を使用）<br>
                環境構築: ローカル環境、XAMPP（Laravel 10, PHP 8.2）、GitHubを使用しBacklogにプッシュ。<br>
                使用言語: Laravel 10, CDN, Vue.js 3.3, Bootstrap 5.3, MySQL<br>
                コミュニケーションツール: 実習中にSlackを使用し、チームメンバーとのコミュニケーションを円滑に行いました。<br>
                成果: CSSを除いて、4画面大体完成。ログイン機能は無し。実習の評価は優秀でしたが、CSS（相対位置、絶対位置の違い）、データベース、コードの可読性などが勉強不足と感じました。<br><br>

                <strong>外部実習:</strong> 3日間、13～17時。バーチャルボックスを使用してローカルにLAMP環境を構築し、Laravel 11をインストール。<br>課題2として簡易問い合わせフォームを作成（テスト用にメールトラップで受信を確認）。<br>
                成果: 初めてLinuxを学習し、課題は達成したものの、即戦力を求めていたため全体的に難しかったです。<br><br>

                <strong>⑤デプロイ経験</strong><br>
                Windows、Linux共に、GitHubにプッシュ、Vercelにデプロイ、VercelDBとの接続にも成功。<br>
                WindowsはXAMPP, Laravel 10, 11, PostgreSQL<br>
                バーチャルボックス、Rocky Linux 9.4, Laravel 6, PHP 7.4, PostgreSQL<br><br>

                <strong>⑥将来の目標</strong> <br>将来の目標はまだ明確には決まっていませんが、フロントエンドとバックエンドの両方に興味があり、それぞれのスキルを磨きながらプロフェッショナルとして成長していきたいと思っています。
            </li>
            <br>
            <li>
                【プログラミング学習履歴】<br>
                2023年10月: プログラミングを0から学習開始<br>
                10月〜1月19日: ProgateのJavaから開始、就労支援カリキュラムのJava基礎学習、アルゴリズム、2次元配列、例外処理、ファイル入出力など（約4ヶ月）<br>
                <br>
                2024年1月<br>
                1月22日〜2月13日: エクリプス上で動くブラック・ジャックを作成（約3週間）<br>
                2月15日〜3月14日: 教材Be EngineerのPHP学習<br>
                3月15日〜3月16日: Be EngineerのHTML/CSS/JavaScript学習<br>
                3月19日〜3月22日: ProgateのJavaScript学習<br>
                3月25日〜3月27日: SQL学習<br>
                3月29日〜4月1日: ProgateのPython学習<br>
                4月1日〜4月30日: Microsoft Office学習<br>
                4月25日〜5月17日: PDO学習<br>
                <br>
                2024年5月<br>
                5月20日〜6月24日: Laravel 6基礎学習<br>
                6月25日〜7月4日: 教材Techpitのメルカリ風フリマアプリ制作<br>
                7月8日〜7月24日: TechpitのSNS風アプリ制作<br>
                <br>
                2024年7月<br>
                7月26日: 職員が作成した基本設計書をもとに（Laravel 10, React）本管理アプリの機能変更、追加。ProgateでReact学習<br>
                7月31日: ProgateのJavaScript、Git、HTML&CSS学習<br>
                8月6日: JavaScriptによるDOM操作学習（8月7日まで）<br>
                8月8日〜8月16日: Vue.js学習（8月19日まで）<br>
                8月19日〜9月19日: 本社実習<br>
                9月24日〜27日: 実習で作成したコードを置き換えられるか検証。一からプロジェクトを作成しマイグレーション、モデル、シーダーなどの置き換え、個人情報削除<br>
                9月28日: ProgateでjQuery学習（9月30日まで）<br>
                <br>
                2024年10月<br>
                10月1日〜7日: 外部実習のために学習（Linux環境でUbuntu、LAMP構築）<br>
                10月8日〜10日: Rocky Linux 9 LAMP環境構築、簡易お問い合わせフォーム作成<br>
                10月11日〜16日: 実習の復習<br>
                10月17日〜25日: 就労支援の職員が作成中の教材にあるDockerデプロイを学習しながらお手伝い（レイアウトや動作確認）。自身のデプロイが成功したので職員にフィードバック<br>
                10月18日: ポートフォリオ作成中、デプロイの検証。
            </li>
            <br>
            <li>
                【その他のスキル・経験】<br>
                
            </li>
        </ul>
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