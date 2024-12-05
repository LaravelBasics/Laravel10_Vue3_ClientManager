@extends('layouts.app')

@section('title', 'プログラミング言語一覧')

@section('content')
<div class="container mt-4">
    <h1 style="width: 100%; height: auto;
            margin: 0px 0px 20px 0px; padding: 15px 0px;
            background-color: rgb(240, 240, 240);
            font-size: 2em;
            text-align: center;">プログラミング言語一覧</h1>
    <div class="mb-4">

        <!-- フラッシュメッセージの表示 -->
        @include('includes.flash-message')

        <!-- ?ヘルプボタン -->
        <!-- <button type="button" class="btn btn-link p-0 float-end" @click="showHelpModal"
            style="text-decoration: underline;">
            ？ヘルプ
        </button> -->
    </div>
    <h4>プログラミング言語検索</h4>

    <!-- 検索フォーム -->
    <form action="{{ route('languages.index') }}" method="GET" class="mb-4">
        <div class="d-flex align-items-center">
            <label for="company_search" class="form-label me-2">プログラミング言語名</label>
            <input type="text" id="company_search" name="company_search" class="form-control me-2" style="width: 300px;"
                value="{{ old('company_search', session('company_search')) }}">
            <button type="submit" class="btn btn-primary">検索</button>
        </div>
    </form>

    <div>
        <h4>プログラミング言語一覧</h4>
    </div>

    <div class="d-flex">
        <div class="me-5" style="width: 5cm; font-weight: bold;">
            <a href="{{ route('languages.index', ['sort' => session('sortOrder') == 'asc' ? 'desc' : 'asc']) }}">
                プログラミング言語名
            </a>
        </div>
    </div>

    <!-- 登録フォーム -->
    <form action="{{ route('languages.store') }}" method="POST" class="mb-4">
        @csrf
        <div class="d-flex align-items-center">
            <div class="me-2">
                <input type="text" v-model="newCompany.name" id="new-company-name" name="company_name"
                    class="form-control @error('company_name') @else @enderror" style="width: 200px;">
                <small class="form-text text-muted">(例) Java</small>
                <div v-if="validationErrors == false" style="max-width: 200px;">
                    @error('company_name')
                    <small style="display: block; color: #dc3545;">※ {{ $message }}</small>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary me-2">登録</button>
            <button type="button" @click="cancel" class="btn btn-outline-primary">キャンセル</button>
        </div>
    </form>

    <!-- 登録済みデータの表示 -->
    @if($groupCompanies->isNotEmpty())
    <div class="list-group" style="margin-top:45px; max-height: 180px;">
        @foreach ($groupCompanies as $groupCompany)
        <div class="list-group-item d-flex align-items-center position-relative"
            style="margin-top: 20px; margin-bottom: 20px; border: none;">
            <!-- 編集モードで表示される値 -->
            <div v-if="editingId == {{ $groupCompany->id }}" class="d-flex align-items-center flex-grow-1">
                <div class="me-0" style="margin-top: 0cm;">
                    <input v-model="editedCompany.name" class="form-control me-2 @error('company_name') @else @enderror"
                        style="width: 200px;">
                    <div v-if="validationErrors == true && editingId == {{ $groupCompany->id }}"
                        style="max-width: 200px;">
                        @error('company_name')
                        <small style="display: block; color: #dc3545;">※{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <!-- 送信する情報 -->
                <div class="position-absolute" style="top: 50%; right: 10px; transform: translateY(-50%);">
                    <form :action="`{{ route('languages.update', ':id') }}`.replace(':id', editingId)" method="POST"
                        class="d-inline">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="editing_id" :value="editingId">
                        <input type="hidden" name="company_name" :value="editedCompany.name">
                        <button type="submit" class="btn btn-success me-2">登録</button>
                    </form>
                    <button @click="cancelEdit({{ $groupCompany->id }})" class="btn btn-secondary">キャンセル</button>
                </div>
            </div>

            <!-- 編集モードでない場合に表示される値 -->
            <div v-else class="d-flex align-items-center">
                <span>{{ $groupCompany->name }}</span>
                <div class="position-absolute" style="top: 50%; right: 10px; transform: translateY(-50%);">
                    <!-- 編集クリックで編集モードになる -->
                    <button @click="editCompany({{ $groupCompany->id }})" class="btn btn-primary me-2">編集</button>
                    <!-- 削除ボタンのクリックでモーダルを表示 -->
                    <button type="button" class="btn btn-outline-danger"
                        @click="openConfirmDialog({{ $groupCompany->id }})" data-bs-toggle="modal"
                        data-bs-target="#confirmDeleteModal">削除</button>
                </div>
            </div>
        </div>
        <hr>
        @endforeach
        <!-- ページネーション -->
        {{ $groupCompanies->appends(request()->except('page'))->links() }}

        <!-- 現在の表示範囲と合計件数の表示 -->
        <div class="text-end mt-2">
            <p>
                {{ $groupCompanies->firstItem() }} - {{ $groupCompanies->lastItem() }} / {{ $groupCompanies->total() }}
                件
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
                    プログラミング言語をシステムから削除します。削除すると、元には戻せません。<br>
                    本当によろしいですか？
                </div>
                <div class="modal-footer">

                    <!-- 削除フォーム -->
                    <form :action="`{{ route('languages.destroy', ':id') }}`.replace(':id', companyIdToDelete)"
                        method="POST" class="d-inline">
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
                companies: @json($groupCompanies),
                validationErrors: false, // バリデーションエラーメッセージ用
                showConfirmDialog: false,  // 削除確認モーダルの表示フラグ
                companyIdToDelete: null,   // 削除対象の会社ID
                editingId: '{{ old('editing_id') }}',   // 新規登録or編集保存の判定
                newCompany: {
                    name: ''
                },
                editedCompany: {
                    name: ''
                }
            };
        },
        // 初期データの処理
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
            editCompany(id) {
                this.editingId = id;
                const company = this.companies.data.find(company => company.id === id); // ページネーションされている場合は`data`配下にある
                this.editedCompany = {
                    ...company
                };    
            },
            // 新規登録で入力した値をキャンセル
            cancel() {
                this.newCompany = {
                    name: ''
                };
            },
            // 編集をキャンセルして元のデータに戻す
            cancelEdit(id) {
                this.editingId = null;
                this.editedCompany = {
                    name: ''
                };
            },
            openConfirmDialog(id) {
                this.companyIdToDelete = id;
                this.showConfirmDialog = true; // 削除確認モーダルを表示
            },
            closeConfirmDialog() {
                this.showConfirmDialog = false; // 削除確認モーダルを閉じる
            },
            handleData() {
                if(this.editingId) {
                    this.editedCompany = {
                        name: '{{ old('company_name') }}'
                    };
                    this.validationErrors = true;  //  編集モードのみバリデーションメッセージを表示

                } else {
                    this.newCompany = {
                        name: '{{ old('company_name') }}'
                    };
                }
            },
        }
    }).mount('#app');
</script>
@endsection