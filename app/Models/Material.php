<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use App\Models\AppModel;
use App\Models\Artifact;
use App\Models\LearningDay;
use App\Models\Language;
use Kyslik\ColumnSortable\Sortable;

/**
 * 支社マスタ
 *
 * 支社マスタテーブルのモデルクラス
 */
class Material extends AppModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    use Sortable;
    // use HasFactory;

    protected $fillable = [
        'language_id',
        'code',
        'title',
        // 'create_user_id',
        // 'modify_user_id',
    ];

    public $sortable = [
        'language_id',
        'code',
        'title',
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
     * リレーション：営業部マスタ
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function learningDay()
    {
        return $this->hasMany(LearningDay::class);
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
