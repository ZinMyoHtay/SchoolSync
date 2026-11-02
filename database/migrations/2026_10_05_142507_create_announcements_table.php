<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('announcements', function (Blueprint $table) {

            $table->id('announcement_id');

            $table->string('title');

            $table->text('content');

            $table->unsignedBigInteger('created_by');

            $table->string('status', 20)
                ->default('active');

            $table->timestamps();

            $table->foreign('created_by')
                ->references('user_id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('announcements');
    }
};