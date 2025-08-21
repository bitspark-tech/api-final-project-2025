<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\StudentProfile;

class StudentProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StudentProfile::create([
            'dob' => '2000-01-01',
            'gender' => 'male',
            'address' => 'Bamenda',
            'phone' => '1234567890',
            'user_id' => 2,
            'is_completed' => true,
            'matricule' => "UBa25E0001",
        ]);

        StudentProfile::create([
            'dob' => '2005-09-02',
            'gender' => 'male',
            'address' => 'Buea',
            'phone' => '0987654321',
            'user_id' => 3,
            'is_completed' => true,
            'matricule' => "UBa25E0002",
        ]);

        StudentProfile::create([
            'dob' => '2006-11-01',
            'gender' => 'female',
            'address' => 'Douala',
            'phone' => '1122334455',
            'user_id' => 4,
            'is_completed' => true,
            'matricule' => "UBa25E0003",
        ]);

        StudentProfile::create([
            'dob' => '2008-12-12',
            'gender' => 'female',
            'address' => 'Yaounde',
            'phone' => '1235677890',
            'user_id' => 5,
            'is_completed' => true,
            'matricule' => "UBa25E0004",
        ]);

        StudentProfile::create([
            'dob' => '2006-01-01',
            'gender' => 'male',
            'address' => 'Limbe',
            'phone' => '0987654321',
            'user_id' => 6,
            'is_completed' => true,
            'matricule' => "UBa25E0005",
        ]);

         StudentProfile::create([
            'dob' => '2009-11-01',
            'gender' => 'female',
            'address' => 'Nso',
            'phone' => '1122334455',
            'user_id' => 7,
            'is_completed' => true,
            'matricule' => "UBa25E0006",
        ]);

        StudentProfile::create([
            'dob' => '2012-05-11',
            'gender' => 'female',
            'address' => 'Bafoussam',
            'phone' => '1235677890',
            'user_id' => 8,
            'is_completed' => true,
            'matricule' => "UBa25E0007",
        ]);

        StudentProfile::create([
            'dob' => '2000-01-01',
            'gender' => 'male',
            'address' => 'Maroua',
            'phone' => '1234567890',
            'user_id' => 9,
            'is_completed' => true,
            'matricule' => "UBa25E0008",
        ]);
    }
}
