<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 4; $i++) {
            DB::table('courses')->insert([
                'UserID' => $faker->numberBetween(1, 10),
                'CategoryID' => 1,
                'CourseCode' => 'C' . $i,
                'CourseName' => 'Lập trình C' . $i,
                'CourseSubTitle' => 'Khóa học lập trình C' . $i,
                'Slug' => $faker->slug,
                'Price' => $faker->numberBetween(100, 1000),
                'Discount' => $faker->numberBetween(0, 50),
                'ImageData' => $faker->imageUrl(),
                'LessonCount' => $faker->numberBetween(5, 50),
                'ChapterCount' => $faker->numberBetween(5, 20),
                'RegisterCount' => $faker->numberBetween(0, 10),
                'DoneCount' => $faker->numberBetween(0, 5),
                'CourseStatus' => $faker->randomElement(['0', '1']),
                'IntroVideoLink' => $faker->url,
            ]);
        }
        for ($i = 0; $i < 4; $i++) {
            DB::table('courses')->insert([
                'UserID' => $faker->numberBetween(1, 10),
                'CategoryID' => 2,
                'CourseCode' => 'PHP' . $i,
                'CourseName' => 'Lập trình PHP' . $i,
                'CourseSubTitle' => 'Khóa học lập trình PHP' . $i,
                'Slug' => $faker->slug,
                'Price' => $faker->numberBetween(100, 1000),
                'Discount' => $faker->numberBetween(0, 50),
                'ImageData' => $faker->imageUrl(),
                'LessonCount' => $faker->numberBetween(5, 50),
                'ChapterCount' => $faker->numberBetween(5, 20),
                'RegisterCount' => $faker->numberBetween(0, 10),
                'DoneCount' => $faker->numberBetween(0, 5),
                'CourseStatus' => $faker->randomElement(['0', '1']),
                'IntroVideoLink' => $faker->url,
            ]);
        }
        for ($i = 0; $i < 4; $i++) {
            DB::table('courses')->insert([
                'UserID' => $faker->numberBetween(1, 10),
                'CategoryID' => 3,
                'CourseCode' => 'Javascript' . $i,
                'CourseName' => 'Lập trình Javascript' . $i,
                'CourseSubTitle' => 'Khóa học lập trình Javascript' . $i,
                'Slug' => $faker->slug,
                'Price' => $faker->numberBetween(100, 1000),
                'Discount' => $faker->numberBetween(0, 50),
                'ImageData' => $faker->imageUrl(),
                'LessonCount' => $faker->numberBetween(5, 50),
                'ChapterCount' => $faker->numberBetween(5, 20),
                'RegisterCount' => $faker->numberBetween(0, 10),
                'DoneCount' => $faker->numberBetween(0, 5),
                'CourseStatus' => $faker->randomElement(['0', '1']),
                'IntroVideoLink' => $faker->url,
            ]);
        }
    }
}
