<nav class="nav flex-column">
    <!-- <a class="nav-link" href="/">【トップページ】</a> -->
    <!-- ページに飛んだあとクリックイベントで移動する -->
    <a class="nav-link" href="/#section3">【プロフィール】</a>
    <a class="nav-link" href="/#section5">【実習履歴】</a>

    <!-- <a class="nav-link" href="/#section2">【Java課題制作】</a> -->
    <a class="nav-link" href="#section2" @click="toggleSubMenu('java')">【Java課題制作】
        <span class="float-end" v-if="!menu.java"><i class="fas fa-chevron-down"></i></span>
        <span class="float-end" v-else><i class="fas fa-chevron-right"></i></span>
    </a>

    <div v-if="menu.java">
        <a class="nav-link ms-3 ms-1" href="/#section12">FizzBuzz</a>
        <a class="nav-link ms-3 ms-1" href="/#section13">青森鹿児島問題</a>
        <a class="nav-link ms-3 ms-1" href="/#section14">ブラックジャック</a>
    </div>

    <!-- <a class="nav-link" href="/#section1">【PHP課題制作】</a> -->
    <a class="nav-link" href="/#section1" @click="toggleSubMenu('php')">【PHP課題制作】
        <span class="float-end" v-if="!menu.php"><i class="fas fa-chevron-down"></i></span>
        <span class="float-end" v-else><i class="fas fa-chevron-right"></i></span>
    </a>
    
    <div v-if="menu.php">
        <a class="nav-link ms-3 ms-1" href="/#section6">メルカリ風フリマアプリ</a>
        <a class="nav-link ms-3 ms-1" href="/#section7">SNS風アプリ</a>
        <a class="nav-link ms-3 ms-1" href="/#section8">本管理アプリ</a>
        <a class="nav-link ms-3 ms-1" href="/#section9">顧客管理システム改修</a>
        <a class="nav-link ms-3 ms-1" href="/#section10">簡易お問い合わせフォーム</a>
        <a class="nav-link ms-3 ms-1" href="/#section11">初めてデプロイに挑戦</a>
    </div>

    <a class="nav-link" href="/#section4">【プログラミング学習履歴】</a>

    <div style="border-radius: 1rem; background-color: rgb(253, 253, 253)">
        <div style="padding-top: 0.5rem;">
            <strong class="sepia-bg2"><span>全アプリ共通のアカウント</span></strong>
        </div>
        <div>
            <strong class="sepia-bg2">メールアドレス<span style="padding-left: 1.25rem;">test@test</sapn></strong>
        </div>
        <div>
            <strong class="sepia-bg2">パスワード<span style="padding-left: 2.75rem;">testtest</sapn></strong>
        </div>
    </div>

    <div style="padding-top: 0.5rem;">
        <p style="padding-left: 0.85rem;">
            <span style="color: #007BFF; text-decoration: underline;">青字</span>
            をクリックすると詳細へ
        </p>
    </div>

    <!-- 学習したプログラミング -->
    <a class="nav-link" href="/#section9" @click="toggleSubMenu('location')">顧客管理システム改修アプリ
        <span class="float-end" v-if="!menu.location"><i class="fas fa-chevron-down"></i></span>
        <span class="float-end" v-else><i class="fas fa-chevron-right"></i></span>
    </a>
    
    <div v-if="menu.location">
        <a class="nav-link ms-3 ms-1" href="{{ route('languages.index') }}">プログラミング言語（リンク）</a>
        <a class="nav-link ms-3 ms-1" href="{{ route('materials.index') }}">使用した教材（リンク）</a>
        <a class="nav-link ms-3 ms-1" href="{{ route('learning-days.index') }}">学習した日数（リンク）</a>
        <a class="nav-link ms-3 ms-1" href="{{ route('artifacts.index') }}">作成した成果物（リンク）</a>
    </div>
</nav>