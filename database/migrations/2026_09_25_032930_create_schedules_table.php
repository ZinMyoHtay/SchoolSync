<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id('schedule_id');

            $table->foreignId('class_id')
                ->constrained('classrooms', 'class_id')
                ->cascadeOnDelete();

            $table->foreignId('subject_id')
                ->constrained('subjects', 'subject_id')
                ->cascadeOnDelete();

            $table->foreignId('teacher_id')
                ->constrained('teachers', 'teacher_id')
                ->cascadeOnDelete();

            $table->string('day_of_week');

            $table->time('start_time');

            $table->time('end_time');

            $table->string('room')->nullable();

            $table->string('status', 20)->default('active');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};

