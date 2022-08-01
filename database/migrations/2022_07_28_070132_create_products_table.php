<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('product_id')->length(11);
            $table->integer('category_id')->length(11);
            $table->integer('color_id')->length(11);
            $table->integer('coupon_id')->length(11);
            $table->integer('size_id')->length(11);
            $table->string('product_name')->nllable(true)->length(191);
            $table->string('brand_id')->nllable(true)->length(191);
            $table->string('model_id')->nllable(true)->length(191);
            $table->longText('short_desc');
            $table->longText('desc');
            $table->longText('keywords');
            $table->longText('technical_specification');
            $table->longText('uses');
            $table->longText('warranty');
            $table->longText('image1');
            $table->longText('image2');
            $table->longText('image3');
            $table->longText('image4');
            $table->integer('product_status')->length(11);
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
};
