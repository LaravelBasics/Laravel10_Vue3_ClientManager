<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Material;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Requests\MaterialRequest;
// use Database\Factories\MBranchOfficeFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Exception;

class MaterialController extends Controller
{
    public function index(Request $request)
    {
        // 検索条件のキーを配列で定義
        $searchs = ['group_company', 'branch_office_name'];

        // いずれかのGET.検索がフォーム送信された時、セッションにGET値を保存
        if ($request->hasAny($searchs)) {
            $request->session()->put('searchs', $request->only($searchs));
        }

        // ソート検索条件の取得、デフォルトのソート順はグループ会社
        $sort = $request->input('sort', 'language_id');
        $direction = $request->input('direction', 'asc');

        // 検索条件をセッションに保存
        session(['sort' => $sort]);
        session(['direction' => $direction]);

        // セッションに'searchs'の値が一つでも値が保存されているか確認
        if ($request->session()->exists('searchs')) {
            // セッションに保存された検索条件が存在する場合のみ、該当条件をクエリに追加
            $query = Material::query()
                ->with('language')
                ->when(session('searchs.group_company'), function ($q) {
                    $q->where('language_id', session('searchs.group_company'));
                })
                ->when(session('searchs.branch_office_name'), function ($q) {
                    $q->where('title', 'like', '%' . session('searchs.branch_office_name') . '%');
                })
                ->orderBy(session('sort','language_id'), session('direction', 'asc')); //　sessionのソート順を適応(空の場合'asc'昇順)

            $branchOffices = $query->paginate(50);
        } else {
            $branchOffices =  collect(); // セッションに 'searchs' の値が一つも存在しない場合、空のコレクションを返す(初回アクセスは必ず空になる)
        }

        $groupCompanies = Language::orderBy('id')->get();

        return view('materials.index', compact('groupCompanies', 'branchOffices'));
    }

    public function store(MaterialRequest $request)
    {
        DB::beginTransaction(); // トランザクションの開始

        try {
            Material::create([
                'language_id' => $request->input('language_id'),
                'code' => $request->input('code'),
                'title' => $request->input('title'),
            ]);
            DB::commit();
            return redirect()->route('materials.index')
                ->with('flashMessage', '保存しました。')
                ->with('flashStatus', 'success');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('materials.index')
                ->with('flashMessage', '保存に失敗しました。')
                ->with('flashStatus', 'danger');
        }
    }

    public function update(MaterialRequest $request, $id)
    {
        DB::beginTransaction(); // トランザクションの開始

        try {
            $branchOffice = Material::findOrFail($id);
            $branchOffice->update([
                'language_id' => $request->input('language_id'),
                'code' => $request->input('code'),
                'title' => $request->input('title'),
            ]);
            DB::commit();
            return redirect()->route('materials.index')
                ->with('flashMessage', '保存しました。')
                ->with('flashStatus', 'success');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('materials.index')
                ->with('flashMessage', '保存に失敗しました。')
                ->with('flashStatus', 'danger');
        }
    }

    public function destroy($id)
    {
        try {
            $branchOffice = Material::findOrFail($id);

            // 関連データが存在するかをチェック
            if (
                $branchOffice->learningDay()->exists() || // MDepartment モデルとのリレーション
                $branchOffice->artifacts()->exists() // MSection モデルとのリレーション
            ) {
                return redirect()->route('materials.index')
                    ->with('flashMessage', 'この支社に紐付くデータがあるため、削除できません。')
                    ->with('flashStatus', 'danger');
            }

            // 関連データが存在しない場合は削除処理を実行
            $branchOffice->delete();

            return redirect()->route('materials.index')
                ->with('flashMessage', '削除しました。')
                ->with('flashStatus', 'success');
        } catch (\Exception $e) {
            return redirect()->route('materials.index')
                ->with('flashMessage', '削除に失敗しました。')
                ->with('flashStatus', 'danger');
        }
    }
}