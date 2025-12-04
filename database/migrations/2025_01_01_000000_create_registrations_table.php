<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('class_id')->index();
            $table->string('class_title');
            $table->string('class_level');
            $table->string('child_name');
            $table->date('dob');
            $table->string('school')->nullable();
            $table->string('city')->nullable();
            $table->string('wa');
            $table->string('language')->nullable();
            $table->string('coding_experience')->nullable();
            $table->text('note')->nullable();
            $table->string('status')->default('new');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};