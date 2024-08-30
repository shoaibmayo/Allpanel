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
        Schema::create('cricket_videos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cricket_match_id')->constrained()->onDelete('cascade');
            $table->string('team');
            $table->string('video_path');
            $table->string('result');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cricket_videos');
    }
};
