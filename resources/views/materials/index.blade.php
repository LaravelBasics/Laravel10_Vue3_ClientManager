@extends('layouts.app')

@section('title', '教材一覧')

@section('content')
<div class="container mt-4">
    <h1 style="width: 100%; height: auto;
            margin: 0px 0px 20px 0px; padding: 15px 0px;
            background-color: rgb(240, 240, 240);
            font-size: 2em;
            text-align: center;">使用した教材一覧</h1>
    <div class="mb-4">
        <!-- フラッシュメッセージの表示 -->
        @include('includes.flash-message')

        <!-- <button type="button" class="btn btn-link p-0 float-end" @click="showHelpModal"
            style="text-decoration: underline;">
            ？ヘルプ
        </button> -->
    </div>
    <h4>教材検索</h4>

    <!-- 検索フォーム -->
    <form action="{{ route('materials.index') }}" method="GET" class="mb-4">
        <div class="d-flex align-items-center mb-3">
            <!-- プログラミング言語のセレクトボックス -->
            <label for="group-company" class="form-label me-2 mb-0">プログラミング言語</label>
            <select id="group-company" name="group_company" class="form-select" style="width: 300px;">
                <option value=""></option>
                @foreach($groupCompanies as $company)
                <option value="{{ $company->id }}" {{ old('group_company',
                    session('searchs.group_company'))==$company->id ? 'selected' : '' }}>
                    {{ $company->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="d-flex align-items-center">
            <label for="branch-office-name" class="form-label me-2 mb-0">教材名</label>
            <input type="text" id="branch-office-name" name="branch_office_name" class="form-control me-2"
                style="width: 300px; margin-left: 1.75cm;"
                value="{{ old('branch_office_name', session('searchs.branch_office_name')) }}">
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary" style="margin-right: 77px;">検索</button>
        </div>
    </form>

    <h5>教材一覧</h5>

    <div class="d-flex">
        <div class="me-5" style="width: 4.3cm; font-weight: bold;">
            <a
                href="{{ route('materials.index', ['sort' => 'language_id', 'direction' => (session('sort') === 'language_id' && session('direction') === 'asc') ? 'desc' : 'asc']) }}">
                プログラミング言語
            </a>
        </div>
        <div class="me-5" style="width: 4.2cm; font-weight: bold;">
            <a
                href="{{ route('materials.index', ['sort' => 'code', 'direction' => (session('sort') === 'code' && session('direction') === 'asc') ? 'desc' : 'asc']) }}">
                教材コード
            </a>
        </div>
        <div style="font-weight: bold;">
            <a
                href="{{ route('materials.index', ['sort' => 'title', 'direction' => (session('sort') === 'title' && session('direction') === 'asc') ? 'desc' : 'asc']) }}">
                教材名
            </a>
        </div>
    </div>

    <!-- 登録フォーム -->
    <form action="{{ route('materials.store') }}" method="POST" class="mb-4">
        @csrf
        <div class="d-flex align-items-center">
            <!-- プログラミング言語のセレクトボックス -->
            <div class="me-2" style="margin-top: -0.63cm;">
                <select v-model="newBranchOffice.language_id" id="group-company" name="language_id"
                    class="form-select @error('language_id') @else @enderror" style="width: 200px;">
                    <option value=""></option>
                    <option v-for="company in groupCompanies" :key="company.id" :value="company.id">
                        @{{ company.name }}</option>
                </select>
                <div v-if="validationErrors == false" style="position: absolute; width: 100%; max-width: 200px;">
                    @error('language_id')
                    <small style="display: block; color: #dc3545;">※ {{ $message }}</small>
                    @enderror
                </div>
            </div>

            <!-- 教材コードの入力フィールド -->
            <div class="me-2">
                <input type="text" v-model="newBranchOffice.code" id="branch-code" name="code"
                    class="form-control @error('code') @else @enderror" style="width: 200px;">
                <small class="form-text text-muted">(例) 300</small>
                <div v-if="validationErrors == false" style="position: absolute; width: 100%; max-width: 200px;">
                    @error('code')
                    <small style="display: block; color: #dc3545;">※ {{ $message }}</small>
                    @enderror
                </div>
            </div>

            <!-- 教材名の入力フィールド -->
            <div class="me-2">
                <input type="text" v-model="newBranchOffice.title" id="new-branch-office-name" name="title"
                    class="form-control @error('title') @else @enderror" style="width: 200px;">
                <small class="form-text text-muted">(例) be-engineer</small>
                <div v-if="validationErrors == false" style="position: absolute; width: 100%; max-width: 200px;">
                    @error('title')
                    <small style="display: block; color: #dc3545;">※ {{ $message }}</small>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary me-2">登録</button>
            <button type="reset" @click="cancel" class="btn btn-outline-primary">キャンセル</button>
        </div>
    </form>

    <!-- 登録済みデータの表示 -->
    @if($branchOffices->isNotEmpty())
    <div class="list-group" style="margin-top:45px; max-height: 180px;">
        @foreach ($branchOffices as $branchOffice)
        <div class="list-group-item d-flex align-items-center position-relative"
            style="margin-top: 20px; margin-bottom: 20px; border: none;">
            <!-- 編集モードで表示される部分 -->
            <div v-if="editingId == {{ $branchOffice->id }}" class="d-flex align-items-center flex-grow-1">
                <!-- プログラミング言語の選択 -->
                <select v-model="editedBranchOffice.language_id"
                    class="form-control me-2 @error('language_id') @else @enderror" style="width: 200px;"
                    required>
                    <option v-for="company in groupCompanies" :key="company.id" :value="company.id">
                        @{{ company.name }}
                    </option>
                </select>
                <div v-if="validationErrors == true && editingId == {{ $branchOffice->id }}"
                    style="position: absolute; width: 100%; max-width: 200px;">
                    @error('language_id')
                    <small style="display: block; color: #dc3545;">※{{
                        $message }}</small>
                    @enderror
                </div>
                <div class="me-0" style="margin-left: 0; margin-top: 0cm;">
                    <input v-model="editedBranchOffice.code" class="form-control me-2 @error('code') @else @enderror"
                        placeholder="教材コード" style="width: 200px; max-width: 200px;">
                    <div v-if="validationErrors == true && editingId == {{ $branchOffice->id }}"
                        style="position: absolute; width: 100%; max-width: 200px;">
                        @error('code')
                        <small style="display: block; color: #dc3545;">※{{
                            $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="me-0" style="margin-left: 0; margin-top: 0cm;">
                    <input v-model="editedBranchOffice.title" class="form-control me-2 @error('title') @else @enderror"
                        placeholder="教材名" style="width: 180px; max-width: 200px;">
                    <div v-if="validationErrors == true && editingId == {{ $branchOffice->id }}"
                        style="position: absolute; width: 100%; max-width: 180px;">
                        @error('title')
                        <small style="display: block; color: #dc3545;">※{{
                            $message }}</small>
                        @enderror
                    </div>
                </div>

                <!-- 編集モード中に送信する情報 -->
                <div class="position-absolute" style="top: 50%; right: 10px; transform: translateY(-50%);">
                    <form :action="`{{ route('materials.update', ':id') }}`.replace(':id', editedBranchOffice.id)"
                        method="POST" class="d-inline">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="editing_id" :value="editingId">
                        <input type="hidden" name="language_id" :value="editedBranchOffice.language_id">
                        <input type="hidden" name="code" :value="editedBranchOffice.code">
                        <input type="hidden" name="title" :value="editedBranchOffice.title">
                        <button type="submit" class="btn btn-success me-2">登録</button>
                    </form>
                    <button type="button" @click="cancelEdit({{ $branchOffice->id }})"
                        class="btn btn-secondary">キャンセル</button>
                </div>
            </div>

            <!-- 編集モードでない場合に表示される部分 -->
            <div v-else class="d-flex align-items-center flex-grow-1">
                <div class="d-flex justify-content-between w-60">
                    <div class="d-flex" style="width: 200px; text-align: left; margin-right: 0.5cm;">
                        <span>{{ $branchOffice->language->name }}</span>
                    </div>
                    <div class="d-flex" style="width: 150px; text-align: center; margin-right: 1.3cm;">
                        <span>{{ $branchOffice->code }}</span>
                    </div>
                    <div class="d-flex" style="width: 200px; text-align: right;">
                        <span>{{ $branchOffice->title }}</span>
                    </div>
                </div>
                <!-- 編集・削除ボタン -->
                <div class="position-absolute" style="top: 50%; right: 10px; transform: translateY(-50%);">
                    <button @click="editBranchOffice({{ $branchOffice->id }})" class="btn btn-primary me-2">編集</button>
                    <button type="button" @click="openConfirmDialog({{ $branchOffice->id }})"
                        class="btn btn-outline-danger">削除</button>
                </div>
            </div>
        </div>
        <hr>
        @endforeach
        <!-- ページネーション -->
        {{ $branchOffices->appends(request()->except('page'))->links() }}

        <!-- 現在の表示範囲と合計件数の表示 -->
        <div class="text-end mt-2">
            <p>
                {{ $branchOffices->firstItem() }} - {{ $branchOffices->lastItem() }} / {{ $branchOffices->total() }} 件
            </p>
        </div>
    </div>
    @endif

    <!-- 削除確認モーダル -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    教材をシステムから削除します。削除すると、元には戻せません。<br>
                    本当によろしいですか？
                </div>
                <div class="modal-footer">
                    <!-- 削除フォーム -->
                    <form :action="`{{ route('materials.destroy', ':id') }}`.replace(':id', confirmDeleteModalId)"
                        method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">OK</button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">キャンセル</button>
                </div>
            </div>
        </div>
    </div>

    <!-- モーダルを画面中央に配置し、大きさを調整 -->
    <!-- <div class="modal fade" id="helpModal" tabindex="-1" aria-labelledby="helpModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 15cm;">
            <div class="modal-content" style="height: 10cm;">
                <div class="modal-header">
                    <h5 class="modal-title" id="helpModalLabel">ステップ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    本画面ではパスワードを変更することができます。<br>
                    現在のパスワードをお忘れの方は、ログイン画面よりパスワードを再発行してください。
                </div>

            </div>
        </div>
    </div> -->
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
                allBranchOffices: @json($branchOffices),
                groupCompanies: @json($groupCompanies),
                validationErrors: false, // バリデーションエラーメッセージ用
                confirmDeleteModalId: null,
                editingId: '{{ old('editing_id') }}',
                newBranchOffice: {
                    language_id: '',
                    code: '',
                    title: ''
                },
                editedBranchOffice: {
                    id: '',
                    language_id: '',
                    code: '',
                    title: '',
                },
            };
        },
        // 画面が表示された後自動で実行される処理
        mounted() {
            this.handleData();
        },
        methods: {
            showHelpModal() {
                const modal = new bootstrap.Modal(document.getElementById('helpModal'));
                modal.show();
            },
            toggleSubMenu(menu) {
                this.menu[menu] = !this.menu[menu];
            },
            editBranchOffice(id) {
                this.editingId = id;
                const branchOffice = this.allBranchOffices.data.find(branchOffice => branchOffice.id === id);

                // `branchOffice`の値を確認
                // console.log('Selected branchOffice title:', branchOffice.title);
                this.editedBranchOffice = {
                    ...branchOffice
                };

                // `this.editedBranchOffice`の値を確認
                // console.log('Edited branchOffice id:', this.editedBranchOffice.id);
            },
            cancel() {
                this.newBranchOffice = {
                    language_id: '',
                    code: '',
                    title: ''
                };
            },
            cancelEdit(id) {
                this.editingId = null; // 編集モードを解除
                this.editedBranchOffice = { // 編集データをリセット
                    language_id: '',
                    code: '',
                    title: ''
                };
            },
            openConfirmDialog(id) {
                this.confirmDeleteModalId = id; // 削除対象の教材IDを設定
                const modal = new bootstrap.Modal(document.getElementById('confirmDeleteModal'));
                modal.show();
            },
            handleData() {
                // IDがある場合初回起動時編集モードにする
                if (this.editingId) {
                    this.editedBranchOffice = {
                        id: '{{ old('id', '') }}',
                        language_id: '{{ old('language_id', '') }}',
                        code: '{{ old('code', '') }}',
                        title: '{{ old('title', '') }}'
                    };
                    this.validationErrors = true;//編集モードのバリデーションメッセージを表示
                } else {
                    // IDがない場合は新規登録用のデータを設定
                    this.newBranchOffice = {
                        language_id: '{{ old('language_id') }}',
                        code: '{{ old('code') }}',
                        title: '{{ old('title') }}'
                    };
                }
            },
        },
    }).mount('#app');
</script>
@endsection