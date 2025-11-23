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
        Schema::create('blotters', function (Blueprint $table) {
            $table->increments('blotter_id');
            $table->unsignedInteger('complainant_id');
            $table->unsignedInteger('respondent_id');
            $table->string('incident_type', 100)->nullable();
            $table->string('location', 255)->nullable();
            $table->date('date_of_incident')->nullable();
            $table->date('date_reported')->nullable();
            $table->text('details')->nullable();
            $table->enum('status', ['ongoing', 'resolved'])->default('ongoing');
            $table->unsignedInteger('created_by')->nullable();
            $table->timestamps();

            // Foreign Keys
            $table->foreign('complainant_id')
                ->references('resident_id')
                ->on('residents')
                ->onDelete('cascade');

            $table->foreign('respondent_id')
                ->references('resident_id')
                ->on('residents')
                ->onDelete('cascade');

            $table->foreign('created_by')
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
        Schema::dropIfExists('blotters');
    }
};
