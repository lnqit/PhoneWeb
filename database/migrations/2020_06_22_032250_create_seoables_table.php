<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeoablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seoables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('desc',9999);
            $table->text('keywords');
            //seoble_id là thuộc field nào
            $table->bigInteger('seoble_id');
            //type là thuộc model nào
            $table->string('seoble_type');
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
        Schema::dropIfExists('seoables');
    }
}
