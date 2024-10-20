<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('languages', function (Blueprint $table) {
            $table
                ->increments('id')
                ->comment('ID');

            $table
                ->string('name', 50)
                ->comment('プログラミング言語名');

            $table
                ->datetime('created')
                ->comment('作成日時');

            $table
                ->datetime('modified')
                ->comment('更新日時');

            $table
                ->datetime('deleted')
                ->nullable()
                ->default(null)
                ->comment('削除日時');
        });
        // テーブルにコメントを付加
        DB::statement("ALTER TABLE languages COMMENT 'プログラミング言語マスタ'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('languages');
    }
}
