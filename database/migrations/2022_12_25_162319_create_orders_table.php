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
     *  id int 
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('status');
            $table->string('total');
            $table->string('payment_type');
            $table->string('fee_ship');
            $table->string('user_name');
            $table->string('email');
            $table->string('province');
            $table->string('district');
            $table->string('ward');
            $table->string('address');
            $table->string('phone');
            $table->string('customer_note')->nullable();
            $table->string('shop_note')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
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
        Schema::dropIfExists('orders');
    }
};
