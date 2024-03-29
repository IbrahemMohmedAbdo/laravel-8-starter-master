<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // php faker
        $faker = \Faker\Factory::create();

        // truncate db
        DB::table('user')->truncate();

        // Create user manual with DB Facades
        DB::table('user')->insert([
            [
                'uuid' => $faker->uuid,
                'fullname' => 'admin',
                'username' => 'admin',
                'email' => 'admin@email.com',
                'email_verified_at' => now(),
                'phone' => '01234567',
                'role'=>'admin',
                'password' => Hash::make('admin'),
            ],
        ]);

        // Create user manual with model eloquent
        $user = new User();
        $user->uuid = $faker->uuid;
        $user->fullname = 'user';
        $user->username = 'user';
        $user->email = 'user@email.com';
        $user->email_verified_at = now();
        $user->phone = '7890123';
        $user->password = app('hash')->make('user');
        $user->save();

        // Create user random
        User::factory(5)->create();
    }
}
