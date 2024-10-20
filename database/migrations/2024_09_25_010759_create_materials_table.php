<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materials', function (Blueprint $table) {
            $table
                ->increments('id')
                ->comment('ID');

            $table
                ->unsignedInteger('language_id')
                ->comment('プログラミング言語ID'); // プログラミング言語への外部キー

            $table
                ->string('code', 100)
                ->comment('教材コード');

            $table
                ->string('title', 50)
                ->comment('教材名');

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

            // 外部キー
            $table
                ->foreign('language_id')
                ->on('languages')
                ->references('id');
        });
        DB::statement("ALTER TABLE materials COMMENT '教材マスタ'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();

        Schema::table('materials', function (Blueprint $table) {
            // 外部キーを削除
            $table->dropForeign(['language_id']);
        });
        Schema::dropIfExists('materials');

        Schema::enableForeignKeyConstraints();
    }
}
