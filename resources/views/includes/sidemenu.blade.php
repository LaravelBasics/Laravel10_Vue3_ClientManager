<nav class="nav flex-column">
    <a class="nav-link" href="#">トップページ</a>
    <a class="nav-link" href="/">ポートフォリオ</a>

    <!-- クライアントマスタ管理 -->
    <a class="nav-link" href="#" @click="toggleSubMenu('clientMaster')">
        A
        <span class="float-end" v-if="menu.clientMaster">-</span>
        <span class="float-end" v-else>+</span>
    </a>
    <div v-if="menu.clientMaster">
        <a class="nav-link ms-3" href="#" @click="toggleSubMenu('clientCorporation')">A-1</a>
        <div v-if="menu.clientCorporation">
            <a class="nav-link ms-3 ms-5" href="#">AA-1</a>
            <a class="nav-link ms-3 ms-5" href="#">AA-2</a>
        </div>
        <a class="nav-link ms-3" href="#" @click="toggleSubMenu('client')">A-2</a>
        <div v-if="menu.client">
            <a class="nav-link ms-3 ms-5" href="#">AA-3</a>
            <a class="nav-link ms-3 ms-5" href="#">AA-4</a>
        </div>
    </div>

    <!-- 従業員マスタ管理 -->
    <a class="nav-link" href="#" @click="toggleSubMenu('employeeMaster')">
        プログラミング
        <span class="float-end" v-if="menu.employeeMaster">-</span>
        <span class="float-end" v-else>+</span>
    </a>
    <div v-if="menu.employeeMaster">
        <a class="nav-link ms-3" href="#" @click="toggleSubMenu('employee')">B-1</a>
        <div v-if="menu.employee">
            <a class="nav-link ms-3 ms-5" href="#">BB-1</a>
            <a class="nav-link ms-3 ms-5" href="#">BB-2</a>
            <a class="nav-link ms-3 ms-5" href="#">BB-3</a>
        </div>
        <a class="nav-link ms-3" href="#" @click="toggleSubMenu('location')">学習したプログラミング</a>
        <div v-if="menu.location">
            <a class="nav-link ms-3 ms-5" href="{{ route('languages.index') }}">プログラミング言語</a>
            <a class="nav-link ms-3 ms-5" href="{{ route('materials.index') }}">使用した教材</a>
            <a class="nav-link ms-3 ms-5" href="{{ route('learning-days.index') }}">学習した日数</a>
            <a class="nav-link ms-3 ms-5" href="{{ route('artifacts.index') }}">作成した成果物</a>
        </div>
    </div>

    <a class="nav-link" href="#">マイページ</a>
</nav>