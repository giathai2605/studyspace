<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TestcaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Assuming you have practice lessons in the 'practice_lessons' table
        $practiceLessonIds = DB::table('practice_lessons')->pluck('id')->toArray();

        foreach (range(1, 10) as $index) {
            DB::table('testcase')->insert([
                'PracticeLessonID' => $faker->randomElement($practiceLessonIds),
                'NameFunction' => $faker->word,
                'InputDetail' => $faker->text,
                'Input' => $faker->text,
                'ExpectOutput' => $faker->text,
                'SortNumber' => $faker->numberBetween(1, 10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
