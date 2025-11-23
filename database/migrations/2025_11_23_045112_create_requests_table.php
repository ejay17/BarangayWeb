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
        Schema::create('requests', function (Blueprint $table) {
            $table->increments('request_id');
            $table->unsignedInteger('resident_id');
            $table->unsignedInteger('approved_by')->nullable();
            $table->enum('request_type', ['clearance', 'indigency', 'residency']);
            $table->text('purpose')->nullable();
            $table->enum('status', ['pending', 'approved', 'denied', 'released'])->default('pending');
            $table->timestamps();

            // Foreign Keys
            $table->foreign('resident_id')
                ->references('resident_id')
                ->on('residents')
                ->onDelete('cascade');

            $table->foreign('approved_by')
                ->references('official_id')
                ->on('officials')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests');
    }
};
