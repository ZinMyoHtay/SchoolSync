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
        Schema::create('attendance', function (Blueprint $table) {
            $table->id('attendance_id');

            $table->unsignedBigInteger('enrollment_id');

            $table->date('attendance_date');
            $table->string('attendance_grade');
            $table->string('status');

            $table->timestamps();

            $table->foreign('enrollment_id')
                ->references('enrollment_id')
                ->on('enrollments')
                ->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendance');
    }
};
