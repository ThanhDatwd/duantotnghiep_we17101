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
            $table->id();
            $table->string('name');
            $table->string('thumb');
            $table->longText('summary');
            $table->longText('content');
            $table->integer('price');
            $table->string('price_format');
            $table->integer('promotional_price');
            $table->string('promotional_price_format');
            $table->integer('quantity_input');
            $table->integer('quantity_output');
            $table->integer('discount');
            $table->string('brand');
            $table->string('unit');
            $table->string('color');
            $table->string('slug')->unique();
            $table->boolean('is_active')->default(1);
            $table->timestamp('deleted_at')->nullable();
            $table->string('created_by')->default(null);
            $table->string('updated_by')->default(null);
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
