<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class LessonVideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $lessonIds = DB::table('lessons')->pluck('id')->toArray();
        foreach ($lessonIds as $lessonId) {
            for ($i = 1; $i <= 5; $i++) {
                $embedUrl = "https://www.youtube.com/embed/8PCF6VgT814?si=ekPk0iwqfASCMwkk";
                DB::table('lesson_videos')->insert([
                    'LessonID' => $lessonId, // Thay thế 20 bằng số lượng bài học thực tế trong hệ thống
                    'Title' => $faker->sentence(4),
                    'LessonLinkUrl' => $embedUrl,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
