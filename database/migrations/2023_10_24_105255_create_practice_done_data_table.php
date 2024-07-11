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
        Schema::create('practice_done_data', function (Blueprint $table) {
            $table->id();
            $table->integer('UserID');
            $table->integer('PracticeLessonID');
            $table->dateTime('DoneTime');
            $table->boolean('isDone');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('practice_done_data');
    }
};
