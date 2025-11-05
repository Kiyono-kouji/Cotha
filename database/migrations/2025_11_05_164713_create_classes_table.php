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
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('level')->nullable();
            $table->string('image')->nullable();
            $table->string('meeting_info')->nullable();
            $table->text('description')->nullable();
            $table->json('requirements')->nullable();
            $table->text('note')->nullable();
            $table->json('concepts')->nullable();
            $table->json('projects')->nullable();
            $table->text('button_link');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes');
    }
};
