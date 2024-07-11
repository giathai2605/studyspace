<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PracticeLessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Assuming you have lessons in the 'lessons' table
        $lessonIds = DB::table('lessons')->pluck('id')->toArray();

        foreach (range(1, 50) as $index) {
            DB::table('practice_lessons')->insert([
                'Problem' => $faker->paragraph(3),
                'ProblemDetail' => $faker->text,
                'Explain' => $faker->text,
                'Suggest' => $faker->text,
                'LessonID' => $faker->randomElement($lessonIds),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
