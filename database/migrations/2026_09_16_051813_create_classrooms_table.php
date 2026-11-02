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
        Schema::create('classrooms', function (Blueprint $table) {
            $table->id('class_id');

            $table->unsignedBigInteger('year_id');
            $table->unsignedBigInteger('teacher_id');

            $table->string('class_name');

            $table->timestamps();

            $table->foreign('year_id')
                ->references('academic_year_id')
                ->on('academic_years')
                ->onDelete('cascade');

            $table->foreign('teacher_id')
                ->references('teacher_id')
                ->on('teachers')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classrooms');
    }
};
