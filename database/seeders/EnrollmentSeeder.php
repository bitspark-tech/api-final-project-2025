<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Enrollment;

class EnrollmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Enrollment::create([
            'user_id' => 2,
            'course_id' => 1,
        ]);

        Enrollment::create([
            'user_id' => 2,
            'course_id' => 2,
        ]);

        Enrollment::create([
            'user_id' => 3,
            'course_id' => 2,
        ]);

        Enrollment::create([
            'user_id' => 8,
            'course_id' => 3,
        ]);
    }
}
