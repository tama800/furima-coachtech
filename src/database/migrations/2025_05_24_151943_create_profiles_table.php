<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')  // user_id (bigint unsigned)
                  ->constrained('users')    // 外部キー users(id)
                  ->onDelete('cascade');    // ユーザー削除時に連動削除（任意）
            $table->string('name', 255);         // NOT NULL
            $table->string('postal_code', 8);    // NOT NULL
            $table->string('address', 255);      // NOT NULL
            $table->string('building', 255);     // NOT NULL
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
        Schema::dropIfExists('profiles');
    }
}
