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
        Schema::create('import_history', function (Blueprint $table) {
            $table->id();
            $table->int('quantity_import');
            $table->int('price_import');
            $table->int('price_current');
            $table->foreignId('product_id')->constrained('products');
            $table->timestamp('deleted_at')->nullable();
            $table->foreignId('created_by')->constrained('administrators')->nullable();
            $table->foreignId('updated_by')->constrained('administrators')->nullable();
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
        Schema::dropIfExists('history_product');
    }
};
