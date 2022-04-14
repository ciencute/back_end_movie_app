<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::factory()->count(1000)->create();

//        for ($i=0; $i < 100000; $i++) {
//            $userData[] = [
//                'name' => Str::random(10),
//                'email' => Str::random(10).'@gmail.com',
//                'password' => Hash::make('password')
//            ];
//        }
//
//        foreach ($userData as $user) {
//            User::create($user);
//        }

    }
}
