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
        Schema::create('holiday_fields', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            
            $table->string('key'); // system key, e.g. "title", "date", "status"
            $table->string('label'); // user-facing label, e.g. "Holiday Title"
            
            $table->enum('type', [
                'text', 'textarea', 'date', 'datetime', 
                'select', 'multiselect', 'radio', 'checkbox', 
                'number', 'email', 'url', 'file', 'boolean'
            ])->default('text');
            
            $table->json('options')->nullable(); 
            // e.g. ["Active","Inactive"] or [{"id":1,"text":"Yes"},{"id":2,"text":"No"}]

            $table->json('visibility')->nullable(); 
            // {"form":true,"list":true,"api":true,"export":false}

            $table->json('validation')->nullable(); 
            // ["required","string","max:255"] or {"rules":["required"],"messages":{"required":"Title is required"}}

            $table->boolean('is_required')->default(false);
            $table->boolean('is_searchable')->default(false);
            $table->boolean('is_filterable')->default(false);
            
            $table->integer('sort_order')->default(0);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('holiday_fields');
    }
};
