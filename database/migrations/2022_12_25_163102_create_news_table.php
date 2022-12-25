<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('summary');
            $table->longText('content');
            $table->string('thumb');
            $table->string('slug')->unique();
            $table->foreignId('category_news_id')->constrained('categories_news');
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
        Schema::dropIfExists('news');
    }
};
