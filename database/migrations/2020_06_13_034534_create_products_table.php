<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_code');
            $table->string('product_name');
            $table->string('product_image');
            $table->string('description');
            $table->integer('price');

            $table->bigInteger('city_id')->unsigned();
            $table->foreign('city_id')->references('id')->on('cities')
                ->onUpdate('cascade')
                ->ondelete('cascade');//cho phép xóa

            $table->bigInteger('brand_id')->unsigned();
            $table->foreign('brand_id')->references('id')->on('brands')
                ->onUpdate('cascade')
                ->ondelete('cascade');//cho phép xóa

            $table->bigInteger('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')
                ->onUpdate('cascade')
                ->ondelete('cascade');//cho phép xóa

            $table->bigInteger('color_id')->unsigned();
            $table->foreign('color_id')->references('id')->on('colors')
                ->onUpdate('cascade')
                ->ondelete('cascade');//cho phép xóa
            
            

            $table->boolean('isDeleted');
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
        Schema::dropIfExists('products');
    }
}
