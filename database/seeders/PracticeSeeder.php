<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;


class PracticeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            DB::table('practice_lessons')->insert([
                'Problem' => $faker->text,
                'ProblemDetail' => $faker->text,
                'Explain' => $faker->text,
                'Suggest' => $faker->text,
                'LessonID' => $faker->numberBetween(1, 10), // Thay đổi phạm vi tùy ý.
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
