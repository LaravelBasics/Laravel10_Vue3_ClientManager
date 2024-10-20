<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use App\Models\AppModel;
use App\Models\Artifact;
use App\Models\Material;
use App\Models\Language;
// use App\Models\EmployeeBelonging;
use Illuminate\Database\Eloquent\Builder;
use Kyslik\ColumnSortable\Sortable;

/**
 * 営業部マスタ
 *
 * 営業部マスタテーブルのモデルクラス
 */
class LearningDay extends AppModel
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
        'code',
        'days',
        // 'create_user_id',
        // 'modify_user_id',
    ];

    public $sortable = [
        'language_id',
        'material_id',
        'code',
        'days',
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
     * リレーション：営業課マスタ
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function artifacts()
    {
        return $this->hasMany(Artifact::class);
    }
}
