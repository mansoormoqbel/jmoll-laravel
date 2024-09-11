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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->boolean('activation')->default(false);
            $table->decimal('price', 10, 2);
            $table->string('country_made')->nullable();
            $table->integer('quantity');
            $table->boolean('status')->default(false);
            //$table->string('status')->nullable();
            $table->date('created_date')->nullable();
            $table->bigInteger('shop_id')->unsigned();
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('catg_id')->unsigned();
            $table->foreign('catg_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
            
            
            $table->timestamps();
        });
       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
