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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('thumb');
            $table->string('type');
            $table->string('stt');
            $table->string('is_active')->default(1);
            $table->foreignId('category_group_id')->constrained('category_group');
            $table->string('slug')->unique();
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
        Schema::dropIfExists('categories');
    }
};
