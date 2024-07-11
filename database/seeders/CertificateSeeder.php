<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class CertificateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $existingPairs = [];

        foreach (range(1, 10) as $index) {
            do {
                $userID = $faker->numberBetween(1, 2);
                $courseID = $faker->numberBetween(1, 10);
                $pair = $userID . '-' . $courseID;
            } while (in_array($pair, $existingPairs) || $this->pairExistsInDatabase($userID, $courseID));

            // Lưu lại cặp để kiểm tra trùng lặp
            $existingPairs[] = $pair;

            DB::table('certificates')->insert([
                'userID' => $userID,
                'courseID' => $courseID,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    /**
     * Kiểm tra xem cặp userID và courseID đã tồn tại trong cơ sở dữ liệu chưa.
     *
     * @param int $userID
     * @param int $courseID
     * @return bool
     */
    private function pairExistsInDatabase($userID, $courseID)
    {
        return DB::table('certificates')
            ->where('userID', $userID)
            ->where('courseID', $courseID)
            ->exists();
    }
}
