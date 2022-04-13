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
        Schema::create('product_products', function (Blueprint $table) {
            $table->unsignedBigInteger('main_product_id');
            $table->unsignedBigInteger('sub_product_id');

            $table->foreign('main_product_id')->references('id')->on('products');
            $table->foreign('sub_product_id')->references('id')->on('products');

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
        Schema::dropIfExists('product_products');
    }
};
