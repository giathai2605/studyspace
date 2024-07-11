<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\ReplyComment;
use App\Models\User;
use App\Models\Comments;


class ReplyCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            $replyComment = ReplyComment::create([
                'UserID' => User::all()->random()->id,
                'CommentID' => Comments::all()->random()->id,
                'Content' => 'Bài học hay quá',
                'Image' => 'https://picsum.photos/200',
            ]);
            $replyComment->save();
        }
    }
}
