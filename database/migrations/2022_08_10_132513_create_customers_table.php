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
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('customer_id')->length(11);
            $table->string('name')->nllable(true)->length(191);
            $table->string('email')->unique()->nllable(true)->length(191); 
            $table->string('password')->nllable(true)->length(191);
            $table->string('mobile')->nllable(true)->length(191);
            $table->string('address')->nllable(true)->length(191);
            $table->string('country')->nllable(true)->length(191);
            $table->string('city')->nllable(true)->length(191);
            $table->string('state')->nllable(true)->length(191);
            $table->string('zip')->nllable(true)->length(191);
            $table->string('company')->nllable(true)->length(191);
            $table->string('gstin')->nllable(true)->length(191);
            $table->tinyInteger('status')->nllable(true)->length(5);
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
        Schema::dropIfExists('customers');
    }
};
