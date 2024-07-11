<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $supper_admin = User::create([
            'reffered_by' => null,
            'username' => 'Supper Admin',
            'email' => 'studyspacecode@gmail.com',
            'email_verified_at' => now(),
            'phone' => $faker->numerify('0#########'),
            'lastName' => 'Supper',
            'firstName' => 'Admin',
            'avatar' => $faker->imageUrl(),
            'password' => Hash::make('12345678A'),
            'birthday' => '2003-11-24',
            'lastLogin' => $faker->date,
            'gender' => '1',
            'roleID' => 6,
            'address' => 'Hà Nội',
            'refferalCode' => $faker->word,
            'userStatusID' => 1,
            'description' => $faker->text,
        ]);

        $supper_admin->assignRole('Supper Admin');

        foreach (range(1, 3) as $index) {
            $users = User::create([
                'reffered_by' => null,
                'username' => $faker->userName,
                'email' => $faker->unique()->safeEmail,
                'email_verified_at' => now(),
                'phone' => $faker->numerify('0#########'),
                'lastName' => $faker->lastName,
                'firstName' => $faker->firstName,
                'avatar' => $faker->imageUrl(),
                'password' => Hash::make('12345678A'),
                'birthday' => $faker->date,
                'lastLogin' => $faker->date,
                'gender' => $faker->randomElement([0, 1]),
                'roleID' => 1,
                'address' => $faker->address,
                'refferalCode' => $faker->word,
                'userStatusID' => 1,
                'description' => $faker->text,
            ]);

            $users->assignRole('Admin');
        }
    }
}
