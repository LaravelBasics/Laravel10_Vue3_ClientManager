<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\LearningDayController;
use App\Http\Controllers\ArtifactController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('portfolio');
});

// グループ会社に関するルート設定
Route::get('languages', [LanguageController::class, 'index'])->name('languages.index');
Route::post('languages/store', [LanguageController::class, 'store'])->name('languages.store');
Route::put('languages/{id}/update', [LanguageController::class, 'update'])->name('languages.update');
Route::delete('languages/{id}/delete', [LanguageController::class, 'destroy'])->name('languages.destroy');

//支社一覧
Route::get('materials', [MaterialController::class, 'index'])->name('materials.index');
Route::post('materials/store', [MaterialController::class, 'store'])->name('materials.store');
Route::put('materials/{id}/update', [MaterialController::class, 'update'])->name('materials.update');
Route::delete('materials/{id}/delete', [MaterialController::class, 'destroy'])->name('materials.destroy');

//営業部一覧
Route::get('learning-days', [LearningDayController::class, 'index'])->name('learning-days.index');
Route::post('learning-days/store', [LearningDayController::class, 'store'])->name('learning-days.store');
Route::put('learning-days/{id}/update', [LearningDayController::class, 'update'])->name('learning-days.update');
Route::delete('learning-days/{id}/delete', [LearningDayController::class, 'destroy'])->name('learning-days.destroy');
// axiosグループ会社一覧に紐付く支社の取得
Route::get('/materials/{groupCompanyId}', [LearningDayController::class, 'getBranchOfficesByGroupCompany']);

//営業課一覧
Route::get('artifacts', [ArtifactController::class, 'index'])->name('artifacts.index');
Route::post('artifacts/store', [ArtifactController::class, 'store'])->name('artifacts.store');
Route::put('artifacts/{id}/update', [ArtifactController::class, 'update'])->name('artifacts.update');
Route::delete('artifacts/{id}/delete', [ArtifactController::class, 'destroy'])->name('artifacts.destroy');
// axiosグループ会社一覧に紐付く支社の取得
Route::get('/materials/{groupCompanyId}', [ArtifactController::class, 'getBranchOfficesByGroupCompany']);
// axios支社一覧に紐付く営業部の取得
Route::get('/learning-days/{branchOfficeId}', [ArtifactController::class, 'getDepartmentsByBranchOffice']);

