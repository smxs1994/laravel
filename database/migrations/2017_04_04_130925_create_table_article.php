<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableArticle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title','64')->unique(); //标题
            $table->string('author','20');//作者
            $table->text('mg_url')->unllable();//图片地址
            //$table->integer('cate_id')->unsigned();//声明外键
            $table->unsignedInteger('cate_id');
            $table->foreign('cate_id')->references('id')->on('cates')->onDelete('cascade');//分类 外键
            $table->text('text');   //文章内容
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
        Schema::dropIfExists('article');
    }
}
