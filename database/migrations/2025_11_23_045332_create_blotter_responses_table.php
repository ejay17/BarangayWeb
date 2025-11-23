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
        Schema::create('blotter_responses', function (Blueprint $table) {
            $table->increments('response_id');
            $table->unsignedInteger('blotter_id');
            $table->unsignedInteger('official_id');
            $table->text('action_taken')->nullable();
            $table->timestamp('date_handled')->useCurrent();

            // Foreign Keys
            $table->foreign('blotter_id')
                ->references('blotter_id')
                ->on('blotters')
                ->onDelete('cascade');

            $table->foreign('official_id')
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
        Schema::dropIfExists('blotter_responses');
    }
};
