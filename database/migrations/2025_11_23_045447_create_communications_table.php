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
        Schema::create('communications', function (Blueprint $table) {
            $table->increments('communication_id');
            $table->string('title', 255);
            $table->text('message')->nullable();
            $table->enum('type', ['announcement', 'notification']);
            $table->unsignedInteger('posted_by');
            $table->unsignedInteger('resident_id')->nullable();
            $table->timestamps();

            // Foreign Keys
            $table->foreign('posted_by')
                ->references('official_id')
                ->on('officials')
                ->onDelete('cascade');

            $table->foreign('resident_id')
                ->references('resident_id')
                ->on('residents')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('communications');
    }
};
