<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::create([
            'title' => 'Introduction to Programming',
            'description' => 'Learn the basics of programming using Python.',
            'code' => 'CS101',
            'credit_value' => 3,
            'teacher_id' => 9,
        ]);

        Course::create([
            'title' => 'Advanced Database Systems',
            'description' => 'Explore advanced concepts in database management systems.',
            'code' => 'CS202',
            'credit_value' => 4,
            'teacher_id' => 10,
        ]);

        Course::create([
            'title' => 'Solid Works',
            'description' => 'A comprehensive course on Solid Works for 3D modeling.',
            'code' => ' 301',
            'credit_value' => 3,
            'teacher_id' => 11,
        ]);
    }
}
