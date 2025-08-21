<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Grade;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Grade::create([
            'enrollment_id' => 4,
            'grade' => 'A',
        ]);

        Grade::create([
            'enrollment_id' => 2,
            'grade' => 'B',
        ]);

        Grade::create([
            'enrollment_id' => 3,
            'grade' => 'B+',
        ]);

        Grade::create([
            'enrollment_id' => 1,
            'grade' => 'C+',
        ]);
    }
}
