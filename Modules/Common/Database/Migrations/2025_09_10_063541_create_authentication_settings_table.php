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
        Schema::create('authentication_settings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->enum('allow_registration', ['on', 'off', 'invite_only'])->default('off');
            $table->boolean('verification_required')->default(false);
            $table->integer('verification_expired')->nullable();
            $table->boolean('referral_system')->default(false);
            $table->enum('login_type', ['email','username','phone','username_or_email','username_or_phone','email_or_phone'])->default('email');
            $table->boolean('password_enabled')->default(true);
            $table->boolean('otp_system')->default(false);
            $table->enum('otp_type', ['sms', 'email'])->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('authentication_settings');
    }
};
