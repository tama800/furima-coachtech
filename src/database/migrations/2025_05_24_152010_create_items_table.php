<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                  ->constrained('users')     // 外部キー users(id)
                  ->onDelete('cascade');     // ユーザー削除時に商品も削除
            $table->string('name', 255);         // 商品名
            $table->string('brand', 255)->nullable();       // ブランド名
            $table->unsignedBigInteger('condition')
                  ->comment('1:良好, 2:目立った傷や汚れなし, 3:やや傷や汚れあり, 4:状態が悪い');
            $table->text('description');            // 商品説明
            $table->string('image', 255);           // 画像パス
            $table->unsignedInteger('price');       // 価格（マイナス不可）
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
