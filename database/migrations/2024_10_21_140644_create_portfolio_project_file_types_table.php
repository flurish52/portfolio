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
        Schema::create('portfolio_project_file_types', function (Blueprint $table) {
            $table->id();                          // Primary key
            $table->foreignId('portfolio_id')         // Foreign key to projects table
            ->constrained()
                ->onDelete('cascade');
            $table->string('file_type');            // File type (e.g., PSD, PNG, JPEG)// Path to the file
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolio_project_file_types');
    }
};
