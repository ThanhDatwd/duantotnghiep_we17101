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
        Schema::create('user_verifycation', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('email');
            $table->string('phone');
            // $table->string('address');
            // $table->string('province')->nullable();
            // $table->string('district')->nullable();
            // $table->string('ward')->nullable();
            // $table->boolean('is_active')->default(1);
            $table->string('password');
            $table->string('verify_email_code');
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
        //
    }
};
