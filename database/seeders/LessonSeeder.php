<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Assuming you have course chapters in the 'course_chapters' table
        $chapterIds = DB::table('course_chapters')->pluck('id')->toArray();
        foreach ($chapterIds as $chapterId) {
            for ($i = 1; $i <= 5; $i++) {
                $courseId = DB::table('course_chapters')->where('id', $chapterId)->value('CourseID');
                DB::table('lessons')->insert([
                    'CourseChapterId' => $chapterId,
                    'CourseID' => $courseId,
                    'LessonName' => 'Bài học ' . $i,
                    'LessonDescription' => $faker->sentence,
                    'SortNumber' => $i,
                    'Status' => $faker->randomElement([0, 1]),
                    'created_at' => now(),
                    'updated_at' => now(),
                    'deleted_at' => null,
                ]);
            }
        }
    }
}
