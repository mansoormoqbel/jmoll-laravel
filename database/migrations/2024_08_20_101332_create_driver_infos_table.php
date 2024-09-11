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
        Schema::create('driver_infos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('car_model');
            $table->string('car_make');
            $table->date('birth_date');
            $table->string('car_year_made');
            $table->string('car_number');
            $table->string('car_color');
            $table->string('personal_identity_file');
            $table->string('driving_license_file');
            $table->string('car_license_file');
            $table->boolean('availability')->default(true);
            $table->boolean('acception')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('driver_infos');
    }
};
