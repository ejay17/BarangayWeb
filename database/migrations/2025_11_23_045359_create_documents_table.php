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
        Schema::create('documents', function (Blueprint $table) {
            $table->increments('document_id');
            $table->enum('document_type', ['ordinance', 'resolution', 'minutes', 'memo', 'general']);
            $table->string('title', 255);
            $table->text('description')->nullable();
            $table->string('file_path', 255)->nullable();
            $table->unsignedInteger('uploaded_by');
            $table->timestamps();

            // Foreign Key
            $table->foreign('uploaded_by')
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
        Schema::dropIfExists('documents');
    }
};
