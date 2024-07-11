<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Document;


class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        for($i = 1; $i <= 10; $i++){
            Document::create([
                'name' => 'Tài liệu ' . $i,
                'thumbnail' => 'thumbnail ' . $i,
                'file' => 'Tệp ' . $i,
                'description' => 'Mô tả ' . $i,
                'is_featured' => rand(0, 1),
                'status' => rand(0, 1),
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null,
            ]);
        }

    }
}
