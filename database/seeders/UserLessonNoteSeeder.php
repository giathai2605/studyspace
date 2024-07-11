<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserLessonNoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 100) as $index) {
            DB::table('user_lesson_notes')->insert([
                'userID' => $faker->numberBetween(1, 10),
                'LessonID' => $faker->numberBetween(1, 10),
                'noteID' => $faker->numberBetween(1, 50),
            ]);
        }
    }
}
