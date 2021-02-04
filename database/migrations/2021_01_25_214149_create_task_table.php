<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('folder_id')->unsigned();
            $table->string('title',100);
            $table->date('due_date');
            //デフォルト値を１にしている
            //何もしない場合は１の未着手にするため
            $table->integer('status')->default(1);
            $table->timestamps();


            //外部キーを設定する
            //外部キー制約が設定されたカラムには、好き勝手な値は入れられなくなります。
            //小テーブルの外部キー　　　　　　親テーブルの主キー　　　　　親テーブル名
            $table->foreign('folder_id')->references('id')->on('folders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
