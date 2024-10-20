<?php

namespace App\Models;

use App\Models\AppModel;
use App\Models\Artifact;
use App\Models\LearningDay;
use App\Models\Material;
// use App\Models\MClientCorporation;
// use App\Enums\EmployeeType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Kyslik\ColumnSortable\Sortable;
// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

/**
 * グループ会社マスタ
 *
 * グループ会社マスタテーブルのモデルクラス
 */
class Language extends AppModel
{
    use Sortable;
    // use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        // 'create_user_id',
        // 'modify_user_id',
    ];
    public $sortable = [
        'name'
    ];

    /**
     * リレーション：支社マスタ
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function material()
    {
        return $this->hasMany(Material::class);
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
     * リレーション：営業部マスタ
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function artifacts()
    {
        return $this->hasMany(Artifact::class);
    }
}
