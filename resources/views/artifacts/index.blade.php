@extends('layouts.app')

@section('title', '作成した成果物一覧')

@section('content')
<div class="container mt-4">
    <h1 style="width: 100%; height: auto;
            margin: 0px 0px 20px 0px; padding: 15px 0px;
            background-color: rgb(240, 240, 240);
            font-size: 2em;
            text-align: center;">作成した成果物一覧</h1>
    <div class="mb-4">
        <!-- フラッシュメッセージの表示 -->
        @include('includes.flash-message')

        <button type="button" class="btn btn-link p-0 float-end" @click="showHelpModal"
            style="text-decoration: underline;">
            ？ヘルプ
        </button>
    </div>
    <h4>成果物検索</h4>

    <!-- 検索フォーム -->
    <form action="{{ route('artifacts.index') }}" method="GET" class="mb-4">
        <!-- グループ会社のセレクトボックス -->
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
            <!-- 営業部のセレクトボックス -->
            <div class="d-flex align-items-center" style="margin-left: 1cm; margin-top: 0.5px;">
                <label for="department-search" class="form-label me-2 mb-0">学習日数</label>
                <select id="department-search" name="department_search" class="form-select"
                    style="width: 300px; margin-left: 1cm;" v-model="searchSelectedDepartmentId"
                    :disabled="!searchSelectedBranchOfficeId">
                    <option value=""></option>
                    <option v-for="department in filteredDepartmentsSearch" :key="department.id" :value="department.id">
                        @{{ department.days }}
                    </option>
                </select>
            </div>
        </div>

        <!-- 教材のセレクトボックス -->
        <div class="d-flex align-items-center mb-3">
            <label for="branch-office-search" class="form-label me-2 mb-0">教材</label>
            <select id="branch-office-search" name="branch_office_search" class="form-select"
                style="width: 300px; margin-left: 2.2cm;" v-model="searchSelectedBranchOfficeId"
                @change="onSearchDepartmentChange" :disabled="!searchSelectedGroupCompanyId">
                <option value=""></option>
                <option v-for="office in filteredBranchOfficesSearch" :key="office.id" :value="office.id">
                    @{{ office.title }}
                </option>
            </select>

            {{-- 成果物 --}}
            <div class="d-flex align-items-center" style="margin-left: 1cm;">
                <label for="section-name" class="form-label me-2 mb-0">成果物</label>
                <input type="text" id="section-name" name="section_name" class="form-control"
                    style="width: 300px; margin-left: 1.4cm;"
                    value="{{ old('section_name', session('search_condition.section_name')) }}">
            </div>
        </div>

        <!-- 検索ボタン -->
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary" style="margin-right: 77px;">検索</button>
        </div>
    </form>

    <h5>成果物一覧</h5>

    <div class="d-flex">
        <div class="me-5">
            <a
                href="{{ route('artifacts.index', ['sort' => 'language_id', 'direction' => (session('sort') === 'language_id' && session('direction') === 'asc') ? 'desc' : 'asc']) }}">
                プログラミング言語
            </a>
        </div>
        <div class="me-5" style="margin-left: -0.85cm;">
            <a
                href="{{ route('artifacts.index', ['sort' => 'material_id', 'direction' => (session('sort') === 'material_id' && session('direction') === 'asc') ? 'desc' : 'asc']) }}">
                教材
            </a>
        </div>
        <div class="me-5" style="margin-left: 0.75cm;">
            <a
                href="{{ route('artifacts.index', ['sort' => 'learning_day_id', 'direction' => (session('sort') === 'learning_day_id' && session('direction') === 'asc') ? 'desc' : 'asc']) }}">
                学習日数
            </a>

        </div>
        <div class="me-5" style="margin-left: 0.4cm;">
            <a
                href="{{ route('artifacts.index', ['sort' => 'code', 'direction' => (session('sort') === 'code' && session('direction') === 'asc') ? 'desc' : 'asc']) }}">
                成果物コード
            </a>

        </div>
        <div class="me-5" style="margin-left: -0.65cm;">
            <a
                href="{{ route('artifacts.index', ['sort' => 'artifact_name', 'direction' => (session('sort') === 'artifact_name' && session('direction') === 'asc') ? 'desc' : 'asc']) }}">
                成果物
            </a>

        </div>
        <div class="me-5" style="margin-left: 1.35cm;">
            <a
                href="{{ route('artifacts.index', ['sort' => 'tel', 'direction' => (session('sort') === 'tel' && session('direction') === 'asc') ? 'desc' : 'asc']) }}">
                TEL
            </a>

        </div>
        <div class="me-5" style="margin-left: 2.02cm;">
            <a
                href="{{ route('artifacts.index', ['sort' => 'fax', 'direction' => (session('sort') === 'fax' && session('direction') === 'asc') ? 'desc' : 'asc']) }}">
                FAX
            </a>
        </div>
    </div>

    <!-- 登録フォーム -->
    <form id="store-form-container" action="{{ route('artifacts.store') }}" method="POST" class="mb-4">
        @csrf
        <div class="d-flex align-items-center max-height: 180px;">
            <!-- グループ会社のセレクトボックス -->
            <div class="me-2" style="margin-top: -0.63cm; ">
                <select id="new-group-company" v-model="newSection.language_id" name="language_id"
                    @change="onNewSectionGroupCompanyChange"
                    class="form-select @error('language_id') @else @enderror"
                    style="width: 120px; max-width: 120px;">
                    <option value=""></option>
                    <option v-for="company in groupCompanies" :key="company.id" :value="company.id">
                        @{{ company.name }}
                    </option>
                </select>
                <div v-if="validationErrors == false" style="position: absolute; width: 100%; max-width: 120px;">
                    @error('language_id')
                    <small style="display: block; color: #dc3545;">※ {{ $message }}</small>
                    @enderror
                </div>
            </div>

            <!-- 教材のセレクトボックス -->
            <div class="me-2" style="margin-top: -0.63cm;">
                <select id="new-branch-office" v-model="newSection.material_id" name="material_id"
                    @change="onNewSectionBranchOfficeChange"
                    class="form-select @error('material_id') @else @enderror"
                    :disabled="!newSection.language_id" style="width: 100px; max-width: 100px;">
                    <option value=""></option>
                    <option v-for="office in filteredBranchOffices" :key="office.id" :value="office.id">
                        @{{ office.title }}
                    </option>
                </select>
                <div v-if="validationErrors == false" style="position: absolute; width: 100%; max-width: 100px;">
                    @error('material_id')
                    <small style="display: block; color: #dc3545;">※ {{ $message }}</small>
                    @enderror
                </div>
            </div>

            <!-- 営業部のセレクトボックス -->
            <div class="me-2" style="margin-top: -0.63cm;">
                <select id="new-department" v-model="newSection.learning_day_id" name="learning_day_id"
                    class="form-select @error('learning_day_id') @else @enderror"
                    :disabled="!newSection.material_id" style="width: 120px; max-width: 120px;">
                    <option value=""></option>
                    <option v-for="department in filteredDepartments" :key="department.id" :value="department.id">
                        @{{ department.days }}
                    </option>
                </select>
                <div v-if="validationErrors == false" style="position: absolute; width: 100%; max-width: 120px;">
                    @error('learning_day_id')
                    <small style="display: block; color: #dc3545;">※ {{ $message }}</small>
                    @enderror
                </div>
            </div>

            <!-- 成果物コードの入力フィールド -->
            <div class="me-2" style="margin-left: 0; margin-top: 0.04cm;">
                <input type="text" v-model="newSection.code" id="department-code" name="code" class="form-control
                @error('code') @else @enderror" style="width: 95px; max-width: 95px;">
                <small class="form-text text-muted" style="display: block;">(例) 501002</small>
                <div v-if="validationErrors == false" style="position: absolute; width: 100%; max-width: 95px;">
                    @error('code')
                    <small style="display: block; color: #dc3545;">※ {{ $message }}</small>
                    @enderror
                </div>
            </div>

            <!-- 成果物 -->
            <div class="me-2" style="margin-left: 0; margin-top: 0.04cm;">
                <input type="text" v-model="newSection.artifact_name" id="department-name" name="artifact_name" class="form-control
                @error('artifact_name') @else @enderror" style="width: 140px; max-width: 140px;">
                <small class="form-text text-muted" style="display: block;">(例) 成果物</small>
                <div v-if="validationErrors == false" style="position: absolute; width: 100%; max-width: 140px;">
                    @error('artifact_name')
                    <small style="display: block; color: #dc3545;">※ {{ $message }}</small>
                    @enderror
                </div>
            </div>

            <!-- TEL -->
            <div class="me-2" style="margin-left: 0; margin-top: 0.04cm;">
                <input type="text" v-model="newSection.tel" id="section-tel" name="tel" class="form-control
                @error('tel') @else @enderror" style="width: 140px; max-width: 140px;">
                <small class="form-text text-muted" style="display: block;">(例) 03-0000-0000</small>
                <div v-if="validationErrors == false" style="position: absolute; width: 100%; max-width: 140px;">
                    @error('tel')
                    <small style="display: block; color: #dc3545;">※ {{ $message }}</small>
                    @enderror
                </div>
            </div>

            <!-- FAX -->
            <div class="me-2" style="margin-left: 0; margin-top: 0.04cm;">
                <input type="text" v-model="newSection.fax" id="section-fax" name="fax" class="form-control
                @error('fax') @else @enderror" style="width: 140px; max-width: 140px;">
                <small class="form-text text-muted" style="display: block;">(例) 03-0000-0001</small>
                <div v-if="validationErrors == false" style="position: absolute; width: 100%; max-width: 140px;">
                    @error('fax')
                    <small style="display: block; color: #dc3545;">※ {{ $message }}</small>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary me-2">登録</button>
            <button type="button" @click="cancelEdit2" class="btn btn-outline-primary">キャンセル</button>
        </div>
    </form>

    <!-- 登録済みデータの表示 -->
    @if($sections->isNotEmpty())
    <div class="list-group" style="margin-top:45px; max-height: 180px;">
        @foreach ($sections as $section)
        <div class="list-group-item d-flex align-items-center position-relative"
            style="margin-top: 20px; margin-bottom: 20px; border: none;">
            <!-- 編集モードで表示される部分 -->
            <div v-if="editingId == {{ $section->id }}" class="d-flex align-items-center flex-grow-1"
                style="margin-left: -0.4cm;">
                <!-- グループ会社の選択 -->
                <div class="me-0" style="margin-top: 0m;">
                    <select v-model="editedSection.language_id"
                        @change="onEditGroupCompanyChange($event.target.value)"
                        class="form-control me-2 @error('language_id') @else @enderror"
                        style="width: 120px; max-width: 120px;" required>
                        <option v-for="company in groupCompanies" :key="company.id" :value="company.id">
                            @{{ company.name }}
                        </option>
                    </select>
                    <div v-if="validationErrors == true && editingId == {{ $section->id }}"
                        style="position: absolute; width: 100%; max-width: 120px;">
                        @error('language_id')
                        <small style="display: block; color: #dc3545;">※{{
                            $message }}</small>
                        @enderror
                    </div>
                </div>

                <!-- 支社の選択 -->
                <div class="me-0" style="margin-top: 0cm;">
                    <select @change="onEditBranchOfficeChange($event.target.value)"
                        v-model="editedSection.material_id"
                        class="form-control me-2 @error('material_id') @else @enderror"
                        style="width: 100px; max-width: 100px;" required>
                        <!-- デフォルトの選択肢 -->
                        <option value=""></option>
                        <option v-for="office in branchOffices" :key="office.id" :value="office.id">
                            @{{ office.title }}
                        </option>
                    </select>
                    
                    <div v-if="validationErrors == true && editingId == {{ $section->id }} && editedSection.material_id != null"
                        style="position: absolute; width: 100%; max-width: 100px;">
                        @error('material_id')
                        <small style="display: block; color: #dc3545;">※ {{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <!-- 営業部の選択 -->
                <div class="me-0" style="margin-top: 0cm;">
                    <select @change="onDepartmentChange($event.target.value)"
                        v-model="editedSection.learning_day_id"
                        class="form-control me-2 @error('learning_day_id') @else @enderror"
                        style="width: 120px; max-width: 120px;">
                        <!-- デフォルトの選択肢 -->
                        <option value=""></option>
                        <option v-for="department in departments" :key="department.id" :value="department.id">
                            @{{ department.days }}
                        </option>
                    </select>
                    
                    <div v-if="validationErrors == true && editingId == {{ $section->id }} && editedSection.learning_day_id != null"
                        style="position: absolute; width: 100%; max-width: 120px;">
                        @error('learning_day_id')
                        <small style="display: block; color: #dc3545;">※ {{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <!-- 成果物コードの入力フィールド -->
                <div class="me-0" style="margin-left: 0; margin-top: 0cm;">
                    <input v-model="editedSection.code" class="form-control me-2 @error('code') @else @enderror"
                        placeholder="成果物コード" style="width: 95px; max-width: 95px;">
                    <div v-if="validationErrors == true && editingId == {{ $section->id }}"
                        style="position: absolute; width: 100%; max-width: 95px;">
                        @error('code')
                        <small style="display: block; color: #dc3545;">※{{
                            $message }}</small>
                        @enderror
                    </div>
                </div>

                <!-- 成果物の入力フィールド -->
                <div class="me-0" style="margin-left: 0; margin-top: 0cm;">
                    <input v-model="editedSection.artifact_name" class="form-control me-2 @error('artifact_name') @else @enderror"
                        placeholder="成果物" style="width: 140px; max-width: 140px;">
                    <div v-if="validationErrors == true && editingId == {{ $section->id }}"
                        style="position: absolute; width: 100%; max-width: 140px;">
                        @error('artifact_name')
                        <small style="display: block; color: #dc3545;">※{{
                            $message }}</small>
                        @enderror
                    </div>
                </div>

                <!-- TELの入力フィールド -->
                <div class="me-0" style="margin-left: 0; margin-top: 0cm;">
                    <input v-model="editedSection.tel" class="form-control me-2 @error('tel') @else @enderror"
                        placeholder="tel" style="width: 140px; max-width: 140px;">
                    <div v-if="validationErrors == true && editingId == {{ $section->id }}"
                        style="position: absolute; width: 100%; max-width: 140px;">
                        @error('tel')
                        <small style="display: block; color: #dc3545;">※{{
                            $message }}</small>
                        @enderror
                    </div>
                </div>

                <!-- FAXの入力フィールド -->
                <div class="me-0" style="margin-left: 0; margin-top: 0cm;">
                    <input v-model="editedSection.fax" class="form-control me-2 @error('fax') @else @enderror"
                        placeholder="fax" style="width: 140px; max-width: 140px;">
                    <div v-if="validationErrors == true && editingId == {{ $section->id }}"
                        style="position: absolute; width: 100%; max-width: 140px;">
                        @error('fax')
                        <small style="display: block; color: #dc3545;">※{{
                            $message }}</small>
                        @enderror
                    </div>
                </div>

                <!-- 編集モード中に送信する情報 -->
                <div class="position-absolute" style="top: 50%; right: 10px; transform: translateY(-50%);">
                    <form :action="`{{ route('artifacts.update', ':id') }}`.replace(':id', editingId)" method="POST"
                        class="d-inline">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="editing_id" :value="editingId">
                        <input type="hidden" name="language_id" :value="editedSection.language_id">
                        <input type="hidden" name="material_id" :value="selectedBranchOfficeId">
                        <input type="hidden" name="learning_day_id" :value="selectedDepartmentId">
                        <input type="hidden" name="code" :value="editedSection.code">
                        <input type="hidden" name="artifact_name" :value="editedSection.artifact_name">
                        <input type="hidden" name="tel" :value="editedSection.tel">
                        <input type="hidden" name="fax" :value="editedSection.fax">
                        <button type="submit" class="btn btn-success me-2">登録</button>
                    </form>
                    <button type="button" @click="cancelEdit({{ $section->id }})"
                        class="btn btn-secondary">キャンセル</button>
                </div>
            </div>

            <!-- 編集モードでない場合に表示される部分 -->
            <div v-else class="d-flex align-items-center flex-grow-1" style="margin-left: -0.1cm;">
                <div class="d-flex" style="width: 120px; text-align: left; margin-right: 0.5cm;">
                    <span>{{ $section->language->name }}</span>
                </div>
                <div class="d-flex" style="width: 100px; text-align: left; margin-right: 0.3cm;">
                    <span>{{ $section->material->title }}</span>
                </div>
                <div class="d-flex" style="width: 120px; text-align: left; margin-right: 0.3cm;">
                    @if($section->learningDay && $section->learningDay->days)
                    <span>{{ $section->learningDay->days }}</span>
                    @else
                    <span></span>
                    @endif
                </div>
                <div class="d-flex" style="width: 95px; text-align: center; margin-right: 0cm;">
                    <span>{{ $section->code }}</span>
                </div>
                <div class="d-flex" style="width: 140px; text-align: right;">
                    <span>{{ $section->artifact_name }}</span>
                </div>
                <div class="d-flex" style="width: 140px; text-align: right;">
                    <span>{{ $section->tel }}</span>
                </div>
                <div class="d-flex" style="width: 140px; text-align: right;">
                    <span>{{ $section->fax }}</span>
                </div>
                <!-- 編集、削除ボタン -->
                <div class="position-absolute" style="top: 50%; right: 10px; transform: translateY(-50%);">
                    <button @click="toggleEditMode({{ $section->id }})" class="btn btn-primary me-2">編集</button>
                    <button @click="openConfirmDialog({{ $section->id }})" class="btn btn-outline-danger">削除</button>
                </div>
            </div>
        </div>
        <hr>
        @endforeach
        <!-- ページネーション -->
        {{ $sections->appends(request()->except('page'))->links() }}

        <!-- 現在の表示範囲と合計件数の表示 -->
        <div class="text-end mt-2">
            <p>
                {{ $sections->firstItem() }} - {{ $sections->lastItem() }} / {{ $sections->total() }} 件
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
                    成果物をシステムから削除します。削除すると、元には戻せません。<br>本当によろしいですか？
                </div>
                <div class="modal-footer">
                    <!-- フォーム送信、OK、キャンセルボタン -->
                    <form :action="`{{ route('artifacts.destroy', ':id') }}`.replace(':id', confirmDeleteModalId)"
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
    <div class="modal fade" id="helpModal" tabindex="-1" aria-labelledby="helpModalLabel" aria-hidden="true">
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
                branch_office_validationErrors: false, // バリデーションエラーメッセージ支社専用
                validationErrors: false, // バリデーションエラーメッセージ用
                allSections: @json($sections),
                groupCompanies: @json($groupCompanies),
                branchOffices: [],
                departments: [],
                editingId: '{{ old('editing_id') }}',
                confirmDeleteModalId: null,
                searchSelectedGroupCompanyId: '{{ session('search_condition.group_company_search') }}',
                searchSelectedBranchOfficeId: '{{ session('search_condition.branch_office_search') }}',
                searchSelectedDepartmentId: '{{ session('search_condition.department_search') }}',
                filteredBranchOfficesSearch: [],// 検索結果用の支社データ
                filteredBranchOffices: [], // 新規登録用の支社データ
                filteredDepartmentsSearch: [],// 検索結果用の営業部データ
                filteredDepartments: [], // 新規登録用の営業部データ
                newSection: {
                    language_id: null,
                    material_id: null,
                    learning_day_id: null,
                    code: '',
                    artifact_name: '',
                    tel: '',
                    fax: '',
                },
                editedSection: {
                    id: null,
                    language_id: null,
                    material_id: null,
                    learning_day_id: null,
                    code: '',
                    artifact_name: '',
                    tel: '',
                    fax: '',
                },
                selectedBranchOfficeId: '{{ old('selectedBranchOfficeId') }}', // 選択された支社のID(送信する時のデータ)
                selectedDepartmentId: '{{ old('selectedDepartmentId') }}', // 選択された営業部のID(送信する時のデータ)
            };
        },
        // 画面が表示された後自動で実行される処理
        mounted() {
            this.handleInitialData();
            this.initializeFilteredBranchOffices();
            this.initializeFilteredDepartments();
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
                this.newSection = {
                    language_id: '',
                    material_id: '',
                    learning_day_id: '',
                    code: '',
                    artifact_name: '',
                    tel: '',
                    fax: '',
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
            // 検索フォームでグループ会社が選択されている時のみ支社データをフェッチ
            onSearchGroupCompanyChange() {
                if (this.searchSelectedGroupCompanyId) {
                    this.searchSelectedDepartmentId = null;//営業部は空にする
                    this.searchSelectedBranchOfficeId = null;
                    this.fetchBranchOffices('/materials/' + this.searchSelectedGroupCompanyId, 'filteredBranchOfficesSearch');
                } else {
                    // グループ会社が選択されていない場合は支社リスト、営業部を空にする
                    this.filteredBranchOfficesSearch = [];
                    this.searchSelectedDepartmentId = null;//営業部は空にする
                }    
            },
            // 検索フォームで支社が選択されている時のみ営業部データをフェッチ
            onSearchDepartmentChange() {
                if (this.searchSelectedBranchOfficeId) {
                    this.fetchDepartments('/learning-days/' + this.searchSelectedBranchOfficeId, 'filteredDepartmentsSearch');
                } else {
                    // 支社が選択されていない場合、営業部は空にする
                    this.searchSelectedDepartmentId = '';
                }
            },
            // 新規登録フォームの支社データのフィルタリング
            onNewSectionGroupCompanyChange() {
                // グループ会社が選択されている時、支社をフィルタリングする
                if (this.newSection.language_id) {
                    this.newSection.material_id = null;
                    this.newSection.learning_day_id = null;
                    this.fetchBranchOffices('/materials/' + this.newSection.language_id, 'filteredBranchOffices');
                } else {
                // グループ会社が選択されていない時、支社のリストを空にして選択不可にする
                    this.filteredBranchOffices = [];
                    this.newSection.learning_day_id = null;
                }
            },
            // 新規登録フォームの営業部のフィルタリング
            onNewSectionBranchOfficeChange() {
                // 支社が選択されている時、営業部をフィルタリングする
                if (this.newSection.material_id) {
                    this.newSection.learning_day_id = null;
                    this.fetchDepartments('/learning-days/' + this.newSection.material_id, 'filteredDepartments');
                } else {
                // 支社が選択されていない時、営業部のリストを空にする
                    this.filteredDepartments = [];
                }
            },
            onEditGroupCompanyChange(groupCompanyId) {
                this.selectedBranchOfficeId = null;
                const editedSection_material_id = this.editedSection.material_id;
                this.editedSection.material_id = null;
                this.fetchBranchOffices('/materials/' + groupCompanyId, 'branchOffices');
                this.editedSection.material_id = editedSection_material_id;
            },
            onEditBranchOfficeChange(branchOfficeId) {
                const editedSection_learning_day_id = this.editedSection.learning_day_id;
                this.editedSection.learning_day_id = null;
                this.fetchDepartments('/learning-days/' + branchOfficeId , 'departments');
                this.editedSection.learning_day_id = editedSection_learning_day_id;
            },
            fetchBranchOffices(url, target) {
                if (!url) return;
                axios.get(url)
                    .then(response => {
                        this[target] = response.data;
                    })
                    .catch(error => {
                        this[target] = [];
                    });
            },
            fetchDepartments(url, target) {
                if (!url) return;
                axios.get(url)
                    .then(response => {
                        this[target] = response.data;
                    })
                    .catch(error => {
                        this[target] = [];
                    });
            },
            // デフォルトで特定のグループ会社に関連する支社だけを表示したい場合
            initializeFilteredBranchOffices() {
                if (this.searchSelectedGroupCompanyId) {// 検索フォームの支社
                    this.fetchBranchOffices(`/materials/${this.searchSelectedGroupCompanyId}`, 'filteredBranchOfficesSearch');
                }
                if (this.newSection.language_id) {// 登録フォームの支社
                    this.fetchBranchOffices(`/materials/${this.newSection.language_id}`, 'filteredBranchOffices');
                }
            },
            // デフォルトで特定の支社に関連する営業部だけを表示したい場合
            initializeFilteredDepartments() {
                if (this.searchSelectedBranchOfficeId) {//検索フォームの営業部
                    this.fetchDepartments(`/learning-days/${this.searchSelectedBranchOfficeId}`, 'filteredDepartmentsSearch');
                }
                if (this.newSection.material_id) {//登録フォームの営業部
                    this.fetchDepartments(`/learning-days/${this.newSection.material_id}`, 'filteredDepartments');
                }
            },
            cancelEdit(id) {
                this.editingId = null; // 編集モードを解除
                this.editedSection = { // 編集データをリセット
                    language_id: '',
                    material_id: '',
                    learning_day_id: '',
                    code: '',
                    artifact_name: '',
                    tel: '',
                    fax: '',
                };
            },
            handleInitialData() {
                // IDがある場合初回起動時編集モードにする
                if (this.editingId) {
                    this.editedSection = {
                        id: '{{ old('id') }}',
                        language_id: '{{ old('language_id', '') }}',
                        material_id: '{{ old('material_id', '') }}',
                        learning_day_id: '{{ old('learning_day_id', '') }}',
                        code: '{{ old('code', '') }}',
                        artifact_name: '{{ old('artifact_name', '') }}',
                        tel: '{{ old('tel', '') }}',
                        fax: '{{ old('fax', '') }}',
                    };
                    this.validationErrors = true;//編集モードのバリデーションメッセージを表示

                    // グループ会社IDが設定されている場合に支社データをフェッチ(編集フォームの支社)
                    if (this.editedSection.language_id) {
                        this.onEditGroupCompanyChange(this.editedSection.language_id);
                        this.selectedBranchOfficeId = this.editedSection.material_id;
                    }

                    // 支社IDが設定されている場合に営業部データをフェッチ(編集フォームの営業部)
                    if (this.editedSection.material_id) {
                        this.onEditBranchOfficeChange(this.editedSection.material_id);
                        this.selectedDepartmentId = this.editedSection.learning_day_id;
                    }
                } else {
                    // IDがない場合は新規登録用のデータを設定
                    this.newSection = {
                        language_id: '{{ old('language_id', '') }}',
                        material_id: '{{ old('material_id', '') }}',
                        learning_day_id: '{{ old('learning_day_id', '') }}',
                        code: '{{ old('code', '') }}',
                        artifact_name: '{{ old('artifact_name', '') }}',
                        tel: '{{ old('tel', '') }}',
                        fax: '{{ old('fax', '') }}',
                    };
                }
            },
            toggleEditMode(id) {
                this.editingId = id;
                const section = this.allSections.data.find(section => section.id === id);
                this.editedSection = {
                    ...section
                };
                
                if(this.branch_office_validationErrors) {
                    this.editedSection.material_id = '';
                }

                if (this.editedSection.language_id) {// グループ会社があるとき紐付く支社を呼ぶ
                    this.fetchBranchOffices('/materials/' + this.editedSection.language_id, 'branchOffices');
                    this.selectedBranchOfficeId = this.editedSection.material_id;
                }

                if(this.editedSection.material_id) {//支社があるとき紐付く営業部を呼ぶ
                    this.fetchDepartments('/learning-days/' + this.editedSection.material_id, 'departments');
                    this.selectedDepartmentId = this.editedSection.learning_day_id;
                }
            },
            // 選択された支社のIDを使って処理を実行
            onBranchOfficeChange(selectedBranchOfficeId) {
                this.selectedBranchOfficeId = selectedBranchOfficeId;
                this.editedSection.material_id = selectedBranchOfficeId;//選択した支社のIDを送信するために代入する
            },
            onDepartmentChange(selectedDepartmentId) {
                this.selectedDepartmentId = selectedDepartmentId;
                this.editedSection.learning_day_id = selectedDepartmentId;//選択した営業部Dを送信するために代入
            }
        },
    }).mount('#app');
</script>
@endsection