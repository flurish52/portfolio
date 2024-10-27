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
        Schema::create('portfolio_project_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('portfolio_id')
            ->constrained()
                ->onDelete('cascade');
            $table->string('default_image');
            $table->string('hovered_image');
            $table->string('file_type_default_image');
            $table->string('file_type_hovered_image');
            $table->string('default_file_path');
            $table->string('hovered_file_path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolio_project_images');
    }
};
