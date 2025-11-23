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
        Schema::create('officials', function (Blueprint $table) {
            $table->increments('official_id');
            $table->string('username', 100)->unique();
            $table->string('password_hash', 255);
            $table->enum('role', ['admin', 'captain', 'kagawad', 'secretary', 'treasurer', 'clerk']);
            $table->string('full_name', 150);
            $table->string('contact_number', 50)->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('officials');
    }
};
