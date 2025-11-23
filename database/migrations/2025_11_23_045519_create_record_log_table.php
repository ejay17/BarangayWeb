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
        Schema::create('record_log', function (Blueprint $table) {
            $table->increments('log_id');
            $table->enum('record_type', ['ordinance', 'resolution', 'minutes', 'memo', 'general']);
            $table->unsignedInteger('record_id')->nullable();
            $table->unsignedInteger('user_id');
            $table->enum('action', ['viewed', 'downloaded', 'updated', 'deleted']);
            $table->timestamp('timestamp')->useCurrent();

            // Foreign Key
            $table->foreign('user_id')
                ->references('official_id')
                ->on('officials')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('record_log');
    }
};
