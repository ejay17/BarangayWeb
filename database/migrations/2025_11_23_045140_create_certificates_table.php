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
        Schema::create('certificates', function (Blueprint $table) {
            $table->increments('certificate_id');
            $table->unsignedInteger('request_id');
            $table->string('certificate_type', 100)->nullable();
            $table->string('control_number', 100)->nullable();
            $table->timestamp('issued_at')->nullable();
            $table->unsignedInteger('issued_by')->nullable();

            // Foreign Keys
            $table->foreign('request_id')
                ->references('request_id')
                ->on('requests')
                ->onDelete('cascade');

            $table->foreign('issued_by')
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
        Schema::dropIfExists('certificates');
    }
};
