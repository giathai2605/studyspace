<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UserCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        //fake 10 trường theo user và course trong database
        $users = DB::table('users')->pluck('id');
        $courses = DB::table('courses')->pluck('id');
        foreach ($users as $user) {
            foreach ($courses as $course) {
                DB::table('user_courses')->insert([
                    'UserID' => 1,
                    'CourseID' => $course,
                    'isDone' => $faker->numberBetween(0, 1),
                    //total cost in course
                    'GrandTotal' => $faker->numberBetween(0, 1000000),
                    'RegisterTime' => $faker->dateTimeBetween('-1 years', 'now'), // '1979-06-09
                    'LastTimeStudy' => $faker->dateTimeBetween('-1 years', 'now'), // '1979-06-09
                    'DonePercent' => $faker->numberBetween(0, 100),
                ]);
            }
        }

    }
}
