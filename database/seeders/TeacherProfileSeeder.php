<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TeacherProfile;

class TeacherProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TeacherProfile::create([
            'address' => 'Bamenda',
            'department' => 'ICT',
            'speciality' => 'Software Engineering',
            'user_id' => 10,
            'employee_id' => "EMP001",
        ]);

        TeacherProfile::create([
            'address' => 'Buea',
            'department' => 'Civil Engineering',
            'speciality' => 'Structural Engineering',
            'user_id' => 11,
            'employee_id' => "EMP002",
        ]);
    }
}
