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
        Schema::create('household_members', function (Blueprint $table) {
            $table->increments('member_id');
            $table->unsignedInteger('household_id');
            $table->unsignedInteger('resident_id');
            $table->string('relationship_to_head', 100)->nullable();
            $table->timestamps();

            // Foreign Keys
            $table->foreign('household_id')
                ->references('household_id')
                ->on('households')
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
        Schema::dropIfExists('household_members');
    }
};
