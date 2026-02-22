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
        Schema::create('users', function (Blueprint $table) {
             $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone');
            $table->string('alternate_phone')->nullable();
            $table->string('email')->unique();
            $table->string('alternate_email')->nullable();
            $table->string('password');
            $table->string('verification_code')->nullable();
            $table->timestamp('code_expires_at')->nullable();
            $table->boolean('is_verified')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
