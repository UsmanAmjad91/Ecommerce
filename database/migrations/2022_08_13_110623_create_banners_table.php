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
        Schema::create('banners', function (Blueprint $table) {
            $table->increments('banner_id')->length(11);
            $table->string('banner_image1')->nllable(true)->length(255);
            $table->string('banner_image2')->nllable(true)->length(255); 
            $table->string('btn_text')->nllable(false)->length(50);
            $table->string('btn_link')->nllable(true)->length(40);
            $table->integer('banner_status')->nllable(false)->length(11);
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
        Schema::dropIfExists('banners');
    }
};
