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
       /*  Schema::create('shop_validity', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        }); */
        Schema::create('shop_validity', function (Blueprint $table) {
            $table->id();
            $table->text('body');
            $table->unsignedBigInteger('shop_id');
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade');
            $table->timestamps();
        });

        // Create 'shop_validity_docs' table
        Schema::create('shop_validity_docs', function (Blueprint $table) {
            $table->id();
            $table->string('filename');
            $table->unsignedBigInteger('validity_id');
            $table->foreign('validity_id')->references('id')->on('shop_validity')->onDelete('cascade');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {   Schema::dropIfExists('shop_validity_docs');
        Schema::dropIfExists('shop_validity');
        /* Schema::dropIfExists('shop_validity'); */
    }
};
