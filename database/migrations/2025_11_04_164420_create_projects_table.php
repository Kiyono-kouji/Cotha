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
        Schema::create('projects', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();   // same ID as API
            $table->string('title');
            $table->string('creator')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('url')->nullable();
            $table->boolean('is_featured')->default(true);
            $table->boolean('active')->default(true);
            $table->timestamp('project_date')->nullable(); // API created_at
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
