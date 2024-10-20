<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

// return new class extends Migration

class CreateLearningDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('learning_days', function (Blueprint $table) {
            $table
                ->increments('id')
                ->comment('ID');

            $table
                ->unsignedInteger('language_id')
                ->comment('プログラミング言語ID');

            $table
                ->unsignedInteger('material_id')
                ->comment('教材ID');
            $table
                ->string('code', 100)
                ->comment('学習日数コード');

            $table
                ->string('days', 50)
                ->comment('学習日数');
                
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

            $table
                ->foreign('material_id')
                ->on('materials')
                ->references('id');
        });
        DB::statement("ALTER TABLE learning_days COMMENT '学習日数マスタ'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();

        Schema::table('learning_days', function (Blueprint $table) {
            // 外部キーを削除
            $table->dropForeign(['language_id']);
            $table->dropForeign(['material_id']);
        });
        Schema::dropIfExists('learning_days');

        Schema::enableForeignKeyConstraints();
    }
}
