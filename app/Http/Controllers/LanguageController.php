<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Requests\LanguageRequest;
use Illuminate\Support\Facades\DB;
use Exception;

class LanguageController extends Controller
{
    public function index(Request $request)
    {
        // GET.検索が存在する場合、セッションにGET値を保存       　　　
        if ($request->has('company_search')) {
            session(['company_search' => $request->input('company_search')]);
        }

        $sortOrder = $request->input('sort', 'asc');// ソート順の取得、デフォルトは'asc'（昇順）
        session(['sortOrder' => $sortOrder]);// セッションに保存

        // セッションに'company_search'が存在する場合のみ、検索条件を適用
        if ($request->session()->exists('company_search')) {
            $query = Language::query()
                ->where('name', 'like', '%' . session('company_search') . '%') // sessionから検索条件を適用
                ->orderBy('name', session('sortOrder', 'asc')); // セッションが空なら 'asc' をデフォルトにする

            $groupCompanies = $query->paginate(50);  // ページネーションで結果を取得
        } else {
            $groupCompanies = collect();// セッションに 'company_search' が存在しない場合、空のコレクションを返す(初回アクセスは必ず空になる)
        }

        return view('languages.index', compact('groupCompanies'));
    }

    public function store(LanguageRequest $request)
    {
        try {
            Language::create([
                'name' => $request->input('company_name'),
            ]);
            return redirect()->route('languages.index')
                ->with('flashMessage', '保存しました。')
                ->with('flashStatus', 'success');
        } catch (Exception $e) {
            return redirect()->route('languages.index')
                ->with('flashMessage', '保存に失敗しました。')
                ->with('flashStatus', 'danger');
        }
    }

    public function update(LanguageRequest $request, $id)
    {
        DB::beginTransaction(); // トランザクションの開始

        try {
            $groupCompany = Language::findOrFail($id);
            $groupCompany->update([
                'name' => $request->input('company_name'),
            ]);
            DB::commit();
            return redirect()->route('languages.index')
                ->with('flashMessage', '保存しました。')
                ->with('flashStatus', 'success');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('languages.index')
                ->with('flashMessage', '保存に失敗しました。')
                ->with('flashStatus', 'danger');
        }
    }

    public function destroy($id)
    {
        try {
            $groupCompany = Language::findOrFail($id);

            // 関連データが存在するかをチェック
            if (
                $groupCompany->material()->exists() ||
                $groupCompany->learningDay()->exists() ||
                $groupCompany->artifacts()->exists()
            ) {
                // 関連データが存在する場合は削除をキャンセルし、フラッシュメッセージを設定
                return redirect()->route('languages.index')
                    ->with('flashMessage', 'このグループ会社に紐付くデータがあるため、削除できません。')
                    ->with('flashStatus', 'danger');
            }

            // 関連データが存在しない場合は削除処理を実行
            $groupCompany->delete();

            return redirect()->route('languages.index')
                ->with('flashMessage', '削除しました。')
                ->with('flashStatus', 'success');
        } catch (\Exception $e) {
            return redirect()->route('languages.index')
                ->with('flashMessage', '削除に失敗しました。')
                ->with('flashStatus', 'danger');
        }
    }
}
