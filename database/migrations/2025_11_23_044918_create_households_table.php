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
        Schema::create('households', function (Blueprint $table) {
            $table->increments('household_id');
            $table->string('household_number', 50)->nullable();
            $table->string('street', 150)->nullable();
            $table->string('purok', 50)->nullable();
            $table->unsignedInteger('head_resident_id');
            $table->timestamps();

            // Foreign Key
            $table->foreign('head_resident_id')
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
        Schema::dropIfExists('households');
    }
};
