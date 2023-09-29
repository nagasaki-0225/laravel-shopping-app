<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSoftDeletesToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // ①項目を追加
						$table->softDeletes();  // 論理削除フラグ
        });
    }


    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // ②項目を追加
            $table->dropColumn('deleted_at');   // 論理削除フラグ
        });
    }
};


