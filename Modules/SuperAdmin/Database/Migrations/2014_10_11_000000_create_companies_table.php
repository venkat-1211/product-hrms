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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('logo', 100)->nullable();
            $table->string('account_url', 50)->nullable();
            $table->string('phone', 20);
            $table->string('website', 50)->nullable();
            $table->text('address')->nullable();
            $table->enum('login_method', [
                'email',
                'username',
                'phone',
                'username_or_email',
                'username_or_phone',
                'email_or_phone'
            ])->default('email');
            $table->foreignId('package_id')->constrained()->onDelete('cascade');
            $table->enum('type', ['Monthly', 'Yearly', 'Lifetime'])->default('Monthly');
            $table->enum('currency', ['USD', 'EUR', 'INR', 'GBP', 'CAD', 'JPY'])->default('INR');
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
        Schema::dropIfExists('companies');
    }
};
