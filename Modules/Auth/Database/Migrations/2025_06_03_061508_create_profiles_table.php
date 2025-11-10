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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();

            // Foreign key to companies table
            $table->foreignId('company_id')->nullable()->constrained()->onDelete('cascade');

            // Foreign key to users table
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Profile photo path (e.g., uploads/profiles/user123.jpg)
            $table->string('profile_image', 255)->nullable();

            // Personal details
            $table->string('first_name', 50);
            $table->string('last_name', 50);

            // HR/Company details
            $table->string('employee_id', 30); // e.g., EMP00123
            $table->date('joining_date');
            $table->string('phone_number', 20); // Supports international format

            // Address (stored as JSON: door_no, street, city, pincode, state, country)
            $table->json('address');

            $table->text('about')->nullable();

            $table->softDeletes(); // Allows profile recovery if deleted
            $table->timestamps();

            $table->unique(['company_id', 'employee_id']);
            $table->unique(['company_id', 'phone_number']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
