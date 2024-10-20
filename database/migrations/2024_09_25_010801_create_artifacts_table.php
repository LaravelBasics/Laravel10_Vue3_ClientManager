<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateArtifactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artifacts', function (Blueprint $table) {
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
                ->unsignedInteger('learning_day_id')
                ->nullable()
                ->default(null)
                ->comment('学習日数ID');

            $table
                ->string('code', 100)
                ->comment('成果物コード');

            $table
                ->string('artifact_name', 50)
                ->comment('成果物の名前');

            $table
                ->string('tel', 15)
                ->comment('TEL');

            $table
                ->string('fax', 15)
                ->nullable()
                ->default(null)
                ->comment('FAX');

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

            $table
                ->foreign('learning_day_id')
                ->on('learning_days')
                ->references('id');
        });
        // DB::statement("ALTER TABLE artifacts COMMENT '成果物マスタ'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();

        Schema::table('artifacts', function (Blueprint $table) {
            // 外部キーを削除
            $table->dropForeign(['language_id']);
            $table->dropForeign(['material_id']);
            $table->dropForeign(['learning_day_id']);
        });
        Schema::dropIfExists('artifacts');

        Schema::enableForeignKeyConstraints();
    }
}
