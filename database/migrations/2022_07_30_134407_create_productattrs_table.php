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
        Schema::create('productattrs', function (Blueprint $table) {
            $table->increments('patrr_id')->length(11);
            $table->integer('products_id')->nllable(true)->length(11);
            $table->integer('sku')->nllable(true)->length(11);
            $table->longText('imageatrr');
            $table->integer('price')->length(20);
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
        Schema::dropIfExists('productattrs');
    }
};
