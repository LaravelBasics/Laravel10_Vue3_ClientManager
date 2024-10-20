<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Material;
use App\Models\Language;
use App\Models\LearningDay;
use App\Models\Artifact;
use App\Http\Requests\ArtifactRequest;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Log;

class ArtifactController extends Controller
{
    public function index(Request $request)
    {
        // 検索条件のキーを配列で定義
        $searchKey = ['group_company_search', 'branch_office_search', 'department_search', 'section_name'];

        // いずれかのGET.検索がフォーム送信された時、セッションにGET値を保存
        if ($request->hasAny($searchKey)) {
            $request->session()->put('search_condition', $request->only($searchKey));
        }

        // ソート検索条件の取得、デフォルトのソート順はグループ会社
        $sort = $request->input('sort', 'language_id');
        $direction = $request->input('direction', 'asc');

        // ソートの検索条件をセッションに保存
        session(['sort' => $sort]);
        session(['direction' => $direction]);

        // セッションに'search_condition'の値が一つでも値が保存されているか確認
        if ($request->session()->exists('search_condition')) {
            // セッションに保存された検索条件が存在する場合のみ、該当条件をクエリに追加
            $query = Artifact::query()
                ->with(['language', 'material'])
                ->when(session('search_condition.group_company_search'), function ($q) {
                    $q->where('language_id', session('search_condition.group_company_search'));
                })
                ->when(session('search_condition.branch_office_search'), function ($q) {
                    $q->where('material_id', session('search_condition.branch_office_search'));
                })
                ->when(session('search_condition.department_search'), function ($q) {
                    $q->where('learning_day_id', session('search_condition.department_search'));
                })
                ->when(session('search_condition.section_name'), function ($q) {
                    $q->where('artifact_name', 'like', '%' . session('search_condition.section_name') . '%');
                })
                ->orderBy(session('sort', 'language_id'), session('direction', 'asc')); //　sessionのソート順を適応(空の場合'asc'昇順)

            $sections = $query->paginate(50);
        } else {
            $sections =  collect(); // セッションに 'search_condition' の値が一つも存在しない場合、空のコレクションを返す(初回アクセスは必ず空になる)
        }

        $groupCompanies = Language::orderBy('id')->get(); //　セレクトボックス用に取得

        return view('artifacts.index', compact('sections', 'groupCompanies'));
    }

    public function store(ArtifactRequest $request)
    {
        DB::beginTransaction(); // トランザクションの開始
        
        try {
            Artifact::create([
                'language_id' => $request->input('language_id'),
                'material_id' => $request->input('material_id'),
                'learning_day_id' => $request->input('learning_day_id'),
                'code' => $request->input('code'),
                'artifact_name' => $request->input('artifact_name'),
                'tel' => $request->input('tel'),
                'fax' => $request->input('fax'),
            ]);

            DB::commit();

            return redirect()->route('artifacts.index')->with('flashMessage', '保存しました。')->with('flashStatus', 'success');
        } catch (Exception $e) {
            // Log::error($e->getMessage()); // エラーメッセージをログに記録
            DB::rollBack();
            return redirect()->route('artifacts.index')->with('flashMessage', '保存に失敗しました。')->with('flashStatus', 'danger');
        }
    }

    public function update(ArtifactRequest $request, $id)
    {
        DB::beginTransaction(); // トランザクションの開始

        try {
            $sections = Artifact::findOrFail($id);
            $sections->update([
                'language_id' => $request->input('language_id'),
                'material_id' => $request->input('material_id'),
                'learning_day_id' => $request->input('learning_day_id'),
                'code' => $request->input('code'),
                'artifact_name' => $request->input('artifact_name'),
                'tel' => $request->input('tel'),
                'fax' => $request->input('fax'),
            ]);

            DB::commit();

            return redirect()->route('artifacts.index')->with('flashMessage', '保存しました。')->with('flashStatus', 'success');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('artifacts.index')->with('flashMessage', '保存に失敗しました。')->with('flashStatus', 'danger');
        }
    }

    public function destroy($id)
    {
        try {
            $sections = Artifact::findOrFail($id);

            $sections->delete();

            return redirect()->route('artifacts.index')->with('flashMessage', '削除しました。')->with('flashStatus', 'success');
        } catch (Exception $e) {
            return redirect()->route('artifacts.index')->with('flashMessage', '削除に失敗しました。')->with('flashStatus', 'danger');
        }
    }

    public function getBranchOfficesByGroupCompany($groupCompanyId)
    {
        // グループ会社IDに基づいて支社をフィルタリング
        $branchOffices = Material::where('language_id', $groupCompanyId)
            ->orderBy('id')
            ->get();

        return response()->json($branchOffices);
    }

    public function getDepartmentsByBranchOffice($branchOfficeId)
    {
        // 支社IDに基づいて営業部をフィルタリング
        $departments = LearningDay::where('material_id', $branchOfficeId)
            ->orderBy('id')
            ->get();

        return response()->json($departments);
    }
}
