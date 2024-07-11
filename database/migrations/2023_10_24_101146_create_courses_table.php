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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->integer('UserID');
            $table->integer('CategoryID');
            $table->string('CourseCode', 255);
            $table->string('CourseName', 255);
            $table->string('CourseSubTitle', 255);
            $table->string('Slug', 255);
            $table->integer('Price');
            $table->double('Discount');
            $table->string('ImageData', 255)->default('storage/courses/course.png');
            $table->integer('LessonCount')->nullable();
            $table->integer('ChapterCount')->nullable();
            $table->integer('RegisterCount')->nullable();
            $table->integer('DoneCount')->nullable();
            $table->boolean('CourseStatus')->default(0);
            $table->string('IntroVideoLink', 255);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
