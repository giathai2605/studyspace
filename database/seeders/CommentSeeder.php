<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Comments;
use App\Models\User;
use App\Models\Lesson;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            Comments::create([
                'UserID' => 1,
                'LessonID' => 1,
                'Content' => 'Bài học hay quá',
                'Image' => 'https://picsum.photos/200',
            ]);
        }
    }
}
