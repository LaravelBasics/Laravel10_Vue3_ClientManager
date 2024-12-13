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

    .mie2 {
        background-color: #BCF4BC;
    }

    .yellow {
        background-color: #FFFFCC;
    }

    .white {
        background-color: white;
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
        padding: 0.7rem 3rem 0.7rem 0rem;
        /* 15px -> 0.9375rem */
        font-size: 2.5rem;
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
        border: 0.2rem solid rgb(223, 222, 222);
        /* 枠線の太さを0.25remに変更 */
        border-radius: 0.75rem;
        /* 角を丸くする */
        /* padding: 0.2rem; */
        padding: 0.85rem 1.25rem;
        /* 内容と枠線の間隔を確保 */
        /* background-color: white; */
        /* background-color: #FFFFCC; */
        /* background-color: rgb(240, 240, 240); */
        background-color: rgb(248, 248, 248);
        /* background-color: rgb(250, 250, 250); */
        /* 背景色（必要なら設定） */
    }

    /* 背景アイボリー */
    .ivory-bg {
        background-color: #FFFFF0;
    }

    /* @media (max-width: 48rem) { */
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

    /* } */

    .double-line {
        line-height: 2;
        /* 2倍の行間を設定 */
    }

    .double-space0 {
        margin-top: 0.5rem;
        /* 2行分の余白を追加 (1行 = 1em) */
    }

    .double-space {
        margin-top: 1rem;
        /* 2行分の余白を追加 (1行 = 1em) */
    }

    .double-space2 {
        margin-top: 2rem;
        /* 2行分の余白を追加 (1行 = 1em) */
    }

    .d-s {
        margin-top: 3.5rem;
        /* 2行分の余白を追加 (1行 = 1em) */
    }

    .d-s2 {
        margin-top: 7.5rem;
        /* 2行分の余白を追加 (1行 = 1em) */
    }

    .m-t {
        display: inline-block;
        margin-top: 0.25rem;
        /* 2行分の余白を追加 (1行 = 1em) */
    }

    .m-t2 {
        display: inline-block;
        margin-top: 1.5rem;
        /* 2行分の余白を追加 (1行 = 1em) */
    }

    .p-l {
        padding-left: 1.62rem;
        /* 2行目以降の左余白を1emだけ追加 */
    }

    .p-l2 {
        margin-left: -0.25rem;
        /* 2行目以降の左余白を1emだけ追加 */
    }

    .p-l3 {
        margin-left: -0.4rem;
        /* 2行目以降の左余白を1emだけ追加 */
    }

    .t-p {
        padding-bottom: 0.5rem;
        /* 内側の余白をゼロにする */
    }

    .rounded-box {
        border: 0.2rem solid rgb(222, 222, 222);
        /* 枠線の太さを0.25remに変更 */
        border-radius: 0.75rem;
        /* 角を丸くする */
        padding: 1rem;
        /* 内容と枠線の間隔を確保 */
        background-color: #f9f9f9;
        /* 背景色（必要なら設定） */
    }

    .rounded-box2 {
        /* border: 0.2rem solid #BCF4BC; */
        border: 0.2rem solid rgb(222, 222, 222);
        /* 枠線の太さを0.25remに変更 */
        border-radius: 0.75rem;
        /* 角を丸くする */
        padding: 0.85rem 1.25rem;
        /* 内容と枠線の間隔を確保 */
        /* background-color: #f9f9f9; */
        /* 背景色（必要なら設定） */
    }

    .rounded-box0 {
        border: 0.2rem solid #BCF4BC;
        /* 枠線の太さを0.25remに変更 */
        border-radius: 0.75rem;
        /* 角を丸くする */
        padding: 0rem;
        /* 内容と枠線の間隔を確保 */
        background-color: white;
        /* background-color: #f9f9f9; */
        /* 背景色（必要なら設定） */
    }

    .r-b0 {
        border: 0.2rem solid #BCF4BC;
        /* 枠線の太さを0.25remに変更 */
        border-radius: 0.75rem;
        /* 角を丸くする */
        padding: 2rem 0rem 1.25rem 0rem;
        /* 内容と枠線の間隔を確保 */
        /* background-color: white; */
        background-color: #FFFFCC;
        /* 背景色（必要なら設定） */
    }

    .r-btitle {
        border: 0.2rem solid rgb(222, 222, 222);
        /* 枠線の太さを0.25remに変更 */
        border-radius: 0.75rem;
        /* 角を丸くする */
        padding: 0.2rem;
        /* 内容と枠線の間隔を確保 */
        /* background-color: white; */
        /* background-color: #FFFFCC; */
        background-color: rgb(250, 250, 250);
        /* 背景色（必要なら設定） */
    }

    /* 色合い反転 */
    .r-b00 {
        border: 0.2rem solid rgb(228, 228, 228);
        /* 枠線の太さを0.25remに変更 */
        border-radius: 0.75rem;
        /* 角を丸くする */
        padding: 0.85rem 1.25rem;
        /* padding: 1rem; */
        /* 内容と枠線の間隔を確保 */
        background-color: white;
        /* background-color: #FFFFCC; */
        /* 背景色（必要なら設定） */
    }
</style>
@endsection
@section('content')

<div class="container mt-4">
    <h1 class="green-bg" id="section3">【プロフィール】</h1>
    <div class="rounded-box2">
        <div>
            <h4><i class="fa-solid fa-user-circle" style="color: #3498db"></i> 自己紹介</h4>
            <p class="gray-bg">私はゲーム（PSO2、ラチェット＆クランク、モンスターハンター、遊戯王）、アニメ、漫画が好きで、<br>
                テクノロジーに関心を持ちながら、プログラミングに挑戦し続けている成長中のエンジニアです。
                <br>
                PC関連の職に就くことを目指し、プログラミングの学習を始めました。趣味を通じて得た創造力を、開発の現場で活かしたいと考えています。
            </p>
        </div>
        <div>
            <h4><i class="fa-solid fa-lightbulb" style="color: #f1c40f;"></i> 学習やキャリアの動機</h4>
            <p class="gray-bg">PC関係の職につきたいという思いから、プログラミングに興味を持ち、就労支援での学習や実習を通じてスキルを身につけています。
                <br>
                特に、フロントエンド（Vue.js、Reactなど）とバックエンド（PHP、Java）の両方に興味があり、
                <br>
                幅広い技術を学ぶことで自分の可能性を広げたいと思っています。
            </p>
        </div>
        <div>
            <h4><i class="fa-solid fa-pencil" style="color: #e67e22;"></i> 現在学習中の言語や環境</h4>
            <p class="gray-bg"><strong>プログラミング言語:</strong> PHP, HTML5, CSS3, JavaScript
                <br>
                <strong>フレームワーク:</strong> Laravel, Vue.js 3.4, Bootstrap 5.3
                <br>
                <strong>データベース:</strong> MySQL, PostgreSQL
                <br>
                <strong>開発環境:</strong> ローカル: XAMPP, Rocky Linux 9.4, Docker(少し経験)
                <br>
                <strong>デプロイ:</strong> GitHub, Vercel
            </p>
        </div>
        <div>
            <h4><i class="fa-brands fa-github"></i> デプロイ経験</h4>
            <p class="gray-bg">アプリをインターネット上に公開するため、<br>
                Windows、Linux共に、GitHubにプッシュ、Vercelにデプロイ、VercelDBとの接続にも成功。
                <br>
                WindowsはXAMPP, Laravel 10, 11, PHP 8.2, PostgreSQL
                <br>
                バーチャルボックス、Rocky Linux 9.4, Laravel 6, PHP 7.4, PostgreSQL
            </p>
        </div>
        <div>
            <h4><i class="fa-solid fa-bullseye" style="color: #e74c3c;"></i> 将来の目標</h4>
            <p class="gray-bg">将来の目標はまだ明確に決まっていませんが、フロントエンドとバックエンド両方の技術を磨きながら、プロジェクトに活かしていきたいと考えています。</p>
        </div>
    </div>
    <div class="double-space"></div>

    <div>
        <h1 class="green-bg" id="section5">【実習履歴】</h1>
        <div class="rounded-box2">
            <h4><strong><i class="fa-solid fa-gear" style="color: #2ecc71;"></i> 本社実習（株式会社リテラル）</strong>
                &ensp;8/19～9/19（1か月間）&ensp;&ensp;10～16時（休憩1時間）</h4>
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
        </div>
        <div class="double-space"></div>

        <div class="rounded-box2">
            <h4><strong><i class="fa-solid fa-cogs" style="color: #2ecc71;"></i> 外部実習</strong>&ensp;&ensp;
                &ensp;10/8~10/10（3日間）&ensp;&ensp;13～17時（小休憩自由）
            </h4>
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
    <div class="double-space"></div>

    <h1 class="green-bg" id="section2">
        【Java課題制作】
    </h1>

    <!-- <div> -->
    <div class="rounded-box2">
        <!-- h4に必要なら縦、の行間を追加。class="double-space2" -->
        <h4 id="section12"><i class="fa-solid fa-sitemap" style="color: #9b59b6; position: relative; top: 0.3rem;"></i> <button
                type="button" class="btn btn-link" @click="showHelpModal"
                style="font-size: 1.5rem; position: relative; right: 0.75rem;">FizzBuzz
            </button>
        </h4>

        <strong style="font-size: 1.2rem;"><i class="fa-solid fa-undo-alt" style="color: #ffce47;"></i> 振り返り</strong><br>
        <p class="gray-bg">制作期間:1日<br>
            コード完成後（コメントアウトしている箇所）、職員からフィードバックを受けて、条件式の部分をメソッド化しました。</p>
        <p class="gray-bg">開発環境:eclipse</p>
    </div>

    <div class="double-space"></div>

    <div class="rounded-box2">
        <h4 id="section13"><i class="fa-solid fa-layer-group" style="color: #3498db; position: relative; top: 0.3rem;"></i> <button
                type="button" class="btn btn-link" @click="showHelpModal4"
                style="font-size: 1.5rem; position: relative; right: 0.75rem;">青森鹿児島問題（二次元配列）
            </button>
        </h4>
        <strong style="font-size: 1.2rem;"><i class="fa-solid fa-undo-alt" style="color: #ffce47;"></i> 振り返り</strong><br>
        <p class="gray-bg">
            制作期間:約2週間<br>
            問題を【1】から順番に解いたため、コードは問題【4】、研究問題【1】のみです。（テスト用など、不要なコードもあります）<br>
            また、研究問題【1】のコードは実行時間3秒（ひとつのメソッドにまとめ、呼ぶ回数を減らすと、2秒でした）<br>
            研究問題【2】 5 * 5に減らすなどして、コード自体は完成したものの、<br>
            100 * 100だと、数分待っても処理が終わらないため、実行時間も含めると20 * 20までが限界でした。<br>
            コードの書き方次第で処理速度が大きく変わるなど、色々と勉強になりました。
        </p>
        <p class="gray-bg">開発環境:eclipse</p>
    </div>

    <div class="double-space"></div>

    <div class="rounded-box2">
        <h4 id="section14"><span style="position: relative; top: 0.25rem;">&#127137; </span>
            <button type="button" class="btn btn-link" @click="showHelpModal5"
                style="font-size: 1.5rem; position: relative; right: 0.5rem;">ブラックジャック
            </button>
        </h4>
        <!-- <div class="double-space"></div> -->


        <strong style="font-size: 1.2rem;"><i class="fa-solid fa-undo-alt" style="color: #ffce47;"></i> 振り返り</strong><br>
        <p class="gray-bg">
            制作期間:3週間<br>
            仕様や処理の順番（一人用にするか、対戦できるようにするか、カードを引く順番など）を決めて、<br>
            処理の仕方が分からない部分は職員に質問し、何度もデバッグしながら挑戦しました。<br>
            特に、エース【1】の扱い、勝敗判定の条件式に苦戦しながら、無事に完成しました。
        </p>
        <p class="gray-bg">
            開発環境: eclipse
        </p>
    </div>
    <div class="double-space"></div>

    <h1 class="green-bg" id="section1" style="margin-bottom: 0;">
        【PHP課題制作】
    </h1>
    <div class="double-space0"></div>
    <div>
        <div class="double-space2"></div>

        <h5><i class="fa-solid fa-sync-alt" style="color: #ffce47;"></i>
            <strong> サーバーレス環境で稼働中のPHPアプリ（Vercel + Laravel + PostgreSQL）</strong><br>
            <span class="p-l"></span>
            <span class="m-t">インターネット上に公開中です。URLがあれば、誰でもアクセス可能です。</span><br>
            <span style="font-weight: bold; font-size: 1rem;">
                ※Vercelの無料プランではリソース制限により、特に画像処理で504エラーが発生する場合があります。エラー時は少し時間を置いて再試行してください。
            </span>
        </h5>
        <div class="double-space2"></div>

    </div>
    <div>
        <div class="rounded-box2">
            <div>
                <!-- <div style="padding: 0.5rem 0;"></div> -->
                <h3 id="section6">
                    <span style="margin-right: 5rem;">
                        <span>
                            <i class="fa-solid fa-shopping-cart" style="color: #2ecc71;"></i>
                            メルカリ風フリマアプリ
                        </span>
                    </span>
                </h3>
            </div>
            <div class="double-space"></div>
            <!-- アプリのチュートリアルアイコン -->
            <strong style="font-size: 1.2rem;">
                <i class="fa-solid fa-chalkboard-teacher" style="color: #ffce47;"></i>
                アプリの説明
            </strong>
            <span style="margin-right: 5rem;"></span>
            <a href="https://laravel6-flea-market.vercel.app/" target="_blank" style="font-size: 1.5rem;">
                <i class="fa-solid fa-desktop"></i> アプリの画面</a>
            <span style="margin-right: 5rem;"></span>
            <a href="https://github.com/LaravelBasics/Laravel6_FleaMarket/tree/main" target="_blank" style="font-size: 1.5rem;">
                <i class="fa-brands fa-github"></i> GitHub</a>
            <!-- <div class="gray-bg"> -->
            <p class="gray-bg">
                商品の出品・購入を想定した設計です。出品中の物は検索が可能です。購入済みの商品はSOLDと表示されます。<br>
                画面右上のログインボタンから、メールアドレス・パスワードを入力してログインできます。<br>
                ログイン状態で画面右上の▼付近をクリックすると、ユーザーメニューが表示されます。<br>
                プロフィールから名前や画像を編集出来ます。<br>
                また、画面左上の Melpitアイコン をクリックするとトップページに移動できます。<br>
                本来の画像処理は、クリックするとエクスプローラーが開いてPCから画像を選択できます。（詳細は「デプロイ」に記述）
            </p>
            <!-- </div> -->
            <div class="double-space"></div>

            <!-- 反省・評価アイコン -->
            <strong style="font-size: 1.2rem;"><i class="fa-solid fa-undo-alt" style="color: #ffce47;"></i>
                振り返り
            </strong>
            <!-- <div class="gray-bg"> -->
            <!-- <p style="margin-bottom: 0;"> -->
            <p class="gray-bg">
                アプリ制作期間:３週間
                <br>
                教材の環境と異なるためエラー対応や、Laravel 6でLaravel 7の機能再現に挑戦しました。
                <br>
                クレジットカード決済（PAY.JP）、Mailtrap.ioによるメール送受信、<br>
                画像の保存処理にJavaScriptを利用するなど、基礎を学びつつエラー解決に取り組みました。
            </p>
            <!-- </div> -->
            <div class="double-space"></div>

            <strong style="font-size: 1.2rem;">
                <i class="fa-solid fa-cloud-upload-alt" style="color: #ffce47;"></i>
                デプロイ
            </strong>
            <!-- <div class="gray-bg">
                    <p style="margin-bottom: 0;"> -->
            <p class="gray-bg">
                アプリをインターネット上に公開するため、<br>
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
            <!-- </div> -->
            <div class="double-space"></div>

            <p class="gray-bg">
                開発環境: Windows, Laravel 6, JavaScript, MySQL（教材の環境: Windows, Laravel 7, Docker,
                JavaScript, MySQL）
            </p>
        </div>

        <div class="double-space"></div>

        <div class="rounded-box2">
            <h3 id="section7">
                <strong style="margin-right: 5rem;">
                    <i class="fa-solid fa-comment-dots" style="color: #2ecc71;"></i> SNS風アプリ
                </strong>
                <br>
            </h3>
            <div class="double-space"></div>


            <strong style="font-size: 1.2rem;"><i class="fa-solid fa-chalkboard-teacher" style="color: #ffce47;"></i> アプリの説明</strong>
            <span style="margin-right: 5rem;"></span>
            <a href="https://laravel6-sns.vercel.app/" target="_blank" style="font-size: 1.5rem;">
                <i class="fa-solid fa-desktop"></i>
                アプリの画面</a>
            <span style="margin-right: 5rem;"></span>
            <a href="https://github.com/LaravelBasics/Laravel6_SNS" target="_blank"
                style="font-size: 1.5rem;"><i class="fa-brands fa-github"></i> GitHub</a>
            <br>
            <!-- <div class="gray-bg"> -->
            <p class="gray-bg">
                メールアドレス、パスワードを入力してログインすると、記事の投稿やユーザーのフォローなどができます。<br>
                ログイン後、ハートを押すと「いいね」が付きます（赤の状態でクリックすると逆になります。※反映までタイムラグ５～６秒）<br>
                ＃タグをクリックすると、クリックしたタグを検索。ユーザー名付近をクリックすると、<br>
                クリックしたユーザーのページへ移動、フォローや記事をみれます。（フォロー中の場合、フォローが外れます）<br>
                ※ログインしていない場合一部の機能は、ポップアップで説明が出ます。<br>
                画面左上の「Memo」をクリックすると、トップページに移動します。画面右上の投稿するから記事を新規投稿、トップページの︙マークを押すと記事を編集できます。
            </p>
            <!-- </div> -->

            <div class="double-space"></div>

            <strong style="font-size: 1.2rem;">
                <i class="fa-solid fa-undo-alt" style="color: #ffce47;"></i> 振り返り</strong><br>
            <!-- <div class="gray-bg"> -->
            <p class="gray-bg">
                アプリ制作期間:３週間<br>
                初めてのVue.jsとLaravelの環境構築に苦戦し、
                <br>
                特にnpm依存関係のエラーでVue.jsが2から3へ自動的にバージョンアップされたため記述の違いにさらに時間がかかりました。
                <br>
                教材通りの機能は実装できたものの、Vueコンポーネントの理解が不十分でした。
                <br>
                また、Googleアカウントでのログイン機能の実装も困難でしたが、無事に実現しました。
            </p>
            <!-- </div> -->

            <div class="double-space"></div>

            <strong style="font-size: 1.2rem;">
                <i class="fa-solid fa-cloud-upload-alt" style="color: #ffce47;"></i> デプロイ</strong><br>
            <!-- <div class="gray-bg"> -->
            <p class="gray-bg">
                アプリをインターネット上に公開するため、<br>
                Linux上でLaravel 6を用いたデプロイに挑戦した際、Laravel Mixのmix.jsを使ったVue.js機能が本番環境で動作しないという課題に直面しました。
                <br>
                これに対して、npm run productionでビルドを行い、vercel.jsonの設定を見直した後、npx vercel
                --forceで再デプロイすることでVue.jsが本番で正常に動作するよう改善しました。
            </p>
            <!-- </div> -->

            <div class="double-space"></div>

            <!-- <div class="gray-bg"> -->
            <p class="gray-bg">開発環境: Windows, Laravel 6, Vue.js 3, MySQL
                （教材の環境: MacOS, Laravel 6, Docker, Vue.js 2, PostgreSQL）
            </p>
            <!-- </div> -->
        </div>

        <div class="double-space"></div>

        <div class="rounded-box2">
            <h3 id="section8">
                <strong style="margin-right: 5rem;"><i class="fa-solid fa-book-open" style="color: #2ecc71;"></i>
                    本管理アプリ</strong>
            </h3>

            <strong style="font-size: 1.2rem;">
                <i class="fa-solid fa-chalkboard-teacher" style="color: #ffce47;"></i> アプリの説明</strong>
            <span style="margin-right: 5rem;"></span>
            <a href="https://laravel10-books.vercel.app/" target="_blank" style="font-size: 1.5rem;"><i class="fa-solid fa-desktop"></i>
                アプリの画面</a>
            <span style="margin-right: 5rem;"></span>
            <a href="https://github.com/LaravelBasics/Laravel10_Books" target="_blank" style="font-size: 1.5rem;"><i
                    class="fa-brands fa-github"></i> GitHub</a>
            <br>
            <p class="gray-bg">
                画面右上から、メールアドレス、パスワードを入力してログインできます。<br>
                ログイン後、Booksをクリックすると、本管理ページに移動します。<br>
                登録、編集、削除が行える機能や、ページネーションに対応しています。
            </p>

            <strong style="font-size: 1.2rem;">
                <i class="fa-solid fa-undo-alt" style="color: #ffce47;"></i> 振り返り</strong><br>
            <p class="gray-bg">
                アプリ制作期間:１週間<br>
                就労支援の職員が作成した基本設計書をもとに、本管理アプリの機能変更と追加を行いました。
                <br>
                Laravelシーダーのファクトリークラスでダミーデータを生成した際に、ダミーデータを英語から日本語に変更するのに苦戦しました。
                <br>
                職員に動作確認をしてもらい機能自体は完成しましたが、Reactはあまり理解できませんでした。
            </p>

            <strong style="font-size: 1.2rem;">
                <i class="fa-solid fa-cloud-upload-alt" style="color: #ffce47;"></i> デプロイ</strong><br>
            <p class="gray-bg">
                アプリをインターネット上に公開するため、<br>
                Reactのjsxファイルでデプロイに挑戦しました。成功するか不安でしたが、無事に動作しました。
            </p>
            <p class="gray-bg">
                開発環境: Windows, Laravel 10, React, 認証パッケージBreeze, PostgreSQL
            </p>
        </div>

        <div class="double-space"></div>

        <div class="rounded-box2">
            <h3 id="section9">
                <strong style="margin-right: 5rem;"><i class="fa-solid fa-users" style="color: #2ecc71;"></i>
                    顧客管理システムを改修したアプリ</strong>

            </h3>
            </p>

            <strong style="font-size: 1.2rem;">
                <i class="fa-solid fa-chalkboard-teacher" style="color: #ffce47;"></i> アプリの説明</strong>
            <span style="margin-right: 5rem;"></span>
            <a href="https://laravel10-vue3-client-manager.vercel.app/languages" target="_blank" style="font-size: 1.5rem;"><i
                    class="fa-solid fa-desktop"></i> アプリの画面</a>
            <span style="margin-right: 5rem;"></span>
            <a href="https://github.com/LaravelBasics/Laravel10_Vue3_ClientManager/tree/master"
                target="_blank" style="font-size: 1.5rem;"><i class="fa-brands fa-github"></i> GitHub</a>
            <br>

            <p class="gray-bg">
                例:学習した日数一覧画面に移動後、登録などの際に、プログラミング言語（セレクトボックス）をクリック後、<br>
                教材をクリックすると、プログラミング言語に紐付いた教材が取得されます。（取得までタイムラグがあります）<br>
                <strong class="yellow" style="font-weight: bold;">※空のまま検索ボタンをクリックすると、データベースから全件取得されます。
                    <br>
                </strong>
                ※左のサイドメニュー: 学習したプログラミングをクリックすると、４つの画面にアクセスできます。<br>
                登録、編集、削除が行える機能や、バリデーション機能、学習日数コードなどをクリックするとソート機能（並び替え、昇順⇔降順）が行われます。<br>
                登録済みデータの表示部分はバックエンド、編集ボタンをクリックした時、バックからフロントにデータを渡しています。<br>
            </p>

            <strong style="font-size: 1.2rem;">
                <i class="fa-solid fa-undo-alt" style="color: #ffce47;"></i> 振り返り</strong><br>
            <p class="gray-bg">
                実習中のアプリ制作期間:1か月（既存のコードを改修した期間:１週間）<br>
                社外秘の情報が含まれているため職員に確認を取り、実習で作成したコードを置き換えることに挑戦しました。<br>
                元の仕様"A"に紐付く"B"から、プログラミング言語に紐付く教材、教材に紐付く学習した日数、のように変更しました。
                <br>
                マイグレーションのテーブル名、ユニークカラムをすべて変更し、それに伴うモデル、コントローラー、リクエストクラス、ブレードなどを修正しました。
            </p>

            <strong style="font-size: 1.2rem;">
                <i class="fa-solid fa-cloud-upload-alt" style="color: #ffce47;"></i> デプロイ</strong><br>
            <p class="gray-bg">
                アプリをインターネット上に公開するため、<br>
                CDNを使用していたため、Vue.jsやBootstrapの動作も問題なくスムーズにデプロイできました。</p>
            <p class="gray-bg">開発環境: Windows, Laravel 10, CDN Vuejs 3.3, Bootstrap 5.3</p>

        </div>

        <div class="double-space"></div>

        <div class="rounded-box2">
            <h3 id="section10">
                <strong style="margin-right: 5rem;"><i class="fa-solid fa-envelope" style="color: #2ecc71;"></i>
                    簡易お問い合わせフォームアプリ</strong>
            </h3>

            <strong style="font-size: 1.2rem;">
                <i class="fa-solid fa-chalkboard-teacher" style="color: #ffce47;"></i> アプリの説明</strong>
            <span style="margin-right: 5rem;"></span>
            <a href="https://laravel11-contact-form.vercel.app/" target="_blank" style="font-size: 1.5rem;"><i
                    class="fa-solid fa-desktop"></i> アプリの画面</a>
            <span style="margin-right: 5rem;"></span>
            <a href="https://github.com/LaravelBasics/Laravel11_ContactForm/tree/master" target="_blank" style="font-size: 1.5rem;"><i
                    class="fa-brands fa-github"></i> GitHub</a>
            <br>
            <p class="gray-bg">
                お問い合わせフォームの必須項目を入力し、下記の個人情報の取り扱いに同意するに、チェック、<br>
                一番下の確認ボタンを押すと、入力した内容確認画面に進み、送信ボタンで管理者宛てにメールが送信されます。<br>
                送信後、サンクス画面に進み、リンクをクリックすると最初の画面に戻ります。<br>
                レイアウトは必要最低限で制作しています。
            </p>
            <strong style="font-size: 1.2rem;">
                <i class="fa-solid fa-undo-alt" style="color: #ffce47;"></i> 振り返り</strong><br>
            <p class="gray-bg">
                アプリ制作期間:３～４時間（環境構築を除いた時間）<br>
                外部実習で制作したアプリ。フロントエンドは最低限の機能（バリデーション、送信時に同意するチェックボックスなど）で実装しました。<br>
                テスト用にメールトラップで受信を確認しました。
                <br>
                Laravel 11は初めて触ったので、メール、管理者、送信者など難しかったです。
            </p>

            <strong style="font-size: 1.2rem;">
                <i class="fa-solid fa-cloud-upload-alt" style="color: #ffce47;"></i> デプロイ</strong><br>
            <p class="gray-bg">
                アプリをインターネット上に公開するため、<br>
                また、デプロイ後も動作するのか気になったため挑戦し、無事にメールトラップで受信できました。
            </p>
            <p class="gray-bg">開発環境: バーチャルボックス, LAMP(RockyLinux9.4, apache 2.4, MySQL 8.0, PHP8.2), Laravel 11
            </p>
        </div>

        <div class="double-space"></div>

        <div class="rounded-box2">
            <h3 id="section11">
                <strong style="margin-right: 5rem;"><i class="fa-solid fa-cloud-upload-alt"
                        style="color: #2ecc71"></i> 初めてデプロイに挑戦したアプリ</strong>
            </h3>

            <strong style="font-size: 1.2rem;">
                <i class="fa-solid fa-chalkboard-teacher" style="color: #ffce47;"></i> アプリの説明</strong>
            <span style="margin-right: 5rem;"></span>
            <a href="https://laravel10-breeze-demo.vercel.app/" target="_blank" style="font-size: 1.5rem;"><i
                    class="fa-solid fa-desktop"></i> アプリの画面</a>
            <span style="margin-right: 5rem;"></span>
            <a href="https://github.com/LaravelBasics/Laravel10_Breeze_Demo/tree/aaa" target="_blank" style="font-size: 1.5rem;"><i
                    class="fa-brands fa-github"></i> GitHub</a>
            <br>
            <p class="gray-bg">
                画面右上から、メールアドレス、パスワードを入力してログイン。
                その他、新規ユーザー登録、ログアウトができます。
            </p>

            <strong style="font-size: 1.2rem;">
                <i class="fa-solid fa-undo-alt" style="color: #ffce47;"></i> 振り返り</strong><br>
            <p class="gray-bg">
                デプロイまでの期間２日<br>
                インターネット上に公開するため、Laravelで初めてデプロイに挑戦しました。(Breezeを使ったログイン機能のみ)<br>
                就労支援の職員が作成した教材をもとに、Docker（WSL）とVercel(gihub連携)を学習しました。
                <br>
                Vercelでの環境変数やデータベース接続（特にvercel.jsonや.envファイルの記述）には、ネット上（2024年10月）に十分な情報がなく試行錯誤を要しました。
                <br>
                最終的に、成功した設定をもとに必要な項目を逆算して整理、職員の方もデプロイ成功に至ったことが何よりの成果で、大きな達成感を感じました。
            </p>

            <strong style="font-size: 1.2rem;">
                <i class="fa-solid fa-cloud-upload-alt" style="color: #ffce47;"></i> デプロイ</strong><br>
            <p class="gray-bg">
                アプリをインターネット上に公開するため、<br>
                ローカルでのPostgreSQLインストールの必要性や接続の設定など、チャットGPTを活用しつつ、100回以上デプロイを試行してようやく成功に至りました。
                <br>
                Dockerはコンテナで使用するDockerfileの作成に難航し、実習で経験したRocky Linuxを使って試行した結果、Linuxでは無事に成功しました。
            </p>
            <p class="gray-bg">開発環境: Windows, Laravel 10, 認証パッケージBreeze, PostgreSQL</p>

        </div>
    </div>

    <div class="double-space"></div>

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
                    <p>1&ensp;から&ensp;100&ensp;までの数字を画面に表示してください。ただし、</p>
                    <p>3&ensp;の倍数は&ensp;"FIzz"</p>
                    <p>5&ensp;の倍数は&ensp;"Buzz"</p>
                    <p>15&ensp;の倍数は&ensp;"FizzBuzz"</p>
                    <p>と表示してください。</p>
                    <a href="https://github.com/LaravelBasics/java/blob/master/src/FizzBuzz7_1/FizzBuzz.java"
                        target="_blank">
                        <h5><i class="fa-brands fa-github"></i>自身で制作したコード</h5>
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
                    <hr>
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
                    <hr>
                    <h5>問題 【1】</h5>
                    10 * 10 の世界を作成し、その中の青森と鹿児島の数を教えてください
                    <hr>
                    <h5>問題 【2】</h5>
                    3000 * 3000 の世界を作成し、その中の青森と鹿児島の数を教えてください。
                    ただし1秒以内に数え終わってください
                    <hr>
                    <h5>問題 【3】</h5>
                    新しく三重を追加します。
                    10 * 10 の世界を作成し、その中の青森と鹿児島と三重の数を教えてください
                    <hr>
                    <h5>問題 【4】<a
                            href="https://github.com/LaravelBasics/java/blob/master/src/%E9%9D%92%E6%A3%AE%E9%B9%BF%E5%85%90%E5%B3%B6%E5%95%8F%E9%A1%8C/Main.java"
                            target="_blank" style="padding-left: 4.3rem;"><i
                                class="fa-brands fa-github"></i>自身で制作したコード</a></h5>
                    5 * 5の世界の中に存在できる青森の最大の数と、その配置を求めてください
                    <hr>
                    <h5>研究問題 【1】<a
                            href="https://github.com/LaravelBasics/java/blob/master/src/%E9%9D%92%E6%A3%AE%E9%B9%BF%E5%85%90%E5%B3%B6%E5%95%8F%E9%A1%8C/kennkyuu.java"
                            target="_blank" style="padding-left: 2rem;"><i
                                class="fa-brands fa-github"></i>自身で制作したコード</a></h5>
                    10000 * 10000 の世界を作成し、その中の青森と鹿児島の数を教えてください
                    ただし、１秒以内に数えて終わってください
                    <hr>
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
                            target="_blank" style="padding-left: 2rem;"><i
                                class="fa-brands fa-github"></i>自身で制作したコード</a></h5>
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
    <!-- </div> -->


    <div>
        <h1 class="green-bg" id="section4">【プログラミング学習履歴】</h1>
        <div class="double-space"></div>
        <div class="rounded-box2">
            <h5 style="font-size: 1.2rem;"><i class="fab fa-java" style="color: #f89820;"></i> 2023年10月: Javaの学習（プログラミングを0から学習開始）</h5>

            <p class="gray-bg">10月1日〜1月19日: 教材ProgateのJava、就労支援カリキュラムのJava基礎、アルゴリズム、2次元配列、例外処理、ファイル入出力など（約4ヶ月）
                <!-- m-t2縦の行間変更 -->
                <br>
                <span class="m-t2"></span>
                <span class="p-l2"></span>
                1月22日〜2月13日: エクリプス上で動くブラック・ジャックを作成（約3週間）
            </p>

            <h5 style="font-size: 1.2rem;"><i class="fab fa-php" style="color: #8993be;"></i> 2024年2月: PHPの学習（その他: HTML,CSS,JavaScript,SQL）</h5>

            <p class="gray-bg">2月15日〜3月14日: 教材Be EngineerのPHP基礎, アルゴリズム問題, 基礎15問, 応用15問
                <br>
                <span class="m-t2"></span>
                <span class="p-l2"></span>
                3月15日〜3月16日: Be EngineerのHTML/CSS/JavaScript
                <br>
                <span class="m-t2"></span>
                <span class="p-l2"></span>
                3月19日〜3月22日: ProgateのJavaScript
                <br>
                <span class="m-t2"></span>
                <span class="p-l2"></span>
                3月25日〜3月27日: SQL<br>
                <span class="m-t2"></span>
                <span class="p-l2"></span>
                3月29日〜4月&ensp;1日: ProgateのPython
                <br>
                <span class="m-t2"></span>
                <span class="p-l2"></span>
                <!-- <span style="background-color: rgb(240, 240, 240);"> -->
                4月&ensp;1日〜4月30日: <i class="fa-solid fa-file-word" style="color: #2b5797;"></i> <i
                    class="fa-solid fa-file-excel" style="color: #217346;"></i> <i class="fa-solid fa-file-powerpoint"
                    style="color: #D54E00;"></i> Microsoft Officeを学習
                <!-- </span> -->
                <br>
                <span class="m-t2"></span>
                <span class="p-l2"></span>
                4月25日〜5月17日: 教材PDO
            </p>

            <h5 style="font-size: 1.2rem;"><i class="fab fa-laravel" style="color: #F65314;"></i> 2024年5月: Laravelの学習（XAMPP,composer,MySQLなど）</h5>

            <p class="gray-bg">5月20日〜6月24日: 教材Laravel 6基礎
                <br>
                <span class="m-t2"></span>
                <span class="p-l2"></span>
                6月25日〜7月4日: 教材Techpit①メルカリ風フリマアプリ制作、
                <i class="fa-solid fa-file-excel" style="color: #217346;"></i>Excelアンケートデータ入力(一日目10件、二日目20件)
                <br>
                <span class="m-t2"></span>
                <span class="p-l2"></span>
                7月&ensp;8日〜7月24日: Techpit②SNS風アプリ制作、PC4台キッティング作業
                <br>
                <span class="m-t2"></span>
                <span class="p-l2"></span>
                7月26日〜7月31日: 職員が作成した基本設計書をもとに（Laravel 10, React）③本管理アプリの機能変更、追加。ProgateでReact学習
                <br>
                <span class="m-t2"></span>
                <span class="p-l2"></span>
                7月31日〜8月5日: ProgateのJavaScript、Git、HTML&CSS
                <br>
                <span class="m-t2"></span>
                <span class="p-l2"></span>
                8月&ensp;6日〜8月7日: JavaScriptによるDOM操作
                <br>
                <span class="m-t2"></span>
                <span class="p-l2"></span>
                8月&ensp;8日〜8月16日: Vue.js
            </p>
            <h5 style="font-size: 1.2rem;"><i class="fa-solid fa-gear" style="color: #2ecc71;"></i> 2024年8月: プログラミング実習</h5>

            <p class="gray-bg">8月19日〜9月19日: 株式会社リテラルでの実習
                <br>
                <span class="m-t2"></span>
                <span class="p-l2"></span>
                9月24日〜9月27日: 実習で作成したコードを置き換えられるか検証④顧客管理システムのコードを置き換えたアプリ、
                <i class="fa-solid fa-file-excel" style="color: #217346;"></i> Excelアンケートデータ入力(10件)
                <br>
                <span class="m-t2"></span>
                <span class="p-l2"></span>
                9月28日〜9月30日: ProgateでjQuery
                <br>
                <span class="m-t2"></span>
                <span class="p-l3"></span>
                10月1日〜10月7日: 外部実習のために学習（Linux環境でUbuntu、LAMP構築）
                <br>
                <span class="m-t2"></span>
                <span class="p-l3"></span>
                10月8日〜10月10日: 3日間外部実習、Rocky Linux 9 LAMP環境構築、⑤簡易お問い合わせフォームアプリ作成
                <br>
                <span class="m-t2"></span>
                <span class="p-l3"></span>
                10月11日〜10月16日: 実習の復習
            </p>
            <h5 style="font-size: 1.2rem;">
                <i class="fa-solid fa-cloud-upload-alt" style="color: #2ecc71"></i> 2024年10月: デプロイに挑戦（成功後にポートフォリオ制作）
            </h5>

            <p class="gray-bg">10月17日〜10月5日: 就労支援の職員が制作中の教材をデバッグ。Docker学習。⑥Laravelでデプロイに挑戦。デプロイが成功したので職員へフィードバック
                <br>
                <span class="m-t2"></span>
                <span class="p-l2"></span>
                10月18日〜10月29日: ポートフォリオ完成（仮）、①～⑥デプロイの検証終了
            </p>
            <h5 style="font-size: 1.2rem;">
                <i class="fas fa-user-tie" style="color: black;"></i> 2024年10月: 就職活動（ハローワーク、履歴書、ポートフォリオ改善など）
            </h5>

            <p class="gray-bg">10月29日〜xx月xx日: 就職活動開始
                <br>
                <span class="m-t2"></span>
                <span class="p-l2"></span>
                11月&ensp;1日〜11月7日: ポートフォリオの更新、②SNS風アプリの見直し、Vue.jsが本番で正常に動作するよう改善
                <br>
                <span class="m-t2"></span>
                <span class="p-l2"></span>
                11月&ensp;8日〜11月20日: ポートフォリオの更新、①メルカリ風フリマアプリの見直し、デプロイ後に画像処理が動作するよう仕様を変更
                <br>
                <span class="m-t2"></span>
                <span class="p-l2"></span>
                11月21日〜12月10日: ポートフォリオにJavaのコードを追加、ポートフォリオ更新
                <br>
                <span class="m-t2"></span>
                <span class="p-l2"></span>
                12月11日〜12月15日: ユーザーインターフェイスを考えた、ポートフォリオのレイアウトを一新
            </p>
        </div>
        <div class="d-s">
            <div class="r-b0" style="text-align: center; margin-right: 1rem;">
                <span class="double-space2"></span>
                <p>最後までご覧いただき、ありがとうございました。</p>
                <p>これまでの学習と経験を活かし、さらに技術を磨いていきたいと思っております。</p>
                <p>ご興味をお持ちいただけましたら、ぜひお気軽にご連絡ください。</p>
                <p>どうぞよろしくお願いいたします。</p>
            </div>
        </div>
        <p class="d-s2"></p>
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
                    java: false,
                    php: false,
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