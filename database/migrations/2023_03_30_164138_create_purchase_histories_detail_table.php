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
        Schema::create('purchase_history_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('purchase_history_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('quantity');
            $table->integer('cost');
            $table->timestamps();

            $table->foreign('purchase_history_id')->references('id')->on('purchase_histories')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase_histories_detail');
    }
};
