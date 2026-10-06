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
        Schema::create('groomings', function (Blueprint $table) {
            $table->id();

            $table->string('pet_name');
            $table->string('customer_name');
            $table->string('grooming_service');
            $table->date('grooming_date');
            $table->time('grooming_time');

            $table->string('status')->default('Pending');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groomings');
    }
};