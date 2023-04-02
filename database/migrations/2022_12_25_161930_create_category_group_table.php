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
        Schema::create('category_group', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('thumb');
            $table->string('poster')->nullable();
            $table->integer('stt');
            $table->string('slug')->unique();
            $table->boolean('is_active')->default(true);
            $table->boolean('is_hot')->default(true);
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
        Schema::dropIfExists('category_group');
    }
};
