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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
        
            $table->string('name', 50); // Package name, e.g., Basic, Pro
            $table->enum('type', ['Monthly', 'Yearly', 'Lifetime'])->default('Monthly');
        
            $table->unsignedTinyInteger('position')->unique(); // Small number for ordering
            $table->unsignedMediumInteger('price'); // Allows values up to 16,777,215
        
            $table->enum('currency', ['USD', 'EUR', 'INR', 'GBP', 'CAD', 'JPY'])->default('USD');
        
            $table->enum('discount_type', ['Fixed', 'Percentage'])->default('Fixed');
            $table->unsignedSmallInteger('discount')->default(0); // Percentage or fixed amount

            $table->text('description')->nullable();
        
            $table->unsignedSmallInteger('limitation_invoices')->nullable(); // Use numeric instead of string
            $table->unsignedSmallInteger('max_users')->nullable(); // Same here
        
            $table->string('product', 50)->nullable();
            $table->string('supplier', 50)->nullable();
        
            $table->boolean('access_trial')->default(false);
            $table->unsignedTinyInteger('trial_days')->nullable(); // Days are typically below 365
        
            $table->boolean('is_recommended')->default(false);

            $table->boolean('ui_customize')->default(false);
        
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
        
            $table->softDeletes();        
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
