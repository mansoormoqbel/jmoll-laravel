<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 11, 8);
            $table->string('city');
            $table->string('address');
            $table->string('phone_number');
            $table->decimal('total_price_products', 8, 2);
            $table->decimal('delivery_price', 8, 2);
            $table->decimal('total_amount', 8, 2);
            $table->integer('number_product');
            $table->boolean('order_status')->default(false);
            $table->date('date');
            $table->unsignedBigInteger('driver_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('driver_id')->references('id')->on('driver_infos')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
