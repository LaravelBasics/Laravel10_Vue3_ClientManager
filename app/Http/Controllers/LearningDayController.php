<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Material;
use App\Models\Language;
use App\Models\LearningDay;
use App\Http\Requests\LearningDayRequest;
use Illuminate\Support\Facades\DB;
use Exception;

class LearningDayController extends Controller
{
    public function index(Request $request)
    {
        // 検索条件のキーを配列で定義
        $searchKeys = ['group_company_search', 'branch_office_search', 'department_name'];

        // いずれかのGET.検索がフォーム送信された時、セッションにGET値を保存
        if ($request->hasAny($searchKeys)) {
            $request->session()->put('search_conditions', $request->only($searchKeys));
        }

        // ソート検索条件の取得、デフォルトのソート順はグループ会社
        $sort = $request->input('sort', 'language_id');
        $direction = $request->input('direction', 'asc');

        // ソートの検索条件をセッションに保存
        session(['sort' => $sort]);
        session(['direction' => $direction]);

        // セッションに'search_conditions'の値が一つでも値が保存されているか確認
        if ($request->session()->exists('search_conditions')) {
            // セッションに保存された検索条件が存在する場合のみ、該当条件をクエリに追加
            $query = LearningDay::query()
                ->with(['language', 'material'])
                ->when(session('search_conditions.group_company_search'), function ($q) {
                    $q->where('language_id', session('search_conditions.group_company_search'));
                })
                ->when(session('search_conditions.branch_office_search'), function ($q) {
                    $q->where('material_id', session('search_conditions.branch_office_search'));
                })
                ->when(session('search_conditions.department_name'), function ($q) {
                    $q->where('days', 'like', '%' . session('search_conditions.department_name') . '%');
                })
                ->orderBy(session('sort', 'language_id'), session('direction', 'asc')); //　sessionのソート順を適応(空の場合'asc'昇順)

            $departments = $query->paginate(50);
        } else {
            $departments =  collect(); // セッションに 'search_conditions' の値が一つも存在しない場合、空のコレクションを返す(初回アクセスは必ず空になる)
        }

        $groupCompanies = Language::orderBy('id')->get(); //　セレクトボックス用に取得

        return view('learning-days.index', compact('departments', 'groupCompanies'));
    }

    public function store(LearningDayRequest $request)
    {
        DB::beginTransaction(); // トランザクションの開始

        try {
            LearningDay::create([
                'language_id' => $request->input('language_id'),
                'material_id' => $request->input('material_id'),
                'code' => $request->input('code'),
                'days' => $request->input('days'),
            ]);

            DB::commit();

            return redirect()->route('learning-days.index')->with('flashMessage', '保存しました。')->with('flashStatus', 'success');

        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('learning-days.index')->with('flashMessage', '保存に失敗しました。')->with('flashStatus', 'danger');
        }
    }

    public function update(LearningDayRequest $request, $id)
    {
        DB::beginTransaction(); // トランザクションの開始

        try {
            $department = LearningDay::findOrFail($id);
            $department->update([
                'language_id' => $request->input('language_id'),
                'material_id' => $request->input('material_id'),
                'code' => $request->input('code'),
                'days' => $request->input('days'),
            ]);

            DB::commit();

            return redirect()->route('learning-days.index')->with('flashMessage', '保存しました。')->with('flashStatus', 'success');

        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('learning-days.index')->with('flashMessage', '保存に失敗しました。')->with('flashStatus', 'danger');
        }
    }

    public function destroy($id)
    {
        try {
            $department = LearningDay::findOrFail($id);

            // 関連データのチェック
            if (
                $department->artifacts()->exists() // MSection モデルとのリレーション
            ) {
                return redirect()->route('learning-days.index')->with('flashMessage', 'この営業部に紐付くデータがあるため、削除できません。')->with('flashStatus', 'danger');
            }

            $department->delete();

            return redirect()->route('learning-days.index')->with('flashMessage', '削除しました。')->with('flashStatus', 'success');

        } catch (Exception $e) {
            return redirect()->route('learning-days.index')->with('flashMessage', '削除に失敗しました。')->with('flashStatus', 'danger');
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
}