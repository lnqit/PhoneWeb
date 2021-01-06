<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('content');
            $table->bigInteger('product_id')->unsigned();
            //khai báo quan hệ khóa ngoại
            $table->foreign('product_id')->references('id')->on('products')
                ->onUpdate('cascade')
                ->ondelete('cascade');//cho phép xóa

            $table->bigInteger('ueser_id')->unsigned();
            //khai báo quan hệ khóa ngoại
            $table->foreign('ueser_id')->references('id')->on('users')
                ->onUpdate('cascade')
                ->ondelete('cascade');//cho phép xóa
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
        Schema::dropIfExists('comments');
    }
}
