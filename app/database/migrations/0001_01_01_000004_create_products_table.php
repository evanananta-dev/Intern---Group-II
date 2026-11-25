<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150);
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('transmission', 20)->nullable();
            $table->unsignedTinyInteger('passenger_capacity')->nullable();
            $table->string('fuel_type', 20)->nullable();
            $table->year('production_year')->nullable();
            $table->string('engine', 50)->nullable();
            $table->string('license_plate', 15)->unique()->nullable();
            $table->decimal('price_per_day', 12, 0);
            $table->enum('status', [
                'available',
                'rented',
                'maintenance'
            ])->default('available');
            $table->foreignId('category_id')
                ->constrained('categories')
                ->restrictOnDelete();
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
