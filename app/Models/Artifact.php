<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use App\Models\AppModel;
use App\Models\Material;
use App\Models\Language;
use App\Models\LearningDay;
use Illuminate\Database\Eloquent\Builder;
// use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Kyslik\ColumnSortable\Sortable;

/**
 * 営業課マスタ
 *
 * 営業課マスタテーブルのモデルクラス
 */
class Artifact extends AppModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    use Sortable;

    protected $fillable = [
        'language_id',
        'material_id',
        'learning_day_id',
        'code',
        'artifact_name',
        'tel',
        'fax',
        // 'create_user_id',
        // 'modify_user_id',
    ];

    public $sortable = [
        'language_id',
        'material_id',
        'learning_day_id',
        'code',
        'artifact_name',
        'tel',
        'fax',
    ];
    
    /**
     * リレーション：グループ会社マスタ
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    /**
     * リレーション：支社マスタ
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function material()
    {
        return $this->belongsTo(Material::class);
    }

    /**
     * リレーション：営業部マスタ
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function learningDay()
    {
        return $this->belongsTo(LearningDay::class);
    }
}
