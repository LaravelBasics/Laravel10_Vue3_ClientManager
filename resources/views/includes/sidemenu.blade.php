<nav class="nav flex-column">
    <!-- <a class="nav-link" href="/">【トップページ】</a> -->
    <!-- ページに飛んだあとクリックイベントで移動する -->
    <a class="nav-link" href="/#section1">【PHP(Laravel)アプリ一覧】</a>
    <a class="nav-link" href="/#section2">【Javaコードのみ】</a>
    <a class="nav-link" href="/#section3">【プロフィール】</a>
    <a class="nav-link" href="/#section4">【プログラミング学習履歴】</a>

    <a class="nav-link" href="#" @click="toggleSubMenu('location')">学習したプログラミング
        <span class="float-end" v-if="menu.employeeMaster">-</span>
        <span class="float-end" v-else>+</span>
    </a>
    <div v-if="menu.location">
        <a class="nav-link ms-3 ms-5" href="{{ route('languages.index') }}">プログラミング言語</a>
        <a class="nav-link ms-3 ms-5" href="{{ route('materials.index') }}">使用した教材</a>
        <a class="nav-link ms-3 ms-5" href="{{ route('learning-days.index') }}">学習した日数</a>
        <a class="nav-link ms-3 ms-5" href="{{ route('artifacts.index') }}">作成した成果物</a>
    </div>
    <div>
        <strong class="sepia-bg2"><span style="background-color: #BCF4BC;">全アプリ共通のアカウント</span></strong>
    </div>
    <div>
        <strong class="sepia-bg2">メールアドレス<span style="padding-left: 20px;">test@test</sapn></strong>
    </div>
    <div>
        <strong class="sepia-bg2">パスワード<span style="padding-left: 44px;">testtest</sapn></strong>
    </div>
</nav>