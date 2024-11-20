@extends('layouts.app')

@section('title', '学習した日数一覧')

@section('content')
<div class="container mt-4">
    <h1 style="width: 100%; height: auto;
            margin: 0px 0px 20px 0px; padding: 15px 0px;
            background-color: rgb(240, 240, 240);
            font-size: 2em;
            text-align: center;">学習した日数一覧</h1>
    <div class="mb-4">
        <!-- フラッシュメッセージの表示 -->
        @include('includes.flash-message')

        <!-- <button type="button" class="btn btn-link p-0 float-end" @click="showHelpModal"
            style="text-decoration: underline;">
            ？ヘルプ
        </button> -->
    </div>
    <h4>学習日数検索</h4>

    <!-- 検索フォーム -->
    <form action="{{ route('learning-days.index') }}" method="GET" class="mb-4">
        <!-- プログラミング言語のセレクトボックス -->
        <div class="d-flex align-items-center mb-3">
            <label for="group-company-search" class="form-label me-2 mb-0">プログラミング言語</label>
            <select id="group-company-search" name="group_company_search" class="form-select" style="width: 300px;"
                v-model="searchSelectedGroupCompanyId" @change="onSearchGroupCompanyChange">
                <option value=""></option>
                @foreach ($groupCompanies as $company)
                <option value="{{ $company->id }}">
                    {{ $company->name }}
                </option>
                @endforeach
            </select>
        </div>

        <!-- 教材のセレクトボックス -->
        <div class="d-flex align-items-center mb-3">
            <label for="branch-office-search" class="form-label me-2 mb-0">教材</label>
            <select id="branch-office-search" name="branch_office_search" class="form-select"
                style="width: 300px; margin-left: 2.17cm;" v-model="searchSelectedBranchOfficeId"
                :disabled="!searchSelectedGroupCompanyId">
                <option value=""></option>
                <option v-for="office in filteredBranchOfficesSearch" :key="office.id" :value="office.id">
                    @{{ office.title }}
                </option>
            </select>
        </div>

        <!-- 学習日数のテキストボックス -->
        <div class="d-flex align-items-center mb-3">
            <label for="department-name" class="form-label me-2 mb-0">学習日数</label>
            <input type="text" id="department-name" name="department_name" class="form-control"
                style="width: 300px; margin-left: 1.33cm;"
                value="{{ old('department_name', session('search_conditions.department_name')) }}">
        </div>

        <!-- 検索ボタン -->
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary" style="margin-right: 77px;">検索</button>
        </div>
    </form>

    <h5>学習日数一覧</h5>

    <div class="d-flex">
        <div class="me-5" style="width: 3.8cm; font-weight: bold;">
            <a
                href="{{ route('learning-days.index', ['sort' => 'language_id', 'direction' => (session('sort') === 'language_id' && session('direction') === 'asc') ? 'desc' : 'asc']) }}">
                プログラミング言語
            </a>
        </div>
        <div class="me-5" style="width: 3.7cm; font-weight: bold;">
            <a
                href="{{ route('learning-days.index', ['sort' => 'material_id', 'direction' => (session('sort') === 'material_id' && session('direction') === 'asc') ? 'desc' : 'asc']) }}">
                教材
            </a>
        </div>
        <div class="me-5" style="width: 3.7cm; font-weight: bold;">
            <a
                href="{{ route('learning-days.index',['sort' => 'code', 'direction' => (session('sort') === 'code' && session('direction') === 'asc') ? 'desc' : 'asc']) }}">
                学習日数コード
            </a>
        </div>
        <div style="font-weight: bold;">
            <a
                href="{{ route('learning-days.index', ['sort' => 'days', 'direction' => (session('sort') === 'days' && session('direction') === 'asc') ? 'desc' : 'asc']) }}">
                学習日数
            </a>
        </div>
    </div>

    <!-- 登録フォーム -->
    <form id="store-form-container" action="{{ route('learning-days.store') }}" method="POST" class="mb-4">
        @csrf
        <div class="d-flex align-items-center max-height: 180px;">
            <!-- プログラミング言語のセレクトボックス -->
            <div class="me-2" style="margin-top: -0.63cm; ">
                <select id="new-group-company" v-model="newDepartment.language_id" name="language_id"
                    @change="onNewDepartmentGroupCompanyChange"
                    class="form-select @error('language_id') @else @enderror"
                    style="width: 180px; max-width: 180px;">
                    <option value=""></option>
                    <option v-for="company in groupCompanies" :key="company.id" :value="company.id">
                        @{{ company.name }}
                    </option>
                </select>
                <div v-if="validationErrors == false" style="position: absolute; width: 100%; max-width: 180px;">
                    @error('language_id')
                    <small style="display: block; color: #dc3545;">※ {{ $message }}</small>
                    @enderror
                </div>
            </div>

            <!-- 教材のセレクトボックス -->
            <div class="me-2" style="margin-top: -0.63cm;">
                <select id="new-branch-office" v-model="newDepartment.material_id" name="material_id"
                    class="form-select @error('material_id') @else @enderror"
                    :disabled="!newDepartment.language_id" style="width: 180px; max-width: 180px;">
                    <option value=""></option>
                    <option v-for="office in filteredBranchOffices" :key="office.id" :value="office.id">
                        @{{ office.title }}
                    </option>
                </select>
                <div v-if="validationErrors == false" style="position: absolute; width: 100%; max-width: 180px;">
                    @error('material_id')
                    <small style="display: block; color: #dc3545;">※ {{ $message }}</small>
                    @enderror
                </div>
            </div>

            <!-- 学習日数コードの入力フィールド -->
            <div class="me-2" style="margin-left: 0; margin-top: 0.04cm;">
                <input type="text" v-model="newDepartment.code" id="department-code" name="code" class="form-control
                @error('code') @else @enderror" style="width: 180px; max-width: 180px;">
                <small class="form-text text-muted" style="display: block;">(例) 400</small>
                <div v-if="validationErrors == false" style="position: absolute; width: 100%; max-width: 180px;">
                    @error('code')
                    <small style="display: block; color: #dc3545;">※ {{ $message }}</small>
                    @enderror
                </div>
            </div>

            <!-- 学習日数の入力フィールド -->
            <div class="me-2" style="margin-left: 0; margin-top: 0.04cm;">
                <input type="text" v-model="newDepartment.days" id="department-name" name="days" class="form-control
                @error('days') @else @enderror" style="width: 180px; max-width: 180px;">
                <small class="form-text text-muted" style="display: block;">(例) 30日</small>
                <div v-if="validationErrors == false" style="position: absolute; width: 100%; max-width: 180px;">
                    @error('days')
                    <small style="display: block; color: #dc3545;">※ {{ $message }}</small>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary me-2">登録</button>
            <button type="button" @click="cancelEdit2" class="btn btn-outline-primary">キャンセル</button>
        </div>
    </form>

    <!-- 登録済みデータの表示 -->
    @if($departments->isNotEmpty())
    <div class="list-group" style="margin-top:45px; max-height: 180px;">
        @foreach ($departments as $department)
        <div class="list-group-item d-flex align-items-center position-relative"
            style="margin-top: 20px; margin-bottom: 20px; border: none;">
            <!-- 編集モードで表示される部分 -->
            <div v-if="editingId == {{ $department->id }}" class="d-flex align-items-center flex-grow-1">
                <!-- プログラミング言語の選択 -->
                <div class="me-0" style="margin-top: 0m;">
                    <select v-model="editedDepartment.language_id"
                        @change="onEditGroupCompanyChange($event.target.value)"
                        class="form-control me-2 @error('language_id') @else @enderror"
                        style="width: 180px; max-width: 180px;" required>
                        <option v-for="company in groupCompanies" :key="company.id" :value="company.id">
                            @{{ company.name }}
                        </option>
                    </select>
                    <div v-if="validationErrors == true && editingId == {{ $department->id }}"
                        style="position: absolute; width: 100%; max-width: 180px;">
                        @error('language_id')
                        <small style="display: block; color: #dc3545;">※{{
                            $message }}</small>
                        @enderror
                    </div>
                </div>

                <!-- 教材の選択 -->
                <div class="me-0" style="margin-top: 0cm;">
                    <select v-if="branchOffices.length > 0" @change="onBranchOfficeChange($event.target.value)"
                        v-model="editedDepartment.material_id"
                        class="form-control me-2 @error('material_id') @else @enderror"
                        style="width: 180px; max-width: 180px;" required>
                        <!-- デフォルトの選択肢 -->
                        <option v-for="office in branchOffices" :key="office.id" :value="office.id">
                            @{{ office.title }}
                        </option>
                    </select>
                    <!-- プログラミング言語に紐付く教材の選択肢がない場合、空欄のセレクトボックスを表示 -->
                    <select v-else class="form-control me-2" style="width: 180px; max-width: 180px;">
                        <option value=""></option>
                    </select>
                    <div v-if="validationErrors == true && editingId == {{ $department->id }} && editedDepartment.material_id != null"
                        style="position: absolute; width: 100%; max-width: 180px;">
                        @error('material_id')
                        <small style="display: block; color: #dc3545;">※ {{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <!-- 学習日数コードの入力フィールド -->
                <div class="me-0" style="margin-left: 0; margin-top: 0cm;">
                    <input v-model="editedDepartment.code" class="form-control me-2 @error('code') @else @enderror"
                        placeholder="学習日数コード" style="width: 180px; max-width: 180px;">
                    <div v-if="validationErrors == true && editingId == {{ $department->id }}"
                        style="position: absolute; width: 100%; max-width: 180px;">
                        @error('code')
                        <small style="display: block; color: #dc3545;">※{{
                            $message }}</small>
                        @enderror
                    </div>
                </div>

                <!-- 学習日数の入力フィールド -->
                <div class="me-0" style="margin-left: 0; margin-top: 0cm;">
                    <input v-model="editedDepartment.days" class="form-control me-2 @error('days') @else @enderror"
                        placeholder="学習日数" style="width: 180px; max-width: 180px;">
                    <div v-if="validationErrors == true && editingId == {{ $department->id }}"
                        style="position: absolute; width: 100%; max-width: 180px;">
                        @error('days')
                        <small style="display: block; color: #dc3545;">※{{
                            $message }}</small>
                        @enderror
                    </div>
                </div>

                <!-- 編集モード中に送信する情報 -->
                <div class="position-absolute" style="top: 50%; right: 10px; transform: translateY(-50%);">
                    <form :action="`{{ route('learning-days.update', ':id') }}`.replace(':id', editingId)" method="POST"
                        class="d-inline">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="editing_id" :value="editingId">
                        <input type="hidden" name="language_id" :value="editedDepartment.language_id">
                        <input type="hidden" name="material_id" :value="selectedBranchOfficeId">
                        <input type="hidden" name="code" :value="editedDepartment.code">
                        <input type="hidden" name="days" :value="editedDepartment.days">
                        <button type="submit" class="btn btn-success me-2">登録</button>
                    </form>
                    <button type="button" @click="cancelEdit({{ $department->id }})"
                        class="btn btn-secondary">キャンセル</button>
                </div>
            </div>

            <!-- 編集モードでない場合に表示される部分 -->
            <div v-else class="d-flex align-items-center flex-grow-1">
                <div class="d-flex" style="width: 180px; text-align: left; margin-right: 0.5cm;">
                    <span>{{ $department->language->name }}</span>
                </div>
                <div class="d-flex" style="width: 180px; text-align: left; margin-right: 0.3cm;">
                    <span>{{ $department->material->title }}</span>
                </div>
                <div class="d-flex" style="width: 180px; text-align: center; margin-right: 0cm;">
                    <span>{{ $department->code }}</span>
                </div>
                <div class="d-flex" style="width: 180px; text-align: right;">
                    <span>{{ $department->days }}</span>
                </div>
                <!-- 編集、削除ボタン -->
                <div class="position-absolute" style="top: 50%; right: 10px; transform: translateY(-50%);">
                    <button @click="toggleEditMode({{ $department->id }})" class="btn btn-primary me-2">編集</button>
                    <button @click="openConfirmDialog({{ $department->id }})" class="btn btn-outline-danger">削除</button>
                </div>
            </div>
        </div>
        <hr>
        @endforeach
        <!-- ページネーション -->
        {{ $departments->appends(request()->except('page'))->links() }}

        <!-- 現在の表示範囲と合計件数の表示 -->
        <div class="text-end mt-2">
            <p>
                {{ $departments->firstItem() }} - {{ $departments->lastItem() }} / {{ $departments->total() }} 件
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
                    学習日数をシステムから削除します。削除すると、元には戻せません。<br>本当によろしいですか？
                </div>
                <div class="modal-footer">
                    <!-- フォーム送信、OK、キャンセルボタン -->
                    <form :action="`{{ route('learning-days.destroy', ':id') }}`.replace(':id', confirmDeleteModalId)"
                        method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">OK</button>
                    </form>
                    <button type="button" class="btn btn-secondary" @click="closeConfirmDialog">キャンセル</button>
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
                branch_office_validationErrors: false, // バリデーションエラーメッセージ教材専用
                validationErrors: false, // バリデーションエラーメッセージ用
                allDepartments: @json($departments),
                groupCompanies: @json($groupCompanies),
                branchOffices: [],
                editingId: '{{ old('editing_id') }}',
                confirmDeleteModalId: null,
                searchSelectedGroupCompanyId: '{{ session('search_conditions.group_company_search') }}',
                searchSelectedBranchOfficeId: '{{ session('search_conditions.branch_office_search') }}',
                filteredBranchOfficesSearch: [],// 検索結果用の教材データ
                filteredBranchOffices: [], // 新規登録用の教材データ
                newDepartment: {
                    language_id: null,
                    material_id: null,
                    code: '',
                    days: ''
                },
                editedDepartment: {
                    id: null,
                    language_id: null,
                    material_id: null,
                    code: '',
                    days: ''
                },
                selectedBranchOfficeId: '{{ old('selectedBranchOfficeId') }}', // 選択された教材のID(送信する時のデータ)
            };
        },
        // 画面が表示された後自動で実行される処理
        mounted() {
            this.handleInitialData();
            this.initializeFilteredBranchOffices();
        },
        methods: {
            showHelpModal() {
                const modal = new bootstrap.Modal(document.getElementById('helpModal'));
                modal.show();
            },
            toggleSubMenu(menu) {
                this.menu[menu] = !this.menu[menu];
            },
            // 新規データのリセット
            cancelEdit2() {
                this.newDepartment = {
                    language_id: '',
                    material_id: '',
                    code: '',
                    days: ''
                };
            },
            openConfirmDialog(id) {
                this.confirmDeleteModalId = id;
                const modal = new bootstrap.Modal(document.getElementById('confirmDeleteModal'));
                modal.show();
            },
            closeConfirmDialog() {
                this.confirmDeleteModalId = null;
                const modal = bootstrap.Modal.getInstance(document.getElementById('confirmDeleteModal'));
                if (modal) modal.hide();
            },
            // 検索フォームでプログラミング言語が選択されている時のみ教材データをフェッチ
            onSearchGroupCompanyChange() {
                if (this.searchSelectedGroupCompanyId) {
                    this.fetchBranchOffices('/materials/' + this.searchSelectedGroupCompanyId, 'filteredBranchOfficesSearch');
                } else {
                // プログラミング言語が選択されていない場合は教材リストを空にする
                    this.filteredBranchOfficesSearch = [];
                }    
            },
            // 新規登録フォームの教材データのフィルタリング
            onNewDepartmentGroupCompanyChange() {
                // プログラミング言語が選択されている時、教材をフィルタリングする
                if (this.newDepartment.language_id) {
                    this.fetchBranchOffices('/materials/' + this.newDepartment.language_id, 'filteredBranchOffices');
                } else {
                // プログラミング言語が選択されていない時、教材のリストを空にして選択不可にする
                    this.filteredBranchOffices = [];
                }
            },
            onEditGroupCompanyChange(groupCompanyId) {
                this.fetchBranchOffices('/materials/' + groupCompanyId, 'branchOffices');
                this.selectedBranchOfficeId = null;
            },
            fetchBranchOffices(url, target) {
                if (!url) return;
                axios.get(url)
                    .then(response => {
                        this[target] = response.data;// branchOffices[]に格納
                    })
                    .catch(error => {
                        this[target] = [];
                    });
            },
            // デフォルトで特定のプログラミング言語に関連する教材だけを表示したい場合
            initializeFilteredBranchOffices() {
                if (this.searchSelectedGroupCompanyId) {// 検索フォームの教材
                    this.fetchBranchOffices(`/materials/${this.searchSelectedGroupCompanyId}`, 'filteredBranchOfficesSearch');
                }
                if (this.newDepartment.language_id) {// 登録フォームの教材
                    this.fetchBranchOffices(`/materials/${this.newDepartment.language_id}`, 'filteredBranchOffices');
                }
            },
            cancelEdit(id) {
                this.editingId = null; // 編集モードを解除
                this.editedDepartment = { // 編集データをリセット
                    language_id: '',
                    material_id: '',
                    code: '',
                    days: ''
                };
            },
            handleInitialData() {
                // IDがある場合初回起動時編集モードにする
                if (this.editingId) {
                    this.editedDepartment = {
                        id: '{{ old('id') }}',
                        language_id: '{{ old('language_id', '') }}',
                        material_id: '{{ old('material_id', '') }}',
                        code: '{{ old('code', '') }}',
                        days: '{{ old('days', '') }}'
                    };
                    this.validationErrors = true;//編集モードのバリデーションメッセージを表示

                    // プログラミング言語IDが設定されている場合に教材データをフェッチ(編集フォームの教材)
                    if (this.editedDepartment.language_id) {
                        this.onEditGroupCompanyChange(this.editedDepartment.language_id);
                        this.selectedBranchOfficeId = this.editedDepartment.material_id;
                    }
                } else {
                    // IDがない場合は新規登録用のデータを設定
                    this.newDepartment = {
                        language_id: '{{ old('language_id') }}',
                        material_id: '{{ old('material_id') }}',
                        code: '{{ old('code') }}',
                        days: '{{ old('days') }}'
                    };
                }
            },
            toggleEditMode(id) {
                this.editingId = id;
                const department = this.allDepartments.data.find(department => department.id === id);
                this.editedDepartment = {
                    ...department
                };
                
                if(this.branch_office_validationErrors) {
                    this.editedDepartment.material_id = '';
                }

                if (this.editedDepartment.language_id) {
                    this.fetchBranchOffices('/materials/' + this.editedDepartment.language_id, 'branchOffices');
                    this.selectedBranchOfficeId = this.editedDepartment.material_id;
                }
            },
            // 選択された教材のIDを使って処理を実行
            onBranchOfficeChange(selectedBranchOfficeId) {
                this.selectedBranchOfficeId = selectedBranchOfficeId;
                this.editedDepartment.material_id = selectedBranchOfficeId;//選択した教材のIDを送信するために代入する
            },
        }
    }).mount('#app');
</script>
@endsection