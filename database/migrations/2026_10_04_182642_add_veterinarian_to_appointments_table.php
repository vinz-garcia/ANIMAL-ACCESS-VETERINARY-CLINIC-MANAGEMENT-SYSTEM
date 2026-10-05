<?php

use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        // Veterinarian column already exists in the appointments table.
    }

    public function down(): void
    {
        // Do not remove veterinarian.
    }
};