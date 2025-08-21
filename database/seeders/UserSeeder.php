<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('00000000'),
            'role' => 'admin',
        ]);

        //student user
        User::create([
            'name' => 'Anye Emmanuel',
            'email' => 'anye@gmail.com',
            'password' => Hash::make('00000000'),
            'role' => 'student',
        ]);

        User::create([
            'name' => 'Ojong Prosper',
            'email' => 'ojong@gmail.com',
            'password' => Hash::make('00000000'),
            'role' => 'student',
        ]);

        User::create([
            'name' => 'Nsai Paraclete',
            'email' => 'nsai@gmail.com',
            'password' => Hash::make('00000000'),
            'role' => 'student',
        ]);

        User::create([
            'name' => 'Zeomoh Belise',
            'email' => 'belise@gmail.com',
            'password' => Hash::make('00000000'),
            'role' => 'student',
        ]);

        User::create([
            'name' => 'Fogwe Favour',
            'email' => 'fogwe@gmail.com',
            'password' => Hash::make('00000000'),
            'role' => 'student',
        ]);

        User::create([
            'name' => 'Bongsenyuy Precious',
            'email' => 'precious@gmail.com',
            'password' => Hash::make('00000000'),
            'role' => 'student',
        ]);

        User::create([
            'name' => 'Sunjo Faith',
            'email' => 'sunjo@gmail.com',
            'password' => Hash::make('00000000'),
            'role' => 'student',
        ]);

        User::create([
            'name' => 'Ayanda Henry',
            'email' => 'ayanda@gmail.com',
            'password' => Hash::make('00000000'),
            'role' => 'student',
        ]);


        //teacher user
        User::create([
            'name' => 'Mr Paul',
            'email' => 'paul@gmail.com',
            'password' => Hash::make('00000000'),
            'role' => 'teacher',
        ]);

         User::create([
            'name' => 'Mr John',
            'email' => 'john@gmail.com',
            'password' => Hash::make('00000000'),
            'role' => 'teacher',
        ]);
    }
}
