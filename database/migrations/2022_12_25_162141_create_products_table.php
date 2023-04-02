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
            $table->string('product_code')->nullable();
            $table->string('thumb');
            $table->longText('summary');
            $table->longText('content');
            $table->integer('price');
            $table->integer('price_current');
            $table->integer('quantity_input')->default(0);
            $table->integer('quantity_output')->default(0);
            $table->integer('discount')->default(0);
            $table->string('brand');
            $table->string('unit');
            $table->string('color')->nullable();
            $table->string('slug')->unique();
            $table->boolean('is_active')->default(1);
            $table->foreignId('category_id')->constrained('categories');
            $table->timestamp('deleted_at')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
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
