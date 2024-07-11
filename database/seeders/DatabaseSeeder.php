<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(LessonSeeder::class);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            CategorySeeder::class,
            CourseChapterSeeder::class,
            LessonSeeder::class,
            RoleSeeder::class,
            UsersTableSeeder::class,
            CourseSeeder::class,
            CommentSeeder::class,
            ReplyCommentSeeder::class,
            DocumentSeeder::class,
        ]);
    }
}
