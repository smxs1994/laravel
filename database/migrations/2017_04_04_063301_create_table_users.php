<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('UserName','50')->unique(); //用户名
            $table->string('email','50')->unique()->nullable();//邮箱
            $table->text('avatar_url')->nullable();//图片地址
            $table->string('phone','50')->unique()->nullable();//手机号
            $table->string('PassWord');//用户密码
            $table->text('intro')->nullable();   //用户介绍
            $table->timestamps();//创建时间 修改时间
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
