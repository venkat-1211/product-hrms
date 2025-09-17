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
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
        
            $table->unsignedBigInteger('parent_id')->nullable();
        
            $table->string('name', 100);               // e.g., "Human Resource Management"
            $table->string('slug', 100);     // e.g., "hrm", "hrm-employees"
            $table->string('description', 255)->nullable(); // Optional longer description
            $table->string('icon', 50)->nullable();    // e.g., "fa-users", "bi-house"
        
            $table->enum('type', ['module', 'menu', 'submenu'])->default('menu');
            $table->boolean('is_active')->default(true);
        
            $table->softDeletes();
            $table->timestamps();
        
            $table->foreign('parent_id')->references('id')->on('modules')->onDelete('cascade');
        });
        
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modules');
    }
};
