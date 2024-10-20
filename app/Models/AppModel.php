<?php

namespace App\Models;

// use App\Traits\ModelEvents;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * 共通モデルクラス
 *
 * 基本的にこのクラスを継承して各モデルクラスを作成する
 */
class AppModel extends Model
{
    use SoftDeletes, /*ModelEvents,*/ HasFactory;

    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';
    const DELETED_AT = 'deleted';
    // const CREATED_USER_ID = 'created_user_id';
    // const UPDATED_USER_ID = 'modify_user_id';

}
