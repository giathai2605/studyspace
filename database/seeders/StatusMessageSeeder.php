<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusMessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //tạo database gồm các bản ghi: 1. Đang chờ, 2. Đã xem, 3. Lưu ý quan trọng, 4. đã tư vấn xong, bằng tiếng anh
        $status = [
            [
                'name' => 'Đang chờ',
            ],
            [
                'name' => 'Đã xem',
            ],
            [
                'name' => 'Lưu ý quan trọng',
            ],
            [
                'name' => 'Đã tư vấn xong',
            ],
        ];

        foreach ($status as $item) {
            DB::table('status_message')->insert($item);
        }

    }
}
