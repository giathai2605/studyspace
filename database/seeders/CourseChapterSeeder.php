<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CourseChapterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Assuming you have courses in the 'courses' table
        $courseIds = DB::table('courses')->pluck('id')->toArray();

        foreach ($courseIds as $courseId) {
            for ($i = 1; $i <= 5; $i++) {
                DB::table('course_chapters')->insert([
                    'CourseID' => $courseId,
                    'ChapterName' => 'Chương ' . $i,
                    'ChapterLessonCount' => $faker->numberBetween(5, 15),
                    'SortNumber' => $faker->unique()->numberBetween(1, 100),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
